# Constants

## Explaination

Certainly! In the code you provided, you're using both typed and untyped constants. Here's an explanation of the code:

```go
package main

import (
    "fmt"
)

// Define typed and untyped constants
const (
    // Typed constant: An integer constant with the value 10 and the data type int.
    a int = 10

    // Untyped constants: These are constants that don't have a specific data type defined.
    // Instead, their type is determined based on the context in which they are used.
    b = 2.1     // An untyped constant with the value 2.1 and inferred type float64.
    c = "Hello" // An untyped constant with the value "Hello" and inferred type string.
)

func main() {
    fmt.Println(a) // Print the value of the typed constant 'a' (output: 10)
    fmt.Println(b) // Print the value of the untyped constant 'b' (output: 2.1)
    fmt.Println(c) // Print the value of the untyped constant 'c' (output: Hello)
}
```

Here's a breakdown of the key points:

1. **Typed Constants**: Typed constants have a specific data type explicitly defined. In this case, `a` is a typed constant of type `int` with the value 10. The data type `int` is explicitly specified.

2. **Untyped Constants**: Untyped constants are constants without a specific data type defined. Their type is determined based on the context in which they are used. In this case, `b` is an untyped constant with the value 2.1. Since it's a floating-point value, its type is inferred as `float64`. Similarly, `c` is an untyped constant with the value "Hello," and its type is inferred as `string`.

3. **Print Statements**: In the `main()` function, you're printing the values of the constants using `fmt.Println()`. This will output the values of the constants as follows:
   - `a` is a typed constant of type `int`, so it is printed as the integer value 10.
   - `b` is an untyped constant with the value 2.1, so it is printed as the floating-point value 2.1.
   - `c` is an untyped constant with the value "Hello", so it is printed as the string "Hello".

In summary, the code demonstrates how both typed and untyped constants are used and printed in Go. Typed constants have an explicitly defined type, while untyped constants have their types inferred based on usage context.

## Output

- Run the following command

```bash
$ go run main.go
10
2.1
Hello
```
