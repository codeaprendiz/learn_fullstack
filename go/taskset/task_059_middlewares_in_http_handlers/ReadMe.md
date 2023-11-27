# Nested Handlers

In this updated version:

- `httpLog` is a middleware function that logs each request URL.
- `withAppHeaders` is another middleware function that adds a custom header to the response.
- The `handler` function is now wrapped with these two middleware functions, which will execute in the order they are applied (`httpLog` first, then `withAppHeaders`, and finally `handler`).

When you run this server and access it, you'll see log messages for each request, and the response will include a custom header. This demonstrates how middleware can be nested and chained together in Go's HTTP server framework.

> why are we wrapping functions inside another ? like why httpLog(withAppHeaders(handler))? , we can very well have only one function and have all the functionality there?

Wrapping functions like `httpLog(withAppHeaders(handler))` in Go's HTTP handling is a common pattern known as middleware. It allows for:

1. **Separation of Concerns**: Each function handles a specific task (logging, adding headers, handling requests). This makes the code more modular, easier to read, maintain, and test.

2. **Reusability**: Middleware functions can be reused across different routes or projects. For instance, `httpLog` could be used with any handler, not just `handler`.

3. **Flexibility**: It's easier to add or remove functionality. For example, you could introduce new middleware for authentication without changing existing handlers or logging logic.

4. **Chaining**: Middleware can be chained together in different combinations to create specific request handling pipelines for different routes.

This pattern is a cornerstone of web server design in many frameworks and languages, offering a clean and scalable way to build complex web applications.

## Run

```bash
# Terminal 1
$ go run main.go
2023/11/27 11:13:17 Control : withAppHeaders
2023/11/27 11:13:17 Control : httpLog

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
< X-Custom-Header: my-value
< Date: Mon, 27 Nov 2023 05:43:32 GMT
< Content-Length: 42
< Content-Type: text/plain; charset=utf-8
< 
* Connection #0 to host localhost left intact
Control : handler ::  URL.Path[1:] :  path

# Terminal 1
$ go run main.go
2023/11/27 11:13:17 Control : withAppHeaders
2023/11/27 11:13:17 Control : httpLog
2023/11/27 11:13:32 Control : httpLog : inside return : r.URL.Path : /path
2023/11/27 11:13:32 Control : withAppHeaders : inside return
2023/11/27 11:13:32 Control : handler
```

> Why do we see withAppHeaders before httpLog?

The reason we see "The control is at withAppHeaders" before "The control is at httpLog" in your logs is due to how function calls are evaluated in Go, particularly in the case of nested function calls like `httpLog(withAppHeaders(handler))`.

Let's reanalyze the output:

1. **Server Initialization (Terminal 1)**:
    - When `main()` function executes `http.HandleFunc("/", httpLog(withAppHeaders(handler)))`, the function calls are evaluated inside-out due to Go's function evaluation order.
    - First, `withAppHeaders(handler)` is evaluated. This causes the log statement inside `withAppHeaders` to execute, logging "Control : withAppHeaders".
    - After that, `httpLog` is called with the result of `withAppHeaders(handler)`. This triggers the log statement inside `httpLog`, logging "Control : httpLog".

2. **Handling a Request (Terminal 2)**:
    - During an actual HTTP request, the middleware functions execute in the order they were wrapped. First, `httpLog`'s inner function (the one returned by `httpLog`), then `withAppHeaders`'s inner function, and finally `handler`.

In Go, during the setup phase (server initialization), the innermost function (`withAppHeaders`) is evaluated first, causing its log statement to be executed before `httpLog`'s. This results in "Control : withAppHeaders" appearing before "Control : httpLog" in the server initialization logs.
