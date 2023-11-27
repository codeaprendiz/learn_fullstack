# Scope

## Explaination

This example demonstrates the concept of closures in Go. Let's break it down step by step.

1. **Definition of `incrementor` Function**:

   ```go
   func incrementor() func() int {
       var x int
       return func() int {
           x++
           return x
       }
   }
   ```

   The `incrementor` function returns another function that has the type `func() int`. Inside `incrementor`, there's a local variable `x` initialized with a zero value of type `int` (which is `0`). The returned function, when called, increments the value of `x` by `1` and then returns the new value of `x`.

2. **Using the `incrementor` Function**:

   ```go
   a := incrementor()
   b := incrementor()
   ```

   Here, we're calling the `incrementor` function twice, and each time we get back a new function (a closure) that has its own separate memory for the variable `x`. So, `a` and `b` are both functions that increment their own separate counters.

3. **Calling the Returned Closures**:
   When we call the returned functions `a` and `b`:

   ```go
   fmt.Println(a()) // Prints 1: `a`'s internal counter (`x`) goes from 0 to 1.
   fmt.Println(a()) // Prints 2: `a`'s counter is now incremented again.
   fmt.Println(a()) // Prints 3: and once more.
   
   fmt.Println(b()) // Prints 1: Now, `b`'s internal counter starts at 0 and goes to 1.
   fmt.Println(b()) // Prints 2: `b`'s counter is incremented.
   fmt.Println(b()) // Prints 3: and again.
   ```

   It's important to understand that `a` and `b` each have their own version of the `x` variable. This is why when `b` starts incrementing, it starts from `1` even though `a` has been called multiple times. 

4. **Why does this happen?**: This behavior is a result of closures. In Go (and many other programming languages), a closure is a function value that references variables from outside its body. The function may access and assign to the referenced variables; in this sense, the function is "bound" to the variables. Each call to `incrementor` creates a new closure with its own bound variable `x`.

In summary, the example demonstrates how to create and use closures in Go. Each closure captures and remembers its own version of the variable(s) from its containing function.

## Output

- Run the following command

```bash
$ go run main.go
1
2
3
1
2
3
```
