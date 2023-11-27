# Custom Types

## Explaination

Certainly! Let's break down the provided code to understand custom types in Go:

```go
package main
```

The program belongs to the `main` package, which is a special package in Go. Programs that need to be directly executable must have a `main` function in the `main` package.

```go
import "fmt"
```

This imports the `fmt` package, which contains functions for formatted I/O operations, such as printing to the console.

```go
var a int
```

Here, a variable `a` is declared of type `int`. It can hold integer values.

```go
type testtype int
```

This is the main point of focus for custom types. The line creates a new custom type named `testtype` which is an alias for the built-in `int` type. Even though `testtype` is an alias for `int`, they are considered different types by the Go compiler. This allows you to create more descriptive types based on existing ones.

```go
var b testtype
```

Declares a variable `b` of type `testtype`.

```go
func main() {
```

Defines the `main` function, which is the starting point for the execution of the program.

```go
    a = 23
    b = 34
```

Assigns values to the previously declared variables `a` and `b`.

```go
    fmt.Println(a)
    fmt.Println(b)
```

Prints the values of `a` and `b` to the console.

```go
    fmt.Printf("\n%T", a)
    fmt.Printf("\n%T\n", b)
```

These lines print the types of variables `a` and `b`. The `%T` format specifier in `Printf` is used to print the type of a variable. The result will show that `a` is of type `int` and `b` is of type `main.testtype` (our custom type). 

In summary, this program introduces the concept of custom types in Go, allowing for more descriptive and type-safe code. The custom type `testtype` is an alias for `int`, and while it holds integer values just like an `int`, the Go compiler treats it as a separate type. This provides a layer of abstraction and can be useful in situations where you want to differentiate between different kinds of data, even if they are based on the same underlying type.

## Run

- Run the following command

```bash
$ go run main.go                  
23
34

int
main.testtype
```
