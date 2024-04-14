# context.Background and context.withCancel

`context.Background()` is a function in Go's `context` package that returns an empty `Context`. This context is never canceled, has no values, and has no deadline. It is intended to be the root of any context tree in your application, meaning that other contexts with specific behaviors (cancellation, deadlines, etc.) should derive from it.

## Importance of `context.Background()`

The importance of `context.Background()` lies in its role as a foundational context from which all other contexts are derived, especially at the start of your main function, in initialization logic, or when you don't have any other context to use. It provides a way to pass request-scoped values, cancellation signals, and deadlines through APIs and go routines.

Here's a sample program that demonstrates the use of `context.Background()` in a scenario where we might want to propagate a cancellation signal to multiple go routines performing different tasks:

```go
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
```

### Explanation

- **`context.Background()` Usage:** The program starts with `context.Background()` to create the root context. This context is then made cancellable by `context.WithCancel`. This pattern is typical in applications where you might need to start multiple operations that should be stopped together based on some condition (in this case, after 2 seconds).
- **Cancelling Multiple Goroutines:** The `cancel` function, when called, sends a cancellation signal to all goroutines running the `task` function. This demonstrates how you can control the lifecycle of multiple operations running concurrently.
- **No Values or Deadlines:** This example doesn't use values or deadlines associated with contexts, but it illustrates the fundamental purpose of `context.Background()` as a starting point for creating contexts that might need cancellation or other request-scoped features.

In summary, `context.Background()` is essential for situations where you need a context to start with, particularly at the highest levels of your application, where there isn't a parent context to derive from. It's the baseline context that allows for the structured propagation of cancellation signals and other request-scoped data across go routines and API boundaries.

## Run

```bash
$ go run main.go
task3 is running
task1 is running
task2 is running
task2 is running
task3 is running
task1 is running
task1 is running
task2 is running
task3 is running
task1 is running
task2 is running
task3 is running
Sending cancellation signal
task2 got the cancellation signal, stopping
task1 got the cancellation signal, stopping
task3 got the cancellation signal, stopping
```
