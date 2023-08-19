package main

import (
	"fmt"
)

// Define typed and untyped constants
const (
	// Typed constant: An integer constant with the value 10 and the data type int.
	a int = 10

	// Untyped constants: These are constants that don't have a specific data type defined.
	// Instead, their type is determined based on the context in which they are used.
	b = 2.1     // An untyped constant with the value 2.1 and inferred type float64.
	c = "Hello" // An untyped constant with the value "Hello" and inferred type string.
)

func main() {
	fmt.Println(a) // Print the value of the typed constant 'a' (output: 10)
	fmt.Println(b) // Print the value of the untyped constant 'b' (output: 2.1)
	fmt.Println(c) // Print the value of the untyped constant 'c' (output: Hello)
}
