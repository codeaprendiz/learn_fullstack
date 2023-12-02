package main

import (
	"fmt"
	"time"
)

func putItemOnBelt(item string, belt chan string) {
	fmt.Println("Item under consideration while putting on belt : ", item)
	time.Sleep(2 * time.Second)
	belt <- item
}

func main() {
	sliceOfString := []string{"apple", "mango", "banana"}

	fmt.Println("sliceOfString ", sliceOfString)

	conveyorBelt := make(chan string)

	fmt.Println("\n------------Putting items on the belt-------------")
	for i, item := range sliceOfString {
		fmt.Println("i : ", i)
		fmt.Println("item : ", item)
		go putItemOnBelt(item, conveyorBelt)
	}

	fmt.Println("\n--------Taking of items from Belt--------------")
	for i, item := range sliceOfString {
		itemFromBelt := <-conveyorBelt
		fmt.Println("i : ", i)
		fmt.Println("itemFromBelt : ", itemFromBelt)
		fmt.Println("item : ", item)
	}

}
