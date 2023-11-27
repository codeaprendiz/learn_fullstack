package main

import (
	"fmt"
	"time"
)

func worker_to_put_item_to_convBelt(item string, convBelt chan string) {
	fmt.Println("Putting item to the convBelt : ", item)
	time.Sleep(2 * time.Second)
	convBelt <- item
}

func packagingDept_to_take_item_from_convBelt(convBelt chan string) {
	item := <-convBelt
	fmt.Println("Taking item from convBelt", item)

}

func main() {
	fmt.Println("------------------- main v1-------------------")
	main_v1()
	fmt.Println("-------------------main v2---------------------")
	foodItems := []string{"apple", "mango", "banana", "grapes"}

	convBelt := make(chan string)

	for _, item := range foodItems {
		go worker_to_put_item_to_convBelt(item, convBelt)
	}

	for range foodItems {
		packagingDept_to_take_item_from_convBelt(convBelt)
	}
}
