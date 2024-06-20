# Practice 1

## Explaination

Certainly! The provided Go code demonstrates the usage of different types of loops. Here's an explanation for each loop in the code:

```go
package main

import "fmt"

func main() {
    // Loop using a condition
    x := 1
    for x < 10 {
        fmt.Println("x is", x)
        x++
    }

    // Infinite loop with a condition and break statement
    y := 1
    for {
        if y > 5 {
            break
        }
        fmt.Println("y is", y)
        y++
    }

    // Loop with initialization, condition, and post statement
    for i := 0; i < 10; i++ {
        fmt.Println("i is", i)
    }
}
```

Here's the explanation for each loop:

1. **Loop using a Condition (`for x < 10`)**:
   - `x := 1`: Initializes the variable `x` with the value 1.
   - `for x < 10`: This loop iterates as long as the condition `x < 10` is true. In each iteration, it prints the value of `x`, increments `x` by 1, and continues until `x` becomes 10.

2. **Infinite Loop with a Condition and Break (`for {}`)**:
   - `y := 1`: Initializes the variable `y` with the value 1.
   - `for {}`: This loop is an infinite loop that keeps iterating indefinitely.
   - `if y > 5 { break }`: Inside the loop, there's an `if` condition. If `y` becomes greater than 5, the `break` statement is executed, which terminates the loop. Before the break, the loop prints the value of `y` and increments it by 1.

3. **Loop with Initialization, Condition, and Post Statement (`for i := 0; i < 10; i++`)**:
   - `for i := 0; i < 10; i++`: This loop follows the traditional loop structure with three components: initialization, condition, and post statement. It initializes the variable `i` with 0, iterates as long as `i` is less than 10, and increments `i` by 1 in each iteration. Inside the loop, it prints the value of `i`.

When you run the code, you'll see the output of each loop in the console, demonstrating the different ways to create and control loops in Go.

## Output

```bash
$ go run main.go                             
 x is  1
 x is  2
 x is  3
 x is  4
 x is  5
 x is  6
 x is  7
 x is  8
 x is  9
y is  1
y is  2
y is  3
y is  4
y is  5
i is  0
i is  1
i is  2
i is  3
i is  4
i is  5
i is  6
i is  7
i is  8
i is  9
```
