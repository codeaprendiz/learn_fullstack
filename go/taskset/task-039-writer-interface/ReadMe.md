# Writer Interface

## Explaination

It demonstrates three distinct methods to print the string "Hello World" to the standard output (your console/terminal). Here's the breakdown:

1. **Using the `fmt` Package**

    ```go
    fmt.Println("Hello World")
    ```

    This is a very common method to print to the standard output in Go:

    - `Println` writes to the standard output.
    - After printing the provided input, it automatically appends a newline (`\n`) character, so the subsequent output will be on a new line.

2. **Using the `fmt` Package with an Explicit Output Destination**

    ```go
    fmt.Fprintln(os.Stdout, "Hello World")
    ```

    Here, we're using the `Fprintln` function from the `fmt` package:

    - The `F` in `Fprintln` suggests that we're formatting the print to a specified output.
    - `os.Stdout` is used to represent the standard output, which in most cases is the console or terminal where your program runs.
    - As with `Println`, `Fprintln` appends a newline character after printing the input.

3. **Using the `io` Package**

    ```go
    io.WriteString(os.Stdout, "Hello World")
    ```

    This line demonstrates writing a string to an `io.Writer` with the `io` package:

    - `WriteString` is a function from the `io` package that writes the provided string to the given `io.Writer`.
    - `os.Stdout` (which implements the `io.Writer` interface) represents the standard output.
    - Unlike `Println` and `Fprintln`, `WriteString` does **not** append a newline after the string. So, in the output, you'll observe that "Hello World" (from this line) directly follows the "Hello World" from the previous line, without a newline in between.

### Running the Code

If you run this code, the output will be:

```bash
Hello World
Hello World
Hello World
```

The first two "Hello World" strings each have their own line because of the newline appended by `Println` and `Fprintln`, while the third "Hello World" string from `WriteString` directly follows without a newline.

## Output

- Run the following

```bash
$ go run main.go
Hello World
Hello World
Hello World
```
