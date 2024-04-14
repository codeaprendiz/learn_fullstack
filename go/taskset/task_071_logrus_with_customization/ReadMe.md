# [logrus](https://pkg.go.dev/github.com/sirupsen/logrus)

[github » sirupsen/logrus](https://github.com/sirupsen/logrus)

[Example](https://pkg.go.dev/github.com/sirupsen/logrus#readme-example)

## Run

```bash
$ go mod init logrus_with_customization
go: creating new go.mod: module logrus_with_customization
go: to add module requirements and sums:
        go mod tidy

$ go mod tidy                          
go: finding module for package github.com/sirupsen/logrus
go: found github.com/sirupsen/logrus in github.com/sirupsen/logrus v1.9.3

## When log level is set to Warn, only Warn, Error and Fatal logs are printed, you can set the level in init() function by : log.SetLevel(log.WarnLevel)
$ go run .
{"level":"warning","msg":"The group's number increased tremendously!","number":122,"omg":true,"time":"2024-03-23T14:08:22+04:00"}
{"level":"fatal","msg":"The ice breaks!","number":100,"omg":true,"time":"2024-03-23T14:08:22+04:00"}
exit status 1

## When log level is set to Info, only Info, Warn, Error and Fatal logs are printed, you can set the level in init() function by : log.SetLevel(log.InfoLevel)
## Also note the common field is added to info logs by : contextLogger.WithFields(log.Fields{"common": "this is a common field", "other": "I also should be logged always"})
$ go run .
{"animal":"walrus","level":"info","msg":"A group of walrus emerges from the ocean","size":10,"time":"2024-03-23T14:14:04+04:00"}
{"level":"warning","msg":"The group's number increased tremendously!","number":122,"omg":true,"time":"2024-03-23T14:14:04+04:00"}
{"common":"this is a common field","level":"info","msg":"I'll be logged with common and other field","other":"I also should be logged always","time":"2024-03-23T14:14:04+04:00"}
{"common":"this is a common field","level":"info","msg":"Me too","other":"I also should be logged always","time":"2024-03-23T14:14:04+04:00"}
{"level":"fatal","msg":"The ice breaks!","number":100,"omg":true,"time":"2024-03-23T14:14:04+04:00"}
exit status 1
```
