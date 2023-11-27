package main // This line defines the package in which the program resides.

import "fmt" // This line imports the fmt package which provides functions for formatted input/output.

var a int // This declares a variable "a" of type "int".

type testtype int // This line defines a new type "testtype" as an alias of "int".

var b testtype // This declares a variable "b" of type "testtype".

func main() { // The main function is the entry point of the Go program.

	a = 23 // Assigns the value 23 to variable "a".
	b = 34 // Assigns the value 34 to variable "b".

	fmt.Println(a) // Prints the value of variable "a" to the console.
	fmt.Println(b) // Prints the value of variable "b" to the console.

	fmt.Printf("\n%T", a)   // Prints the type of variable "a" to the console.
	fmt.Printf("\n%T\n", b) // Prints the type of variable "b" to the console.
}
