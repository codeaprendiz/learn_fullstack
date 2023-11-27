# Int Overflow

## Explaination

Alright, let's delve into the code:

```go
package main
```

The code begins by specifying that it belongs to the `main` package.

```go
import "fmt"
```

This imports the `fmt` package, allowing us to use its functions for formatted I/O.

Inside the `main` function:

```go
var x int8
```

Here, an `int8` variable `x` is declared. The `int8` data type can hold integers in the range `-128` to `127`.

```go
x = -128
```

The value `-128` is assigned to `x`. This is the minimum value an `int8` can hold.

```go
fmt.Println(x)
```

This prints the value of `x`, which would output `-128`.

```go
// The following line would result in integer overflow for int8 type
// x = -129
```

This commented-out line of code attempts to assign the value `-129` to `x`. However, this value is outside the range of what `int8` can store (as mentioned, `int8` can hold values from `-128` to `127`). 

If you were to uncomment and run this line, you would encounter a compile-time error due to integer overflow. The Go compiler is smart enough to catch this kind of error at compile time instead of allowing it to cause unpredictable behavior at runtime.

```go
fmt.Println(x)
```

This prints the value of `x` again, which would still output `-128` since the line assigning `-129` to `x` is commented out.

In summary, this code demonstrates the boundaries of the `int8` data type in Go. Integer overflow can occur if you try to assign a value to a variable that's outside the range of the variable's type. However, the Go compiler is vigilant in catching such mistakes at compile time.

## Output

- Run the following command

```bash
# If commented
$ go run main.go        
-128
-128

# If uncommented
$ go run main.go
# command-line-arguments
./main.go:9:4: constant -129 overflows int8
```
