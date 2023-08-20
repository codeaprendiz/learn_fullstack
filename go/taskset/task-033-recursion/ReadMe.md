# Recursion

## Explaination

This example demonstrates a classic use case for recursion to compute the factorial of a number. Let's break it down step by step.

1. **Factorial Concept**:
   Factorial of a non-negative integer `n`, denoted by `n!`, is the product of all positive integers less than or equal to `n`. For example:
   - \(3! = 3 \times 2 \times 1 = 6\)
   - \(4! = 4 \times 3 \times 2 \times 1 = 24\)
   The factorial of 0 is defined to be 1, i.e., \(0! = 1\).

2. **Definition of `factorial` Function**:

   ```go
   func factorial(x int) int {
       if x == 1 {
           fmt.Println("x is 1 now")
           return 1
       } else {
           fmt.Println("x is : ", x)
           return x * factorial(x-1)
       }
   }
   ```

   The function is designed to compute the factorial of an integer `x`. Here's how it works:
   - Base Case: If `x` is 1, the function prints "x is 1 now" and returns 1 because \(1! = 1\).
   - Recursive Case: Otherwise, it prints the current value of `x` and then makes a recursive call to compute the factorial of `x-1`. The result of this recursive call is then multiplied by `x` to get the factorial of `x`.

3. **Execution Flow**:
   Calling `factorial(3)` triggers the following flow:

   ```go
   factorial(3) => 3 * factorial(2) 
                => 3 * (2 * factorial(1))
                => 3 * (2 * 1)
                => 6
   ```

   The console output will be:

   ```
   x is :  3
   x is :  2
   x is 1 now
   ```

   These print statements show the order in which the function processes values of `x`. The deepest level of recursion is reached when `x` becomes 1, after which the function starts returning values to the previous levels of the call stack.

4. **Final Output**:
   In the `main` function, the result of `factorial(3)` (which is 6) gets printed, so the final output will be:

   ```
   x is :  3
   x is :  2
   x is 1 now
   6
   ```

In summary, this code demonstrates a recursive approach to calculating the factorial of a number by breaking down the problem into smaller subproblems until a base case (when `x` is 1) is reached.

## Output

```bash
$ go run main.go
x is :  3
x is :  2
x is 1 now
6
```