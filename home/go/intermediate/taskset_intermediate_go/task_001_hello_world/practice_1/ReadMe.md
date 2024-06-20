# Practice 1

## Description

This is a very simple Go program that prints the string "Hello, World!" to the console.

Here's a breakdown of each part:

- `package main`: In Go, every program is made up of packages and program execution starts in the package `main`. This means this is the package where your program will start.

- `import "fmt"`: This is how you include code from other packages to use with your program. The `fmt` package implements formatted I/O with functions similar to C's printf and scanf.

- `func main()`: The `main` function is the entry point of the program. When the program is run, it starts executing the function `main` first.

- `/* This is just a comment. */`: This is a comment, as indicated. Comments are ignored by the Go compiler. They are used to provide notes or explanations to people reading the code.

- `fmt.Println("Hello, World!")`: This is a call to the function `Println` from the package `fmt` which prints its arguments, here the string "Hello, World!", to the console and then prints a newline character. Therefore, after this line is executed, "Hello, World!" will be printed to the console.

In summary, this Go program prints "Hello, World!" to the console when executed.

### Run

- Run the program using

```bash
$ go run ./hello-world.go 
Hello, World!
```