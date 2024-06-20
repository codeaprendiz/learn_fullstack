# Go Modules

## Explaination

Certainly! Let's break this down.

### The Code Structure

You have two Go files here:

1. `hello_test.go`: This file contains the test for the `hello` package.
2. `hello.go`: This file contains the implementation of the `hello` package.

### hello.go

```go
package hello

func Hello() string {
    return "Hello, world."
}
```

This file defines a package named `hello` with a function named `Hello()`. The function `Hello()` simply returns the string `"Hello, world."`.

### hello_test.go

```go
package hello

import "testing"

func TestHello(t *testing.T) {
    want := "Hello, world."
    if got := Hello(); got != want {
        t.Errorf("Hello() = %q, want %q", got, want)
    }
}
```

This file also defines a package named `hello` and contains a test function for the `Hello()` function from the `hello.go` file. Here's what each part does:

- `func TestHello(t *testing.T)`: This is a test function named `TestHello`. All test functions in Go start with the word `Test`, followed by a word or phrase that starts with a capital letter. It takes a pointer to `testing.T` as a parameter, which provides methods for reporting test failures and logging.

- `want := "Hello, world."`: This line declares a variable named `want` and assigns the string `"Hello, world."` to it. This is the expected output of the `Hello()` function.

- `if got := Hello(); got != want`: This line declares a variable named `got` and immediately assigns the return value of the `Hello()` function to it. Then, it checks if the value of `got` is not equal to the value of `want`.

- `t.Errorf("Hello() = %q, want %q", got, want)`: If the above condition is true (i.e., the returned value from the `Hello()` function is not what we expected), this line logs an error using the `Errorf` method from the `testing.T` type. The `%q` verb is used to safely quote a string value, so the logged error will show the actual string returned by `Hello()` and the expected string, making discrepancies easy to spot.

### Summary

The test function `TestHello` checks whether the `Hello()` function in the `hello` package returns the expected string `"Hello, world."`. If the function returns anything different, the test will fail, and an error message will be logged, indicating what the function returned and what was expected.

## Running we get

- Run the following command

```bash
$ ls
ReadMe.md     hello.go      hello_test.go

$ go test
go: cannot find main module, but found .git/config in ~/workspace/devops-essentials
        to create a module there, run:
        cd ../.. && go mod init


$ go mod init example.com/hello
go: creating new go.mod: module example.com/hello
go: to add module requirements and sums:
        go mod tidy

$ ls
ReadMe.md     go.mod        hello.go      hello_test.go

$ go test
PASS
ok      example.com/hello       0.397s        
```
