# Bool

## Explaination

Let's dive into the code:

```go
package main
```

This line specifies that the program belongs to the `main` package.

```go
import "fmt"
```

This line imports the `fmt` package, which provides functions for formatted input and output.

```go
func main() {
```

Defines the `main` function, which is the entry point of the Go program.

Inside the `main` function:

```go
a := 4
```

Here, you're using short variable declaration to declare a new variable `a` and assigning it the value `4`.

```go
b := 5
```

Similarly, you're declaring a new variable `b` and assigning it the value `5`.

```go
fmt.Println(a==b)
```

This line compares the values of `a` and `b` using the `==` operator. Since `4` is not equal to `5`, the comparison results in `false`.

The `==` operator, when used with two integers, checks for their equality and returns a boolean value (`true` or `false`). In this specific case, `a` and `b` are not equal, so the result is `false`.

So, when you run this program, the output will be:

```bash
false
```

In summary, the code demonstrates how to use boolean comparisons in Go by comparing the equality of two integers and printing the result.

## Output

- Run the following command

```bash
$ go run main.go
false
```
