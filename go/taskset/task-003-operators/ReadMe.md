# Operators

<<<<<<< Updated upstream
## Output

```bash
$ go run operators.go                             
=======
## Explaination

In Go, operators are special symbols or keywords that perform operations on variables and values. The provided program demonstrates the use of arithmetic operators in Go. Let's briefly explain each operator:

1. `+` (Addition): The `+` operator is used for addition. It adds two operands together.

2. `-` (Subtraction): The `-` operator is used for subtraction. It subtracts the second operand from the first operand.

3. `/` (Division): The `/` operator is used for division. It divides the first operand by the second operand.

Now, let's go through the program and its output:

```go
package main

import "fmt"

func main() {
   // Arithmetic Operators

   fmt.Printf("10 + 2 =  %v\n", 10 + 2)
   fmt.Printf("10 - 2 =  %v\n", 10 - 2)
   fmt.Printf("10 / 2 =  %v\n", 10 / 2)
   fmt.Printf("10 - 2 =  %v\n", 10 - 2)
}
```

The program prints the result of arithmetic operations using the arithmetic operators:

```
>>>>>>> Stashed changes
10 + 2 =  12
10 - 2 =  8
10 / 2 =  5
10 - 2 =  8
```
<<<<<<< Updated upstream
=======

Here's a breakdown of each line:

- `fmt.Printf("10 + 2 =  %v\n", 10 + 2)`: The expression `10 + 2` is evaluated, and the result (`12`) is substituted in the format string at `%v`. This line prints `10 + 2 = 12`.

- `fmt.Printf("10 - 2 =  %v\n", 10 - 2)`: The expression `10 - 2` is evaluated, and the result (`8`) is substituted in the format string at `%v`. This line prints `10 - 2 = 8`.

- `fmt.Printf("10 / 2 =  %v\n", 10 / 2)`: The expression `10 / 2` is evaluated, and the result (`5`) is substituted in the format string at `%v`. This line prints `10 / 2 = 5`.

- `fmt.Printf("10 - 2 =  %v\n", 10 - 2)`: This line is identical to the second line. It is a repetition of the subtraction operation and will print `10 - 2 = 8` again.

Overall, the program demonstrates how to use arithmetic operators to perform basic arithmetic operations in Go and prints the results using the `fmt.Printf` function.

The format string `%v` is used to represent any value, regardless of its type. In this case, the arithmetic expression `10 + 2` evaluates to the value `12`, which is then substituted into the format string at the `%v` placeholder. This way, the output shows the result of the addition (`12`) along with the text "10 + 2 = ".

## Output

```bash
$ go run operators.go 
10 + 2 =  12
10 - 2 =  8
10 / 2 =  5
10 - 2 =  8

$ go run operators-v2.go 
Addition : 10 + 2 = 12
```
>>>>>>> Stashed changes
