package main

import (
	"fmt"
)

func main() {
	// Integers
	var intVar1 int = -11
	fmt.Println("intVar1 : ", intVar1)
	fmt.Printf("Typeof intVar1 : %T\n", intVar1)

	intVar2 := 2
	fmt.Println("intVar2 : ", intVar2)
	fmt.Printf("Typeof intVar1 : %T\n\n", intVar2)

	var uintVar uint = 2
	fmt.Println("uintVar : ", uintVar)
	fmt.Printf("Typeof uintVar :%T\n\n", uintVar)

	// Floating point
	var floatVar1 float64 = 1.23
	fmt.Println("floatVar1 : ", floatVar1)
	fmt.Printf("Typeof floatVar1 : %T\n", floatVar1)

	floatVar2 := 2.23
	fmt.Println("floatVar2 : ", floatVar2)
	fmt.Printf("Typeof floatVar2 : %T\n\n", floatVar2)

	// Boolean
	var boolVar1 bool = true
	fmt.Println("boolVar1 : ", boolVar1)
	fmt.Printf("Typeof boolVar1 : %T\n", boolVar1)

	boolVar2 := false
	fmt.Println("boolVar2 : ", boolVar2)
	fmt.Printf("Typeof boolVar2 : %T\n\n", boolVar2)

	// String
	var stringVar1 = "string1"
	fmt.Println("stringVar1 : ", stringVar1)
	fmt.Printf("Typeof stringVar1 : %T\n", stringVar1)

	stringVar2 := "string2"
	fmt.Println("stringVar2 : ", stringVar2)
	fmt.Printf("Typeof stringVar2 : %T\n\n", stringVar2)

	// Array
	var arraryVar [3]int = [3]int{1, 2, 3}
	fmt.Println("arraryVar : ", arraryVar)
	fmt.Printf("Typeof arraryVar : %T\n\n", arraryVar)

	// Slice
	sliceVar := []int{2, 3, 4, 5}
	fmt.Println("sliceVar : ", sliceVar)
	fmt.Printf("Typeof sliceVar : %T\n\n", sliceVar)

	// Map
	mapVar := map[string]int{
		"one": 1,
		"two": 2,
	}
	fmt.Println("mapVar : ", mapVar)
	fmt.Printf("Typeof mapVar : %T\n\n", mapVar)

	// Struct
	type Person struct {
		Name string
		Age  int
	}
	personVar := Person{"Alice", 22}
	fmt.Println("personVar : ", personVar)
	fmt.Printf("Typeof personVar : %T\n\n", personVar)
}
