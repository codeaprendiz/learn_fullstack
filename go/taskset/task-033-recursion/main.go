package main

import "fmt"

func main() {
	fmt.Println(factorial(3))
}

func factorial(x int) int {
	if x == 1 {
		fmt.Println("x is 1 now")
		return 1
	} else {
		fmt.Println("x is : ", x)
		return x * factorial(x-1)
	}
}
