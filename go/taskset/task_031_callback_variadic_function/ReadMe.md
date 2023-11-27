# Callback

## Explaination

This program demonstrates the concept of **callback** and **variadic functions** in Go, along with slice manipulation. Let's break it down step by step:

1. **Initializing a Slice:**

```go
x := []int{1,2,3,4,5,6,7,8,9}
```

A slice `x` of integers is initialized with numbers from 1 to 9.

2. **Variadic Function - Sum:**

```go
func sum(x ...int) int {
    ...
}
```

`sum` is a variadic function. It takes a varying number of `int` arguments. Inside the function, these arguments are accessible as a slice of integers. The function calculates and returns the total of the numbers passed.

3. **Callback Function - Even:**

```go
func even(f func(xi ...int) int, vi ...int) int {
    ...
}
```

The `even` function takes two sets of arguments: 

- A function `f` which takes a variable number of integers and returns an int.
- A variable number of integers `vi`.

Inside the `even` function, it constructs a new slice `yi` which contains only the even numbers from `vi`. After constructing `yi`, it calls the function `f` passing `yi` as the argument and returns the result.

4. **In the main function:**

```go
fmt.Println("The sum of slice is ", sum(x...))
```

This line calculates the sum of all numbers in the slice `x` and prints it. The output will be:

```bash
Passed :  [1 2 3 4 5 6 7 8 9]
The sum of slice is  45
```

5. **Calculating the Sum of Even Numbers:**

```go
s2 := even(sum, x...)
fmt.Println("The sum of only even numbers is ", s2)
```

Here, we're passing the `sum` function and slice `x` to the `even` function. Inside `even`, it filters out the odd numbers from the slice, then uses the `sum` function to calculate the total of the remaining even numbers, and finally returns that total. The output will be:

```bash
Passed :  [2 4 6 8]
The sum of only even numbers is  20
```

### Summary

The program demonstrates how functions can be first-class citizens in Go. They can be passed as arguments to other functions (as seen with the `even` function taking the `sum` function as an argument). This concept of passing a function as an argument to another function is known as a **callback**. Additionally, the concept of a function that can take an indefinite number of arguments is known as a **variadic function**.

### why you have to call function with ... i.e. fmt.Println("The sum of slice is " , sum(x...)) ? like why sum(x...) and why not sum(x)?

The `...` syntax is used in two primary scenarios in Go, both involving variadic functions:

1. **Variadic Function Parameter Definition:**
   When you define a variadic function, you use the `...` syntax to indicate that the function can accept a variable number of arguments of a specified type. For example:

   ```go
   func sum(x ...int) int {...}
   ```

   Here, `x` is a slice of integers, but when calling the `sum` function, you can pass any number of integer arguments.

2. **Passing a Slice to a Variadic Function:**
   When you already have a slice and you want to pass its elements as separate arguments to a variadic function, you use the `...` syntax again. This is called "unfurling" or "spreading" a slice.

   Given our example, `sum` is defined to accept a variable number of integer arguments, not a slice. If you try to pass `x` (which is a slice) to `sum` directly like this: `sum(x)`, the Go compiler would complain because `x` is a single argument of type `[]int`, while `sum` is expecting multiple `int` arguments.

   So, when you do `sum(x...)`, you're essentially converting or "unfurling" the slice `x` into multiple integer arguments.

In simpler terms, `sum(x...)` is equivalent to doing `sum(1, 2, 3, 4, 5, 6, 7, 8, 9)` given the slice `x` is defined as `x := []int{1,2,3,4,5,6,7,8,9}`.

## Output

- Run the following

```bash
$ go run main.go
Passed :  [1 2 3 4 5 6 7 8 9]
The sum of slice is  45
Passed :  [2 4 6 8]
The sum of only even numbers is  20
```
