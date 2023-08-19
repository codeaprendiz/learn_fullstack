package main

import "fmt"

func main() {
	// Define a string variable
	s := "hello world"
	fmt.Println(s)        // Print the string "hello world"
	fmt.Printf("%T\n", s) // Print the data type of the variable s

	// Convert the string to a byte slice
	bs := []byte(s)
	fmt.Println(bs)        // Print the byte slice [104 101 108 108 111 32 119 111 114 108 100]
	fmt.Printf("\n%T", bs) // Print the data type of the variable bs

	// Print the UTF-8 values of each character in the string
	for i := 0; i < len(s); i++ {
		fmt.Printf("%#U", s[i]) // Print the Unicode code point of each character
	}

	fmt.Println()
}
