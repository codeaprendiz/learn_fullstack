# CustomResponseWriter -- Wrapping middlewares -- http handlers 

```go
// customResponseWriter captures the status code and response length
type customResponseWriter struct {
    writer http.ResponseWriter
    status int
    length int
}
```

The `customResponseWriter` type in Go serves a couple of key purposes:

1. **Wrapping `http.ResponseWriter`**: It embeds the standard `http.ResponseWriter` to ensure that it can be used in place of the standard writer for all HTTP response operations.

2. **Capturing Status Code and Length**:
   - **Status Code**: Normally, when you write a header or status code using the standard `http.ResponseWriter`, there's no straightforward way to retrieve it later. The `customResponseWriter` captures this status code when `WriteHeader` is called, allowing you to access or log it afterwards.
   - **Length**: Similarly, it captures the length of the response body written. This is useful for logging, metrics, or any other situation where you need to know how much data was sent in the response.

By creating and using this custom type, you gain more control and visibility over the response writing process, which can be crucial for logging, middleware operations, and more sophisticated HTTP handling logic.

---

The `http.ResponseWriter` interface requires three methods to be implemented:

1. `Header() http.Header`: For accessing the header map to be sent with the response.
2. `Write([]byte) (int, error)`: For writing the response body.
3. `WriteHeader(int)`: For sending an HTTP response header with a status code.

Without implementing all these methods, a custom type like `customResponseWriter` would not fully satisfy the `http.ResponseWriter` interface, and thus couldn't be used interchangeably with the standard response writers in Go's HTTP server context.

---

```go
func (w *customResponseWriter) Header() http.Header {
    log.Println("Control : Header()")
    return w.writer.Header()
}
```

In this method of the `customResponseWriter` type:

We're implementing the `Header` method, which is a part of the `http.ResponseWriter` interface. Here's what it does and why it's necessary:

1. **Interface Compliance**: To make `customResponseWriter` a valid `http.ResponseWriter`, it must implement all methods of the interface. `Header` is one of these methods.

2. **Delegating to the Embedded Writer**: The method simply returns the header map associated with the embedded standard `http.ResponseWriter` (`w.writer`). This allows the headers to be read or modified just like they would be with the standard writer.

3. **Preserving Standard Functionality**: By delegating to the embedded writer's `Header` method, `customResponseWriter` ensures that any changes to headers are correctly reflected in the actual HTTP response.

This method is essential to integrate `customResponseWriter` seamlessly with the existing HTTP handling logic in Go, allowing it to enhance functionality without disrupting standard behavior.

---

In the `WriteHeader` method of `customResponseWriter`:

```go
func (responseWriter *customResponseWriter) WriteHeader(statusCode int) {
    log.Println("Control : WriteHeader(statusCode int) : statusCode", statusCode)
    responseWriter.status = statusCode
    responseWriter.writer.WriteHeader(statusCode)
}
```

We're doing two key things:

1. **Capturing the Status Code**: `w.status = s` stores the HTTP status code (`s`) in the `customResponseWriter`. This allows for later retrieval or logging of the status code, which isn't directly possible with the standard `http.ResponseWriter`.

2. **Delegating to the Embedded Writer**: `w.writer.WriteHeader(s)` calls the `WriteHeader` method of the embedded standard `http.ResponseWriter` (`w.writer`). This ensures the actual response sent to the client includes the correct HTTP status code.

This method is necessary to enhance the functionality of the standard response writer by enabling tracking of the HTTP status code while maintaining the usual response behavior.

> why do we need to store status separately? shouldn't it be part of it already?

In standard Go HTTP server handling, the `http.ResponseWriter` interface doesn't provide a method to retrieve the status code once it's set. This is a limitation in the design of the standard library. The `WriteHeader` method allows setting the status code, but there's no corresponding `GetStatus` or similar method to retrieve it later.

By storing the status code in a separate field (`status`) within `customResponseWriter`, you create a way to access this information later. This is particularly useful for logging and monitoring purposes, where you might want to record the status code of each response your server sends. For example, you might want to log all responses with a 4xx or 5xx status code to identify and address potential issues.

So, the need to store the status separately arises from a gap in the standard `http.ResponseWriter` interface's functionality.

```go
func (responseWriter *customResponseWriter) Write(b []byte) (int, error) {
    log.Println("Control : Write(b []byte)")
    if responseWriter.status == 0 {
        log.Println("responseWriter.status was 0")
        responseWriter.status = http.StatusOK
    }
    responseWriter.length = len(b)
    log.Println("responseWriter.length : ", len(b))
    return responseWriter.writer.Write(b)
}
```

