# Checking errors

## Explaination

Certainly!

Let's dive into the provided code:

```go
package main

import "fmt"

func main() {
	n, err := fmt.Println("Hello")
	if err != nil {
		fmt.Println(err)
	}
	fmt.Println(n)
}
```

This code is about understanding the return values from the `fmt.Println()` function.

1. `fmt.Println()` has a signature:

    ```go
    func Println(a ...interface{}) (n int, err error)
    ```
   It means that `fmt.Println()` can take any number of arguments of any type (thanks to the `...interface{}`) and it returns two values:
    - `n` which is the number of bytes written
    - `err` which is an error value. It will be `nil` if no error occurred, otherwise it will contain information about the error.

2. In the main function:

   ```go
   n, err := fmt.Println("Hello")
   ```

   Here, the string `"Hello"` is printed to the standard output (most likely the console). The number of bytes written (which should be 5 for the word "Hello" plus 1 for the newline character added by `Println`, so a total of 6) is captured in the variable `n`, and any error (if it occurred) is captured in the variable `err`.

3. The following code:

   ```go
   if err != nil {
		fmt.Println(err)
   }
   ```

   This is checking if there was an error in the previous `Println` call. If `err` is not `nil`, it means an error occurred, and it will be printed. Typically, for a basic `Println` call, you won't expect an error, but it's good practice to check for errors when a function can return one.

4. Lastly:

   ```go
   fmt.Println(n)
   ```

   This prints the number of bytes written by the previous `Println` call. As mentioned earlier, it should print `6` because "Hello" has 5 characters and `Println` adds a newline character which is another byte.

When you run the code, you should see:

```bash
Hello
6
```

This output first displays "Hello" and then the number of bytes written, which is 6.

## Output

Run the following command

```bash
$ go run main.go
Hello
6
```
