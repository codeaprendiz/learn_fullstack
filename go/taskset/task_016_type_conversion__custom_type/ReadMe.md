# Type Conversion

## Explaination

Sure! Let's break down the provided code, specifically focusing on the concept of type conversion in Go.

### Code Overview

```go
package main
```

The program belongs to the `main` package, which denotes an executable program in Go.

```go
import "fmt"
```

This imports the `fmt` package, which contains functions for formatted I/O operations.

```go
var a int
```

Declares a variable `a` of type `int`.

```go
type testtype int
```

Defines a new custom type `testtype` that is an alias for the built-in `int` type.

```go
var b testtype
```

Declares a variable `b` of the custom type `testtype`.

```go
func main() {
```

Defines the `main` function, the entry point of the program.

```go
    a = 23
    b = 34
```

Assigns values to variables `a` and `b`.

```go
    fmt.Println(a)
    fmt.Println(b)
```

Prints the values of `a` and `b`.

```go
    fmt.Printf("\n%T", a)
    fmt.Printf("\n%T\n", b)
```

Prints the types of `a` and `b` using the `%T` format specifier. It will print `int` for `a` and `main.testtype` for `b`.

### Type Conversion

In Go, you can't directly assign a value of one type to a variable of another type even if the underlying data representation is the same. So, even though `testtype` is essentially an `int`, you can't directly assign a value of type `testtype` to a variable of type `int` and vice versa.

Here's where type conversion comes in:

```go
    a = int(b)
```

Converts the value of `b` (which is of type `testtype`) to `int` and assigns it to the variable `a`. This is known as type conversion or type casting. You're essentially telling the compiler, "I know `b` is of type `testtype`, but for this operation, please treat it as an `int`."

After this conversion:

```go
    fmt.Println(a)
```

Prints the value of `a`, which is now `34`.

```go
    fmt.Printf("%T\n", a)
```

Confirms the type of `a` is `int`.

### Summary

In the program, the use of type conversion is illustrated by converting a value of custom type `testtype` to a built-in `int`. It showcases how you can move values between different types, provided they have the same underlying type.

## Output

- Run the following command

```bash
$ go run main.go
23
34

int
main.testtype
34
int
```