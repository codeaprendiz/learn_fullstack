package main

import (
	"context"
	"fmt"
	"os"
	"os/signal"
	"time"
)

// Simulates a long-running operation that respects context cancellation.
func longRunningProcess(ctx context.Context) error {
	fmt.Println("Long-running process started...")
	select {
	case <-time.After(10 * time.Second): // Simulates a long process
		fmt.Println("Long-running process completed.")
		return nil // Finished without interruption
	case <-ctx.Done(): // Checks if the context is cancelled
		fmt.Println("Long-running process stopped:", ctx.Err())
		return ctx.Err() // Return the cancellation error
	}
}

func main() {
	// Create a context that cancels on OS interrupt signals.
	ctx, stop := signal.NotifyContext(context.Background(), os.Interrupt)
	defer stop() // Ensure stop is called to release resources

	// Start the long-running process in a goroutine to allow it to run asynchronously.
	go func() {
		err := longRunningProcess(ctx)
		if err != nil {
			fmt.Println("Operation interrupted with error:", err)
		}
	}()

	// Wait for an interrupt signal
	<-ctx.Done()

	// After receiving the interrupt signal, cleanup or shutdown tasks can be performed.
	fmt.Println("Main function received interrupt signal. Exiting...")
}
