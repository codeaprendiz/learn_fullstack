# Mutex

## Explaination

Certainly! This code demonstrates the utilization of goroutines and synchronization mechanisms, particularly a mutex, to safely handle concurrent access to a shared variable, which in this case is `counter`.

Let's break the code down:

1. **Initialization & Display Information:**

   ```go
   fmt.Println("CPUs ", runtime.NumCPU())
   fmt.Println("GoRoutines", runtime.NumGoroutine())
   ```

   This code displays:
   - Number of logical CPUs available to the Go process.
   - Number of active goroutines. At this point, only the main goroutine is active.

2. **Setup of Variables and Synchronization Primitives:**

   ```go
   counter := 0
   var wg sync.WaitGroup
   const gs = 10
   var mu sync.Mutex
   ```

   - `counter`: A shared resource that will be accessed and modified by multiple goroutines.
   - `wg`: A WaitGroup to ensure the main goroutine doesn't exit until all other goroutines finish.
   - `gs`: A constant denoting how many goroutines will be created.
   - `mu`: A mutex (mutual exclusion) that will be used to guard concurrent access to `counter`.

3. **Launching Goroutines:**

   ```go
   wg.Add(gs)
   for i := 0; i < gs; i++ {
      go func() { ... }()
   }
   ```

   The code will spawn 10 goroutines. Each goroutine:

   - Locks the mutex with `mu.Lock()`. This ensures exclusive access to `counter`.
   - Reads the current value of `counter` into the variable `v`.
   - Uses `runtime.Gosched()` to yield the processor, potentially allowing another goroutine to execute. This doesn't affect safety here since we've locked `counter` access with a mutex.
   - Increments the local variable `v` and then updates `counter`.
   - Prints the number of active goroutines.
   - Unlocks the mutex with `mu.Unlock()`, releasing the lock.
   - Signals the `WaitGroup` that it's done with `wg.Done()`.

4. **Waiting and Printing Final Results:**

   ```go
   wg.Wait()
   fmt.Println("CPUs ", runtime.NumCPU())
   fmt.Println("GoRoutines", runtime.NumGoroutine())
   fmt.Print("Counter", counter)
   ```

   - `wg.Wait()`: Makes sure the main goroutine waits for all other goroutines to complete.
   - Once all goroutines are done, the code prints the number of logical CPUs, the number of active goroutines (which should now be 1 since only the main goroutine remains), and the final value of `counter` (which should be 10).

The main takeaway from this code is the demonstration of how to use a mutex to safely handle concurrent access to a shared variable in a multi-goroutine environment. Without the mutex, there would be a race condition, potentially resulting in an incorrect value for the `counter`.

### why do you still runtime.Gosched() when you have mutex variable?

The use of `runtime.Gosched()` in this context is not necessary for the safety of the code; the `sync.Mutex` is already ensuring mutual exclusion and preventing race conditions. However, its presence might be for illustrative or educational purposes.

When we're discussing concurrency in Go, especially with beginners, the default behavior of goroutines can sometimes seem confusing or non-intuitive. Without `runtime.Gosched()`, a goroutine that acquires the mutex might run to completion (until it releases the mutex) before any other goroutines have a chance to run. This could make it look as if the program is executing in a more sequential manner than is actually guaranteed.

By introducing `runtime.Gosched()`, the code is effectively "suggesting" to the Go runtime that it might be a good time to switch to another goroutine. In practice, this can make the interleaved execution of goroutines more evident, which can be useful for demonstration purposes.

However, in real-world applications where you are using mutexes or other synchronization primitives, you would typically not use `runtime.Gosched()` in this manner. Proper synchronization ensures safety without the need for explicit yielding. The Go scheduler is designed to efficiently manage goroutine execution without the need for manual interventions like `runtime.Gosched()`.

## Output

- Run the following command

```bash
$ go run -race main.go
CPUs  16
GoRoutines 1
Go routine  3
Go routine  3
Go routine  2
Go routine  3
Go routine  2
Go routine  3
Go routine  3
Go routine  3
Go routine  3
Go routine  2
CPUs  16
GoRoutines 1
Counter10
```
