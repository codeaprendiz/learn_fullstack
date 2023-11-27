# Variables

The provided Go program demonstrates three different ways of declaring variables and their respective types: static declaration, dynamic declaration, and mixed declaration. It then prints the values of the variables and their types to the standard output.

Here's a step-by-step explanation of what the program does:

1. Static Declaration (`var var_x float64`):
   - A variable named `var_x` of type `float64` is declared. In Go, this is known as static declaration because we explicitly tell the compiler the type of the variable.
   - Since no value is assigned to `var_x`, it will be initialized to its zero value, which for `float64` is `0.0`.
   - `fmt.Println(var_x)` prints the value of `var_x` to the standard output, which will display `0.0`.
   - `fmt.Printf("var_x is of type %T\n", var_x)` prints the type of `var_x` to the standard output. The output will be `var_x is of type float64`.

2. Dynamic Declaration (`var_y := 42`):
   - A variable named `var_y` is declared and initialized in a single statement. The type of `var_y` is inferred automatically by the compiler based on the assigned value, which is `42`.
   - Since `42` is an integer literal, the compiler infers that `var_y` is of type `int`.
   - `fmt.Println(var_y)` prints the value of `var_y` to the standard output, which will display `42`.
   - `fmt.Printf("var_y is of type %T\n", var_y)` prints the type of `var_y` to the standard output. The output will be `var_y is of type int`.

3. Mixed Declaration (`var d, e, f = 3, 4, "foo"`):
   - Three variables `d`, `e`, and `f` are declared and initialized in a single statement.
   - The types of `d` and `e` are inferred implicitly based on the provided integer literals (`3` and `4`, respectively). Since both values are integers, the types of `d` and `e` will be `int`.
   - The type of `f` is explicitly set to a string type using the double quotes around `"foo"`.
   - `fmt.Println(d)`, `fmt.Println(e)`, and `fmt.Println(f)` print the values of `d`, `e`, and `f` to the standard output. The output will be `3`, `4`, and `"foo"`, respectively.
   - `fmt.Printf("d is of type %T\n", d)`, `fmt.Printf("e is of type %T\n", e)`, and `fmt.Printf("f is of type %T\n", f)` print the types of `d`, `e`, and `f` to the standard output. The outputs will be `d is of type int`, `e is of type int`, and `f is of type string`.

Overall, the program demonstrates different ways of declaring variables in Go and shows how the compiler automatically infers types during dynamic declaration while allowing explicit type declarations in the mixed declaration. The program then prints the values and types of the variables to provide insight into their data and type information.

## Output

```bash
$ go run ./vars.go
20
var_x is of type float64
42
var_y is of type int
3
4
foo
d is of type int
e is of type int
f is of type string
```
