# Defer Function

## Explaination

In this program, we're introduced to the `defer` keyword in Go. Let's break it down:

### Function Declarations

#### 1. `foo()`

```go
func foo() {
    fmt.Println("I am foo")
}
```

This is a straightforward function that, when called, will print the string "I am foo" to the console.

#### 2. `bar()`

```go
func bar() {
    fmt.Println("I am bar")
}
```

Similarly, this function, when called, will print the string "I am bar" to the console.

### Main Function

In the `main` function, the following calls are made:

```go
defer foo()
bar()
```

Here's a breakdown of what happens:

1. `defer foo()`: The `defer` keyword in Go is used to ensure that a function call is performed later in a program's execution, usually for purposes of cleanup. Typically, deferred functions are executed in reverse order of their appearance. In this case, the `foo` function has been deferred, which means it won't be executed immediately—it'll wait until the surrounding function (`main` in this case) completes its execution.

2. `bar()`: This is a normal function call. It will be executed immediately.

Given the ordering in the `main` function, the output of the program will be:

```bash
I am bar
I am foo
```

`bar` prints its message first, even though its call appears after `foo` in the code. This is because `foo` has been deferred, so it waits until the end of the `main` function to execute.

## Output

- Run the following

```bash
$ go run main.go
I am bar
I am foo
```
