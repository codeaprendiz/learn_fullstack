# Channels

Absolutely! Let's use a simpler example: a factory assembly line.

## Explaination

**Scenario**: Imagine a factory where workers assemble toys. Once a toy is assembled, it gets passed to the packaging department, which then packages the toy.

**Main Concepts**:

- **Goroutines**: Represent the workers.
- **Channels**: Represent the conveyor belt on which toys are placed once assembled.

Here's a Go program that emulates this:

```go
package main

import (
    "fmt"
    "time"
)

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
```

**Breakdown**:

1. **Goroutines (`worker`)**: Each `worker` function represents an assembly worker. When the `worker` goroutine is initiated with the `go` keyword, it begins assembling the toy.
2. **Channel (`conveyorBelt`)**: Once a toy is assembled, the worker places it on the `conveyorBelt` (sends it to the channel).
3. **Main Goroutine (`packagingDept`)**: The `packagingDept` function represents the packaging department. It waits for toys to appear on the `conveyorBelt` (receives from the channel) and then packages them.

This example demonstrates the concepts of goroutines and channels in a more simplified setting, without the intricacies of the repeated checking and anonymous functions found in the original example.

## Running

- Run the following command

```bash
$ go mod init channels
go: creating new go.mod: module channels
go: to add module requirements and sums:
        go mod tidy

$ go mod tidy

$ go run .
------------------- main v1-------------------
Assembling: lego
Assembling: robot
Assembling: doll
Assembling: car
Packaged: car
Packaged: robot
Packaged: lego
Packaged: doll
-------------------main v2---------------------
Putting item to the convBelt :  apple
Putting item to the convBelt :  grapes
Putting item to the convBelt :  banana
Putting item to the convBelt :  mango
Taking item from convBelt mango
Taking item from convBelt apple
Taking item from convBelt banana
Taking item from convBelt grapes
```