# [Model binding and validation](https://gin-gonic.com/docs/examples/binding-and-validation)

## Run

```bash
$ go mod init task_073_gin_model_binding_and_validation
go: creating new go.mod: module task_073_gin_model_binding_and_validation
go: to add module requirements and sums:
        go mod tidy

$ go mod tidy
```

```bash
# Terminal 1
$ go run .   
[GIN-debug] POST   /loginJSON                --> main.main.func1 (3 handlers)
[GIN-debug] Listening and serving HTTP on :8080
```

```bash
curl -v \
  http://localhost:8080/loginJSON \
  -H 'content-type: application/json' \
  -d '{"user": "manu", "password": "123"}'
```

Output

```bash
> POST /loginJSON HTTP/1.1
> Host: localhost:8080
> User-Agent: curl/8.1.2
> Accept: */*
> content-type: application/json
> Content-Length: 35
...
< HTTP/1.1 200 OK
< Content-Type: application/json; charset=utf-8
...
{"status":"you are logged in"
```

```bash
curl -v \
  http://localhost:8080/loginJSON \
  -H 'content-type: application/json' \
  -d '{ "user": "manu" }'
```

Output

```bash
> POST /loginJSON HTTP/1.1
> Host: localhost:8080
> User-Agent: curl/8.1.2
> Accept: */*
...
< HTTP/1.1 400 Bad Request
< Content-Type: application/json; charset=utf-8
...
{"error":"Key: 'Login.Password' Error:Field validation for 'Password' failed on the 'required' tag"}
```
