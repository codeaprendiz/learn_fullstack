package main

import "fmt"

func main() {
	s := "Hello, 世界" // String with ASCII and non-ASCII characters
	fmt.Println("String:", s)

	// Iterating over the string to print each character as a rune
	for _, r := range s {
		fmt.Printf("Character: %c (Rune: %v)\n", r, r)
	}
}
