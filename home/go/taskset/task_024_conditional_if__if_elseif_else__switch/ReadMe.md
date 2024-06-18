# Conditional

## Explaination

The provided Go code demonstrates the usage of conditional statements (`if`, `else if`, `else`, and `switch`) to control the flow of your program based on different conditions. Here's an explanation of each section of the code:

```go
package main

import "fmt"

func main() {
    // Simple if statement
    if true {
        fmt.Println("This is always true")
    }

    // Conditional if statement
    if 2 == 2 {
        fmt.Println("2 == 2")
    }

    // if-else-if-else statement
    x := 2
    if x == 1 {
        fmt.Println("x == 1 is true", x)
    } else if x == 3 {
        fmt.Println("x == 3 is true", x)
    } else {
        fmt.Println("None was true")
    }

    // Switch statement without expression
    switch {
    case false:
        fmt.Println("Not print")
    case 2 == 2:
        fmt.Println("2 == 2")
        // fallthrough implies that the control should follow with the next case
        fallthrough
    case 3 == 3:
        fmt.Println("3 == 3")
    default:
        fmt.Println("This is default")
    }

    // Switch statement with expression
    switch "TEST" {
    case "one":
        fmt.Println("one")
    case "two":
        fmt.Println("two")
    case "TEST":
        fmt.Println("TEST")
    default:
        fmt.Println("This should default")
    }
}
```

Here's the breakdown of each section:

1. **Simple `if` Statement**: This `if` statement checks if the condition `true` is true. Since it is always true, the associated code block is executed and prints "This is always true."

2. **Conditional `if` Statement**: This `if` statement checks if the condition `2 == 2` is true. Since it is true, the code block prints "2 == 2."

3. **`if-else-if-else` Statement**: This constructs a multi-branch decision. If `x` equals 1, it prints "x == 1 is true." If `x` equals 3, it prints "x == 3 is true." Otherwise, it prints "None was true."

4. **`switch` Statement without Expression**: The `switch` statement without an expression evaluates cases based on their conditions. The `fallthrough` keyword is used to allow the control to continue to the next case even after a match.

5. **`switch` Statement with Expression**: The `switch` statement here evaluates cases based on the value of the expression "TEST." Since the expression matches the third case, "TEST," it prints "TEST."

The code demonstrates various ways to use conditional statements to make decisions in your Go program based on different conditions.

## Output

- Run the following command

```bash
$ go run main.go
This is always true
is 2==2
None was true
2==2
3==3
TEST
```
