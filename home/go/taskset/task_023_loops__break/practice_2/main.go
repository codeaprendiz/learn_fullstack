package main

import (
	"fmt"
)

func main() {

	for i := 0; i < 10; i++ {
		fmt.Println("i : ", i)
	}

	mapVar := map[string]int{
		"one":   1,
		"two":   2,
		"three": 3,
	}

	fmt.Printf("\n\n")
	for key, value := range mapVar {
		fmt.Printf("key : %v, value : %v\n", key, value)
	}
}
