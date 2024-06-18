# [Only bind query string](https://gin-gonic.com/docs/examples/only-bind-query-string)

## Run

```bash
$ go mod init task_075_gin_bind_query_string
go: creating new go.mod: module task_075_gin_bind_query_string
go: to add module requirements and sums:
        go mod tidy

$ go mod tidy
```

```bash
# Terminal 1
$ go run .   
[GIN-debug] GET    /testing                  --> main.startPage (3 handlers)
[GIN-debug] POST   /testing                  --> main.startPage (3 handlers)
[GIN-debug] PUT    /testing                  --> main.startPage (3 handlers)
[GIN-debug] PATCH  /testing                  --> main.startPage (3 handlers)
[GIN-debug] HEAD   /testing                  --> main.startPage (3 handlers)
[GIN-debug] OPTIONS /testing                  --> main.startPage (3 handlers)
[GIN-debug] DELETE /testing                  --> main.startPage (3 handlers)
[GIN-debug] CONNECT /testing                  --> main.startPage (3 handlers)
[GIN-debug] TRACE  /testing                  --> main.startPage (3 handlers)
[GIN-debug] Listening and serving HTTP on :8085

## After hitting the endpoint with the query string...
2024/04/14 15:16:18 ====== Only Bind By Query String ======
2024/04/14 15:16:18 Jane
2024/04/14 15:16:18 1234 Street
[GIN] 2024/04/14 - 15:16:18 | 200 |       48.25µs |       127.0.0.1 | GET      "/testing?name=Jane&address=1234%20Street"
```

```bash
# %20 is the URL encoded value for space
$ curl -v http://localhost:8085/testing?name=Jane&address=1234%20Street
*   Trying 127.0.0.1:8085...
* Connected to localhost (127.0.0.1) port 8085 (#0)
> GET /testing?name=Jane&address=1234%20Street HTTP/1.1
> Host: localhost:8085
> User-Agent: curl/8.1.2
> Accept: */*
> 
< HTTP/1.1 200 OK
< Content-Type: text/plain; charset=utf-8
< Date: Sun, 14 Apr 2024 11:16:18 GMT
< Content-Length: 7
< 
* Connection #0 to host localhost left intact
Success
```
