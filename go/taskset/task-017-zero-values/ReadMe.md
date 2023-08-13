# Zero Values

## Explaination

In Go, when you declare a variable without explicitly initializing it with a value, the variable is assigned a default zero value. This default value is specific to the variable's type.

The provided code demonstrates these default zero values:

```go
package main
```

This line specifies that the program belongs to the `main` package.

```go
import "fmt"
```

Imports the `fmt` package for formatted I/O operations.

The next lines declare three variables, each of a different type:

```go
var x int
var y string
var z bool
```

- `x` is of type `int`.
- `y` is of type `string`.
- `z` is of type `bool`.

Since none of these variables have been assigned a value upon declaration, they are assigned their respective type's zero value.

```go
func main() {
```

Defines the `main` function, the entry point of the program.

```go
    // Default 0 values
    fmt.Println(x)
    fmt.Println(y)
    fmt.Println(z)
}
```

Here, the program prints the zero values of each variable:

- `x`: The zero value for an `int` is `0`.
- `y`: The zero value for a `string` is an empty string (`""`), so nothing will be visibly printed for `y`.
- `z`: The zero value for a `bool` (boolean) is `false`.

### Summary

When you run the program, the output will be:

```bash
0

false
```

There's an empty line between `0` and `false` due to the empty string being the zero value for strings.

In Go, the concept of zero values ensures that variables are always initialized and don't contain random or unexpected data.

## Output

- Run the following command

```bash
$ go run main.go
0

false
```
