# Adding dependency

## Explaination

In the provided code, you have a Go package named `hello` which contains a single function `Hello`.

### The Code

```go
package hello

import "rsc.io/quote"

func Hello() string {
    return quote.Hello()
}
```

### Explanation:

1. `package hello`: This declares that the code belongs to a package named `hello`.

2. `import "rsc.io/quote"`: This line imports a package named `quote` from the path `rsc.io/quote`. The `rsc.io/quote` is an example module provided by the Go team for demonstration purposes in their tutorial about Go modules. It contains some simple functions that return various quotes.

3. `func Hello() string`: This declares a function named `Hello` that returns a `string`.

4. `return quote.Hello()`: Within the `Hello` function, you're making a call to the `Hello()` function from the imported `quote` package. So when the `Hello` function of the `hello` package is invoked, it in turn invokes the `Hello()` function from the `quote` package and returns its result.

### What does it do?

When you call the `Hello` function from this `hello` package, it internally calls the `Hello` function from the `rsc.io/quote` package and returns a famous "Hello, World!" quote.

In essence, the `hello` package serves as a wrapper around the functionality provided by the `rsc.io/quote` package in this context.

### Unit Test

Certainly! The code you've provided is a simple Go unit test for a function named `Hello` in the `hello` package. Let me break it down for you:

```go
package hello
```

This line declares that the code belongs to a package named `hello`. In Go, packages are a way to organize and reuse code. The `main` package is special and is where the `main` function (the program's entry point) is defined, but this is a test file for the `hello` package.

```go
import "testing"
```

Here, we're importing Go's built-in `testing` package. This package provides support for automated testing of Go packages, including functionalities like benchmarking.

```go
func TestHello(t *testing.T) {
```

This is the start of a test function. All test functions in Go start with the word `Test`, followed by a name that starts with a capital letter. It takes one argument, `t`, which is a pointer to `testing.T`. This provides methods for reporting test failures and logging.

```go
    want := "Hello, world."
```

This line initializes a variable called `want` with the string "Hello, world.", which represents the expected output from the `Hello` function.

```go
    if got := Hello(); got != want {
```

This line calls the `Hello` function and assigns its return value to a variable named `got`. It then checks if `got` is not equal to `want`. If they are not the same, the code inside the `if` block will execute.

```go
        t.Errorf("Hello() = %q, want %q", got, want)
```

If the test detects a discrepancy between the expected output (`want`) and the actual output (`got`), this line logs an error. The `%q` verb is used to safely quote a string value, so any special characters in the string are escaped.

In summary, this test ensures that the `Hello` function from the `hello` package returns the string "Hello, world.". If the function returns anything other than that, the test will fail and report an error.

### Short Variable Declaration inside if / for / switch

Using a short variable declaration inside an `if` statement (or `for` and `switch` statements) is a common idiomatic pattern in Go. This allows you to both declare and initialize a variable in the same line as a condition, which can make the code more concise and arguably more readable.

In the case of:

```go
if got := Hello(); got != want {
```

Here's what's happening step by step:

1. `got := Hello()`: The function `Hello()` is called, and its return value is assigned to the `got` variable.
2. `got != want`: This is the condition that is checked. If `got` is not equal to `want`, the code inside the `if` block will execute.

This pattern is useful when you want to limit the scope of a variable to just the conditional block. In this example, the `got` variable is only accessible within the `if` block and won't be available outside of it.

This style helps in ensuring that variables that are only relevant to specific conditions don't pollute the surrounding scope. It also can make the code clearer because you're declaring the variable right where you're using it.

## Output

- Run the following command

```bash
$ go test                      
hello.go:3:8: no required module provides package rsc.io/quote; to add it:
        go get rsc.io/quote
```

- Install the modules

```bash
$ go get 
go: downloading rsc.io/quote v1.5.2
go: downloading rsc.io/sampler v1.3.0
go: downloading golang.org/x/text v0.0.0-20170915032832-14c0d48ead0c
go get: added rsc.io/quote v1.5.2

$ cat go.mod                   
module example.com/hello

go 1.16

require rsc.io/quote v1.5.2
```

### Files

```bash
$ tree            
.
├── ReadMe.md
├── go.mod
├── go.sum
├── hello.go
└── hello_test.go
```

let's break down the significance of each file:

1. **`go.mod`**:
   - This file is part of Go's modules feature, introduced in Go 1.11. 
   - It defines the module path, which is the import path used for the root directory, and its dependency requirements, which are the other modules this module depends on.
   - Whenever you run commands like `go get`, `go build`, or `go test`, the Go tools use the `go.mod` file to find out about the module and its dependencies.

2. **`go.sum`**:
   - Alongside `go.mod`, there's `go.sum` which records the expected cryptographic checksums of the content of specific module versions.
   - For each dependency you fetch, Go will check the content against the hashes in `go.sum` to ensure the module hasn't been tampered with since `go.sum` was generated. This is an added layer of security to verify the integrity of modules.

3. **`hello.go`**:
   - This is the main code file for the `hello` module. 
   - Typically, this file contains the implementation of your program or library. For instance, based on the naming, it likely contains a function or method related to printing a "hello" message.

4. **`hello_test.go`**:
   - This is the test file associated with `hello.go`.
   - In Go, it's idiomatic to have tests alongside your code. Any file that ends with `_test.go` is recognized by the Go tooling as a test file.
   - The tests in this file are designed to verify the functionality in `hello.go`. For example, if there's a `Hello` function in `hello.go`, there might be a corresponding test function in `hello_test.go` (like `TestHello`) that ensures this function works as expected.

The use of `go.mod` and `go.sum` reflects a module-aware mode of operation. If you've worked with Go before the introduction of modules (before Go 1.11), you'd remember that dependency management was a lot more manual or reliant on third-party tools. Now, with modules, Go has built-in dependency and package version management.