In the `Write` method of `customResponseWriter`, we are enhancing the functionality of the standard `http.ResponseWriter`:

1. **Logging**: The method logs whenever it's called, which is useful for debugging.

2. **Setting a Default Status Code**: If the status code (`responseWriter.status`) hasn't been set (i.e., it's `0`), it defaults to `http.StatusOK` (HTTP 200). This is necessary because in HTTP, if a response doesn't explicitly set a status code, it's assumed to be 200 OK.

3. **Tracking Response Length**: It captures the length of the response body being written (`len(b)`).

4. **Delegating the Write**: Finally, it writes the response body (`b`) using the embedded `http.ResponseWriter` (`responseWriter.writer.Write(b)`) and returns the result of that operation.

```go
func simpleLogger(nextHandlerFunction http.HandlerFunc) http.HandlerFunc {
    log.Println("Control : simpleLogger ")
    return func(responseWriter http.ResponseWriter, r *http.Request) {
        log.Println("Control : simpleLogger : inside return")
        crw := customResponseWriter{writer: responseWriter}

        start := time.Now()
        nextHandlerFunction(&crw, r)
        duration := time.Since(start)

        log.Printf("Request to %s, Method: %s, Status: %d, Duration: %v", r.URL.Path, r.Method, crw.status, duration)
    }
}
```

In `simpleLogger`, a function for logging details of HTTP requests is being defined:

1. **Initialization Log**: When `simpleLogger` is initialized (i.e., when the server starts), it logs "Control : simpleLogger".

2. **Middleware Function**: It returns a new HTTP handler function (middleware). This function logs "Control : simpleLogger : inside return" every time it handles a request.

3. **Enhanced Response Writer**: It wraps the standard `http.ResponseWriter` with `customResponseWriter` to track response status and length.

4. **Request Handling and Logging**:
    - The actual handler (`nextHandlerFunction`) is called with this enhanced writer.
    - The method measures the duration of the request processing.
    - After the request is processed, it logs the URL, method, response status, and duration of the request.

This function is a middleware that adds logging capabilities to monitor and record details about each HTTP request and its processing time.

## Output

```bash
# Terminal 1
$ go run main.go
2023/11/27 16:25:59 Control : withAppHeaders
2023/11/27 16:25:59 Control : simpleLogger 

# Terminal 2
$ curl -v localhost:8080/path
*   Trying 127.0.0.1:8080...
* Connected to localhost (127.0.0.1) port 8080 (#0)
> GET /path HTTP/1.1
> Host: localhost:8080
> User-Agent: curl/8.1.2
> Accept: */*
> 
< HTTP/1.1 200 OK
< X-App-Name: http-dump
< X-App-Version: 1.0
< Date: Mon, 27 Nov 2023 10:56:38 GMT
< Content-Length: 14
< Content-Type: text/plain; charset=utf-8
< 
Hello, World!

# Terminal 1
$ go run main.go
2023/11/27 16:25:59 Control : withAppHeaders
2023/11/27 16:25:59 Control : simpleLogger 
2023/11/27 16:26:38 Control : simpleLogger : inside return
2023/11/27 16:26:38 Control : withAppHeaders : inside return
2023/11/27 16:26:38 Control : Header()
2023/11/27 16:26:38 Control : Header()
2023/11/27 16:26:38 Control : helloWorldHandler()
2023/11/27 16:26:38 Control : Write(b []byte)
2023/11/27 16:26:38 responseWriter.status was 0
2023/11/27 16:26:38 responseWriter.length :  14
2023/11/27 16:26:38 Request to /path, Method: GET, Status: 200, Duration: 25.125µs
```

The output from your Go program can be explained as follows:

1. **Server Initialization (Terminal 1)**:
    - Upon starting the server, `withAppHeaders` and `simpleLogger` log their initialization: "Control : withAppHeaders" and "Control : simpleLogger".

2. **Handling a Request (Terminal 2)**:
    - When a request is made to the server (`curl -v localhost:8080/path`):
        - `simpleLogger`'s inner function logs "Control : simpleLogger : inside return".
        - `withAppHeaders`'s inner function logs "Control : withAppHeaders : inside return".
        - The `helloWorldHandler` logs "Control : helloWorldHandler()".
        - `customResponseWriter`'s `Write` method logs "Control : Write(b []byte)" and captures the response status and length.
        - Finally, `simpleLogger` logs the request details including method, URL, status code, and duration.

This sequence demonstrates the execution flow of the middleware (`simpleLogger`, `withAppHeaders`) and the handler (`helloWorldHandler`), as well as the custom response writer in action.
