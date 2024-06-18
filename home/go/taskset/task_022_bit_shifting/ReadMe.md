# Bit Shifting

## Explaination

Bit shifting is a bitwise operation that involves moving the bits of a binary number to the left or right by a specified number of positions. In Go, the `<<` operator is used for left bit shifting.

Here's an explanation of your code:

```go
package main

import "fmt"

func main() {
    a := 2          // Decimal value: 2, Binary: 0010
    var b int       // Declare an integer variable b
    b = a << 1      // Left shift a by 1 position: 0010 << 1 = 0100 (Decimal: 4)
    fmt.Printf("a value is %d  and in binary %b", a, a)
    fmt.Printf("\nb value is %d and in binary after bit shifting is %b", b, b)
}
```

Here's a breakdown of what's happening:

1. `a := 2`: Declares a variable `a` with a decimal value of 2. In binary, `2` is represented as `0010`.

2. `b = a << 1`: Performs a left bit shift operation on the value of `a`. The `<<` operator shifts the bits to the left by the specified number of positions. In this case, `a` is shifted left by 1 position, resulting in `0100`, which is 4 in decimal.

3. `fmt.Printf("a value is %d  and in binary %b", a, a)`: Prints the value of `a` and its binary representation. The `%d` format specifier is used to print the decimal value, and `%b` is used to print the binary representation.

4. `fmt.Printf("\nb value is %d and in binary after bit shifting is %b", b, b)`: Prints the value of `b` (which is the result of bit shifting) and its binary representation after the bit shift operation.

When you run the code, the output will be:

```bash
a value is 2  and in binary 10
b value is 4 and in binary after bit shifting is 100
```

This demonstrates how bit shifting works by shifting the bits to the left, effectively multiplying the number by 2 for each position shifted.

## Output

- Run the following command

```bash
$ go run main.go
a value is 2  and in binary 10
b value is 4 and in binary is 100
```
