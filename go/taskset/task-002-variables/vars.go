package main

import "fmt"

func main() {
	// Static Declaration - You tell the compiler
	var var_x float64 // This line declares a variable named var_x of type float64. In Go, you explicitly declare variables with their types, and if you don't assign a value to the variable, it will be initialized to its zero value, which for float64 is 0.0.
	var_x = 20.0      // This line assigns the value 20.0 to the variable var_x. Since var_x is of type float64, the value is a floating-point number.
	fmt.Println(var_x)
	fmt.Printf("var_x is of type %T\n", var_x) // In Go's fmt package, the %T format verb is used to print the type of a value. It is a placeholder in the format string that represents the type of the corresponding argument passed to the Printf or Sprintf function

	// Dynamic Declaration - Let the compiler do the thinking
	var_y := 42        // This line demonstrates dynamic declaration. Instead of explicitly specifying the type of the variable var_y, we use the := syntax to declare and initialize it in a single statement. The compiler automatically infers the type of var_y based on the value assigned to it, which is 42. Since 42 is an integer literal, the compiler infers that var_y is of type int.
	fmt.Println(var_y) // print the value of var_y
	fmt.Printf("var_y is of type %T\n", var_y)

	// Mixed
	var d, e, f = 3, 4, "foo" // This line demonstrates mixed variable declaration. The variables d, e, and f are declared and initialized in a single statement. The types of d and e are inferred implicitly based on the provided integer literals (3 and 4, respectively), and the type of f is explicitly set to a string type using the double quotes around "foo".
	fmt.Println(d)
	fmt.Println(e)
	fmt.Println(f)
	fmt.Printf("d is of type %T\n", d)
	fmt.Printf("e is of type %T\n", e)
	fmt.Printf("f is of type %T\n", f)
}
