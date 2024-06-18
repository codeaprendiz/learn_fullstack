# Function Expression

## Explaination

This Go program demonstrates the use of **anonymous functions** (often called lambda functions in other languages) and **functions returning functions**.

Let's break down the main components:

1. **Anonymous function assigned to a variable:**

    ```go
    f := func(x int) {
        fmt.Println("I am anonymous function that was passed with argument", x)
    }
    ```

    This block of code defines an anonymous function that takes an integer argument and prints it. This function is assigned to the variable `f`. After the definition, we can call this function using the variable `f` just like any other function.

    ```go
    f(4)
    ```

    This calls the anonymous function assigned to `f` and passes `4` as the argument. The output will be:

    ```bash
    I am anonymous function that was passed with argument 4
    ```

2. **Function that returns another function:**

    ```go
    func bar() func() int {
        return func() int {
            return 45
        }
    }
    ```

    Here, `bar` is a function that returns another function. Specifically, it returns an anonymous function that returns an `int`. When you call `bar()`, it doesn't return `45`, but rather it returns the function that will return `45` when it's called.

3. **Assigning the returned function to a variable and then calling it:**

    ```go
    newfunction := bar()
    ```

    `newfunction` now holds the anonymous function returned by the `bar` function.

    ```go
    fmt.Println("The function call of the function which was returned is ", newfunction())
    ```

    This line calls the anonymous function stored in `newfunction`, which in turn returns `45`. Thus, the output will be:

    ```bash
    The function call of the function which was returned is  45
    ```

    ```go
    fmt.Printf("The type of the variable newfunction is %T", newfunction)
    ```

    This line prints the type of `newfunction`. `%T` is a format specifier in Go that prints the type of a variable. The type of `newfunction` is `func() int` since it holds a function that takes no arguments and returns an integer. The output will be:

    ```bash
    The type of the variable newfunction is func() int
    ```

### Summary

This code showcases the power and flexibility of functions in Go. It demonstrates how you can define anonymous functions, assign them to variables, pass them around, return them from other functions, and then invoke them.

## Output

```bash
$ go run main.go
I am anonymous function that was passed with argument 4
The function call of the function which was returned is  45
The type of the variable newfunction is func() int
```
