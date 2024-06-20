# [Bind URI](https://gin-gonic.com/docs/examples/bind-uri)

## Run

```bash
$ go mod init task_074_bind_uri_gin                    
go: creating new go.mod: module task_074_bind_uri_gin
go: to add module requirements and sums:
        go mod tidy

$ go mod tidy                      
go: finding module for package github.com/gin-gonic/gin
go: found github.com/gin-gonic/gin in github.com/gin-gonic/gin v1.9.1
```

```bash
# Terminal 1
$ go run .   
...
[GIN-debug] GET    /:name/:id                --> main.main.func1 (3 handlers)
[GIN-debug] Listening and serving HTTP on :8088
...
## After hitting requests, the server will log the following:
[GIN] 2024/04/14 - 14:52:43 | 200 |      45.458µs |       127.0.0.1 | GET      "/test/987fbc97-4bed-5078-9f07-9141ba07c9f3"
[GIN] 2024/04/14 - 14:53:33 | 400 |      40.958µs |       127.0.0.1 | GET      "/test/not-uuid"
```

```bash
# Terminal 2
$ curl -v localhost:8088/test/987fbc97-4bed-5078-9f07-9141ba07c9f3
*   Trying 127.0.0.1:8088...
* Connected to localhost (127.0.0.1) port 8088 (#0)
> GET /test/987fbc97-4bed-5078-9f07-9141ba07c9f3 HTTP/1.1
> Host: localhost:8088
> User-Agent: curl/8.1.2
> Accept: */*
> 
< HTTP/1.1 200 OK
< Content-Type: application/json; charset=utf-8
< Date: Sun, 14 Apr 2024 10:52:43 GMT
< Content-Length: 61
< 
* Connection #0 to host localhost left intact
{"name":"test","uuid":"987fbc97-4bed-5078-9f07-9141ba07c9f3"}
```

```bash
$ curl -v localhost:8088/test/not-uuid
*   Trying 127.0.0.1:8088...
* Connected to localhost (127.0.0.1) port 8088 (#0)
> GET /test/not-uuid HTTP/1.1
> Host: localhost:8088
> User-Agent: curl/8.1.2
> Accept: */*
> 
< HTTP/1.1 400 Bad Request
< Content-Type: application/json; charset=utf-8
< Date: Sun, 14 Apr 2024 10:53:33 GMT
< Content-Length: 12
< 
* Connection #0 to host localhost left intact
{"msg":[{}]}
```
