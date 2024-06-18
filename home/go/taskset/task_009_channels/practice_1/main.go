package main

import (
	"fmt"
	"time"
)

// Worker assembles a toy and places it on the conveyor belt.
func worker(toy string, belt chan string) {
	fmt.Println("Assembling:", toy)
	time.Sleep(2 * time.Second) // Simulate time taken to assemble.
	belt <- toy
}

// Packaging department takes the toy from the conveyor belt and packages it.
func packagingDept(belt chan string) {
	packagedToy := <-belt
	fmt.Println("Packaged:", packagedToy)
}

func main() {
	// List of toys to be assembled.
	toys := []string{"car", "robot", "doll", "lego"}

	// Create a channel (conveyor belt).
	conveyorBelt := make(chan string)

	// Start the assembly line.
	for _, toy := range toys {
		go worker(toy, conveyorBelt)
	}

	// Packaging department collects toys from the conveyor belt.
	for range toys {
		packagingDept(conveyorBelt)
	}
}
