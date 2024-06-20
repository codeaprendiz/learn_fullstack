package main

import (
	"context"
	"fmt"
	"time"
)

func task(ctx context.Context, name string) {
	for {
		select {
		case <-ctx.Done():
			fmt.Println(name, "got the cancellation signal, stopping")
			return
		default:
			fmt.Println(name, "is running")
			// Simulate doing some work
			time.Sleep(500 * time.Millisecond)
		}
	}
}

func main() {
	// Create a context that is cancellable
	ctx, cancel := context.WithCancel(context.Background())

	// Start several goroutines with the context
	go task(ctx, "task1")
	go task(ctx, "task2")
	go task(ctx, "task3")

	// Run the tasks for a certain amount of time
	time.Sleep(2 * time.Second)

	// Cancel the context
	fmt.Println("Sending cancellation signal")
	cancel()

	// Give some time for the goroutines to receive the cancellation signal
	time.Sleep(1 * time.Second)
}
