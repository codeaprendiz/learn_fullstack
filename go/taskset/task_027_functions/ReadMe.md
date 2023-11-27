# Functions

## Explaination

Let's walk through this Go code piece by piece:

### Function Declarations

#### 1. `foo()`

```go
func foo() {
    fmt.Println("I am foo")
}
```

This is a simple function that prints "I am foo" when called.

#### 2. `bar(s string)`

```go
func bar(s string) {
	fmt.Println("I am bar taking argument " , s)
}
```

This function takes a string argument and prints it alongside a message.

#### 3. `woo(s string) string`

```go
func woo(s string) string {
	return fmt.Sprint("I am in woo ", s)
}
```

This function accepts a string argument and returns a new string that is a concatenation of a static message and the argument passed.

#### 4. `multiReturnFunc() (string,bool)`

```go
func multiReturnFunc() (string,bool) {
    return "i am string", true
}
```

This function doesn't accept any arguments and returns two values, a string and a boolean.

#### 5. `anyNumberOfArgs(x ...int)`

```go
func anyNumberOfArgs(x ...int) {
    fmt.Println(x)
    fmt.Printf("\n%T\n",x)
}
```

This function demonstrates the use of variadic parameters in Go. It takes zero or more `int` values as arguments. It prints the values and their type (which would be a slice of int, `[]int`).

### Main Function

#### 1. Function Calls

```go
foo()             // Calls foo function.
bar("Test")       // Calls bar function with "Test" as an argument.
s := woo("woo's argument")   // Calls woo function and stores the returned value in variable 's'.
fmt.Println(s)    // Prints the value stored in 's'.
```

#### 2. Multiple Return Values

```go
str, bl := multiReturnFunc()  // Calls the function and stores the returned values in 'str' and 'bl'.
fmt.Println(str,bl)           // Prints the values.
```

#### 3. Variadic Function

```go
anyNumberOfArgs(1,2,3,4,45)  // Calls the function passing multiple int values.
```

#### 4. Unfurling a Slice

If you want to pass a slice to a variadic function, you can "unfurl" it using `...`.

```go
x := []int{1,2,3,4,5,6,76,8}
anyNumberOfArgs(x...)
```

#### 5. Anonymous Functions

Anonymous functions are functions without a name. They can be created and executed on the fly.

```go
func(x int) {
    fmt.Println("I am anonymous function and called with argument " , x )
}(23)
```

Here, an anonymous function is declared which takes an int argument and prints it. It's immediately invoked by `(23)`, passing `23` as an argument.


## Output

- Run the following

```bash
$ go run main.go
I am foo
I am bar taking argument  Test
I am in woo woo's argument
i am string true
[1 2 3 4 45]

[]int
[1 2 3 4 5 6 76 8]

[]int
I am anonymous function and called with argument  23
```
