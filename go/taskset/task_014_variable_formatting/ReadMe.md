# Variable formatting

[pkg.go.dev/fmt](https://pkg.go.dev/fmt)

| Verb  | Description                                   | Example Usage                 |
|-------|-----------------------------------------------|-------------------------------|
| `%v`  | Default format for the value                  | `fmt.Printf("%v", value)`     |
| `%+v` | Detailed format (structs include field names) | `fmt.Printf("%+v", struct)`   |
| `%#v` | Go-syntax representation of the value         | `fmt.Printf("%#v", value)`    |
| `%T`  | Type of the value                             | `fmt.Printf("%T", value)`     |
| `%d`  | Integer in base 10                            | `fmt.Printf("%d", intVal)`    |
| `%f`  | Floating-point number without exponent        | `fmt.Printf("%f", floatVal)`  |
| `%s`  | String                                        | `fmt.Printf("%s", stringVal)` |
| `%q`  | Double-quoted string safely escaped           | `fmt.Printf("%q", stringVal)` |
| `%p`  | Pointer (address in base 16, with leading 0x) | `fmt.Printf("%p", &value)`    |

## Exlaination

The given code illustrates how to format and print variables in Go using the `fmt` package. Let's break it down.

### 1. Variable Declarations

At the top, we declare several package-level variables:

```go
var a = 10
var i int = 34
var j string = "I am str"
var k bool = true
```

### 2. For loop with `Printf`

In the `main` function, there's a for loop that iterates over the numbers 60 through 69 and prints each number in various formats:

```go
for i := 60; i < 70; i++ {
    fmt.Printf("%d \t %b \t %x \t %q \n", i, i, i, i)
}
```

Here's what each format specifier does:

- `%d`: Decimal integer
- `%b`: Binary representation
- `%x`: Hexadecimal representation
- `%q`: A single-quoted character literal safely escaped with Go syntax.

### 3. Type of a Variable

You can also print the type of a variable using `%T`:

```go
fmt.Println("Value of a is ", a)
fmt.Printf("Type of a is %T ", a)
```

This prints the value and type of variable `a` (which is `int`).

### 4. Binary Representation

Print the binary representation of `a`:

```go
fmt.Printf("\nBinary value a is %b ", a)
```

### 5. `Sprintf`

`fmt.Sprintf` formats and returns a string without printing it:

```go
s := fmt.Sprintf("\n%v\t%v\t%v", i, j, k)
fmt.Println(s)
```

Here:

- `%v`: Default format for the respective type. It means the value will be printed in a manner appropriate to its type.

In the `Sprintf` line, `i` will have the value `34` (as declared at the package level) because the scope of the `i` in the for loop ended with the loop.

This code effectively demonstrates different ways of formatting and printing variables in Go, showcasing the flexibility and capabilities of the `fmt` package.

## Output

- Run the following command

```bash
$ go run main.go
60       111100          3c      '<' 
61       111101          3d      '=' 
62       111110          3e      '>' 
63       111111          3f      '?' 
64       1000000         40      '@' 
65       1000001         41      'A' 
66       1000010         42      'B' 
67       1000011         43      'C' 
68       1000100         44      'D' 
69       1000101         45      'E' 
Value of a is  10
Type of a is int 
Binary value a is 1010 
34      I am str        true 
```
