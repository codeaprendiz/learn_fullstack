# Printing Logging

## Explaination

Sure, let's break this down step by step:

### Import Statements

```go
import (
	"fmt"
	"log"
	"os"
)

```

Three packages are imported:

1. `fmt`: Used for formatted I/O.
2. `log`: Provides flexible logging of messages, fatal errors, and panic triggers.
3. `os`: Provides a platform-independent interface to operating system functionality.

### Main Function

```go
func main() {
	_, err := os.Open("somefile")
	if err != nil {
```

Here, the program attempts to open a file named "somefile". If the file cannot be opened (doesn't exist, lacks permissions, etc.), `os.Open` returns a non-nil error (`err`).

### Handling Errors

If an error is encountered, the subsequent statements within the `if` block are executed:

1. **fmt.Println**

```go
fmt.Println("fmt.Pritln => Error happened: ", err)
```

This line prints the error message using `fmt.Println`. The output will be directed to the standard output (typically the console).

2. **log.Println**

```go
log.Println("log.Println => Error happened: ", err)
```

`log.Println` logs the error message along with additional information such as the date and time. This can be helpful for debugging, as you know when the error occurred.

3. **log.Fatal**

```go
log.Fatal("log.Fatal => Error happened: ",err)
```

`log.Fatal` is similar to `log.Println` in that it logs the error message with date and time, but it also calls `os.Exit(1)` afterwards, which will terminate the program immediately with an exit status of 1. This means that any code after this call will NOT be executed. Because of this, the following line with `log.Panic` will never get executed.

4. **log.Panic (This won't be executed)**

```go
log.Panic("log.Panic => Error happened: ",err)
```

Even though this line won't get executed due to the previous `log.Fatal`, for the sake of explanation: `log.Panic` is similar to `log.Fatal` in that it logs the message, but instead of simply exiting, it also calls `panic` after logging. A panic in Go stops the normal flow of a program and begins panicking. This will also result in the program terminating, but not before deferred functions (if any exist) are called.

### Summary

In this code, if the file named "somefile" cannot be opened, the program will print an error message with `fmt`, log the error with a timestamp using `log`, then terminate the program using `log.Fatal`. The call to `log.Panic` will never be reached due to the termination caused by `log.Fatal`.

## Output

Run the following

```bash
$ go run main.go
fmt.Pritln => Error happened:  open somefile: no such file or directory
2021/06/12 09:53:59 log.Println => Error happened:  open somefile: no such file or directory
2021/06/12 09:53:59 log.Fatal => Error happened: open somefile: no such file or directory
exit status 1
```
