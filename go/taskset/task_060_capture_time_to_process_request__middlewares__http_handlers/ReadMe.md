# Capture time to process the request

## Run

```bash
# Terminal 1
$ go run main.go
2023/11/27 12:47:25 Control : simpleLogger

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
< Date: Mon, 27 Nov 2023 07:18:39 GMT
< Content-Length: 14
< Content-Type: text/plain; charset=utf-8
< 
Hello, World!
* Connection #0 to host localhost left intact

# Terminal 1
$ go run main.go
2023/11/27 12:47:25 Control : simpleLogger
2023/11/27 12:48:39 Control : simpleLogger : inside return
2023/11/27 12:48:39 Control : helloWorldHandler
2023/11/27 12:48:39 Request to /path took 6.292µs
```

## Explaination

The sequence of the output from your Go program is due to how Go evaluates and executes function calls and handlers:

1. **Server Initialization (Terminal 1)**:
    - `simpleLogger(helloWorldHandler)` is evaluated.
    - `simpleLogger` logs "Control : simpleLogger" during its setup (before the return statement).

2. **Handling a Request (Terminal 2)**:
    - When a request is made (`curl -v localhost:8080/path`), the middleware (`simpleLogger`) and the handler (`helloWorldHandler`) are executed.
    - `simpleLogger`'s returned function logs "Control : simpleLogger : inside return".
    - Then, `helloWorldHandler` executes, logging "Control : helloWorldHandler".
    - After `helloWorldHandler` completes, `simpleLogger` logs the request duration ("Request to /path took ...").

This demonstrates the middleware pattern in Go, where the initial log is from the middleware setup, and subsequent logs are from actual request processing.
