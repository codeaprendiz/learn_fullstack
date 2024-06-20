package main

import "fmt"

func main() {
	colorCodes := map[string]int{
		"yellow": 1,
		"red":    2,
		"black":  3,
	}

	fmt.Println("Printing the map : ", colorCodes)

	fmt.Println("Iterating through map values : ")

	for key, value := range colorCodes {
		fmt.Printf("Key : %v, Value : %v\n", key, value)
	}
}
