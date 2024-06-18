# [logrus](https://pkg.go.dev/github.com/sirupsen/logrus)

[github » sirupsen/logrus](https://github.com/sirupsen/logrus)

[Example](https://pkg.go.dev/github.com/sirupsen/logrus#readme-example)

## Run

```bash
$ go mod init logrus_getting_started
go: creating new go.mod: module logrus_getting_started
go: to add module requirements and sums:
        go mod tidy

$ go mod tidy                       
go: finding module for package github.com/sirupsen/logrus
go: found github.com/sirupsen/logrus in github.com/sirupsen/logrus v1.9.3
```

### Without the 2 second delay in program

```go
package main

import (
    log "github.com/sirupsen/logrus"
    "time"
)

func main() {
    log.WithFields(log.Fields{
        "animal": "walrus",
    }).Info("A walrus appears")
}
```

```bash

$ go run .   
INFO[0000] A walrus appears                              animal=walrus
```

### With the 2 second delay in program

```go
package main

import (
    log "github.com/sirupsen/logrus"
    "time"
)

func main() {
    // Sleep for 2 seconds before logging
    time.Sleep(2 * time.Second)

    log.WithFields(log.Fields{
        "animal": "walrus",
    }).Info("A walrus appears")
}
```

```bash
$ go run .
INFO[0002] A walrus appears                              animal=walrus
```
