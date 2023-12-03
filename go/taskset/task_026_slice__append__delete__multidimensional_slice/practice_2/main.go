package main

import (
	"fmt"
)

func main() {
	sliceVar := []int{0, 1, 2, 3, 4, 5, 6, 7}
	fmt.Println("sliceVar", sliceVar)
	fmt.Println("sliceVar[1:]", sliceVar[1:])
	fmt.Println("sliceVar[0:4]", sliceVar[0:4])
	fmt.Println("sliceVar[:5]", sliceVar[:5])
	fmt.Println("sliceVar[:7]", sliceVar[:7])
}
