package main

import "fmt"

func main() {
	a := 2     // Decimal value: 2, Binary: 0010
	var b int  // Declare an integer variable b
	b = a << 1 // Left shift a by 1 position: 0010 << 1 = 0100 (Decimal: 4)
	fmt.Printf("a value is %d  and in binary %b", a, a)
	fmt.Printf("\nb value is %d and in binary after bit shifting is %b", b, b)
}
