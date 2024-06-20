# [logrus](https://pkg.go.dev/github.com/sirupsen/logrus)

[github » sirupsen/logrus](https://github.com/sirupsen/logrus)

[type Hook](https://pkg.go.dev/github.com/sirupsen/logrus#Hook)

```go
type Hook interface {
    Levels() []Level
    Fire(*Entry) error
}
```

A hook to be fired when logging on the logging levels returned from `Levels()` on your implementation of the interface.

## Run

```bash
$ go mod init logrus_hooks             
go: creating new go.mod: module logrus_hooks
go: to add module requirements and sums:
        go mod tidy

$ go mod tidy             
go: finding module for package github.com/sirupsen/logrus
go: found github.com/sirupsen/logrus in github.com/sirupsen/logrus v1.9.3

$ go run .
INFO[0000] This is an info message                       customField=customValue
WARN[0000] This is a warning message                    
ERRO[0000] This is an error message   
```
