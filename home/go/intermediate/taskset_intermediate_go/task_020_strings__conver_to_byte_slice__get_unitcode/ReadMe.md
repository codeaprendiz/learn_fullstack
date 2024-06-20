# Strings

## Explaination

The provided Go code demonstrates various aspects of working with strings and byte slices. Here's an explanation for each section of the code:

```go
package main

import "fmt"

func main() {
    // Define a string variable
    s := "hello world"
    fmt.Println(s)       // Print the string "hello world"
    fmt.Printf("%T\n", s) // Print the data type of the variable s

    // Convert the string to a byte slice
    bs := []byte(s)
    fmt.Println(bs)       // Print the byte slice [104 101 108 108 111 32 119 111 114 108 100]
    fmt.Printf("\n%T", bs) // Print the data type of the variable bs

    // Print the UTF-8 values of each character in the string
    for i := 0; i < len(s); i++ {
        fmt.Printf("%#U", s[i]) // Print the Unicode code point of each character
    }

    fmt.Println()
}
```

Here's the breakdown of what each section does:

1. `s := "hello world"`: This line defines a string variable `s` with the value "hello world".

2. `fmt.Println(s)`: Prints the value of the string variable `s`, which is "hello world".

3. `fmt.Printf("%T\n", s)`: Prints the data type of the variable `s`. In this case, it will output `string`.

4. `bs := []byte(s)`: Converts the string `s` into a byte slice `bs`. Each character in the string is represented as a byte in the slice.

5. `fmt.Println(bs)`: Prints the byte slice `bs`, which represents the ASCII values of the characters in the string "hello world".

6. `fmt.Printf("\n%T", bs)`: Prints the data type of the variable `bs`. In this case, it will output `[]uint8`, which is a type alias for `[]byte`.

7. The loop `for i := 0; i < len(s); i++` iterates through each character in the string using its index.

8. `fmt.Printf("%#U", s[i])`: Prints the Unicode code point of the character at index `i`. The `#` flag is used to print the code point in a hexadecimal format.

9. `fmt.Println()`: Prints a newline after the loop is completed.

Overall, the code demonstrates how to work with strings, byte slices, and UTF-8 values in Go. It showcases the conversion between strings and byte slices, as well as printing the Unicode code points of the characters in the string.

## Output

- Run the following command

```bash
$ go run main.go  
hello world
string
[104 101 108 108 111 32 119 111 114 108 100]

[]uint8U+0068 'h'U+0065 'e'U+006C 'l'U+006C 'l'U+006F 'o'U+0020 ' 'U+0077 'w'U+006F 'o'U+0072 'r'U+006C 'l'U+0064 'd'   
```