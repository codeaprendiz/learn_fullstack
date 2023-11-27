# Short Declaration

Certainly! In the given code, there's a demonstration of two ways to declare variables in Go.

### Short Variable Declaration:

```go
x := 10
```

- The `:=` syntax is a shorthand for declaring and initializing a variable, known as a "short variable declaration".
- This form of declaration infers the type of the variable from the value on the right-hand side. In this case, `x` is inferred to be of type `int`.
- This shorthand can only be used inside a function. You can't use `:=` at package level.

### Standard Variable Declaration:

```go
var a = 10
```

- This is a more verbose way to declare a variable. The `var` keyword is used followed by the variable name.
- In this line, the type of `a` is also inferred to be `int` because you didn't specify a type. However, you can explicitly state the type if desired, like `var a int = 10`.
- The `var` declaration can be used both inside and outside functions. So, if you want to declare a package-level variable, you'd typically use this syntax.

The end result of both declarations is the same in this example: you have two integer variables, `x` and `a`, both initialized with the value `10`.

It's worth noting that Go programmers often prefer the short variable declaration syntax (`:=`) when they can, because it's more concise. However, the standard `var` declaration is still necessary in certain situations, like when declaring package-level variables or when you need to declare a variable without initializing it.

## Output

- Run the following command

```bash
$ go run main.go
10
10
```
