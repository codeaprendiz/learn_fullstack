package main

import (
	"fmt"
)

func main() {
	// Arithmetic Operator
	a, b := 10, 3
	fmt.Printf("Arithmatic operators : a=10, b=3")
	fmt.Println("a + b = ", a+b)
	fmt.Println("a - b = ", a-b)
	fmt.Println("a * b = ", a*b)
	fmt.Println("a / b = ", a/b)
	fmt.Println("a % b = ", a%b)
	fmt.Printf("\n")

	// Relational Operators
	fmt.Println("Relations Operators : a=10, b=3")
	fmt.Println("a == b = ", a == b)
	fmt.Println("a != b = ", a != b)
	fmt.Println("a < b = ", a < b)
	fmt.Println("a > b = ", a > b)
	fmt.Println("a <= b = ", a <= b)
	fmt.Println("a >= b = ", a >= b)
	fmt.Printf("\n")

	// Logical Operators
	fmt.Println("Logical Operators : x=true, y=false")
	x, y := true, false
	fmt.Println("x && y = ", x && y)
	fmt.Println("x || y = ", x || y)
	fmt.Println("!x = ", !x)
	fmt.Printf("\n")

	// Bitwise operators
	fmt.Println("Bitwise Operators : a=10, b=3")
	fmt.Println("a & b = ", a&b)
	fmt.Println("a | b = ", a|b)
	fmt.Println("a ^ b = ", a^b)
	fmt.Println("a << b = ", a<<b)
	fmt.Println("a >> b = ", a>>b)
	fmt.Printf("\n")

	// Assignment Operators
	fmt.Println("Assignment Operators : c=5")
	c := 5
	c += 3
	fmt.Println("c += 3 : ", c)
	c -= 2
	fmt.Println("c -= 2 : ", c)
	c *= 3
	fmt.Println("c *= 3 : ", c)
	c /= 3
	fmt.Println("c /= 3 : ", c)
	c %= 2
	fmt.Println("c %= 3 : ", c)
	fmt.Printf("\n")

	// Miscellaneous Operators
	fmt.Println("Miscellaneous Operators : d=10")
	d := 10
	var ptr *int
	ptr = &d
	fmt.Println("Value of d :", d)
	fmt.Println("Addres of d :", ptr)
	fmt.Println("Value at address of ptr :", *ptr)

}
