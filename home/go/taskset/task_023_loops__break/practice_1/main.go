package main

import "fmt"

func main() {
	// Loop using a condition
	x := 1
	for x < 10 {
		fmt.Println("x is", x)
		x++
	}

	// Infinite loop with a condition and break statement
	y := 1
	for {
		if y > 5 {
			break
		}
		fmt.Println("y is", y)
		y++
	}

	// Loop with initialization, condition, and post statement
	for i := 0; i < 10; i++ {
		fmt.Println("i is", i)
	}
}
