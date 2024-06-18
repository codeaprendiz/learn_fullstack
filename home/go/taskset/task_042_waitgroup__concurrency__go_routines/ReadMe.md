# Waitgroup

## Explaination

This Go code demonstrates the use of concurrency, specifically goroutines, and how to coordinate their execution using the `sync` package's `WaitGroup`. Additionally, it showcases some of the features provided by the `runtime` package, which are used for information about the current Go runtime.

Let's break down the program:

1. **Imports and Global Variable**:

    ```go
    import (
        "fmt"
        "runtime"
        "sync"
    )

    var wg sync.WaitGroup
    ```

    Three packages are imported:
    - `fmt`: For formatted I/O.
    - `runtime`: To access details and control the Go runtime.
    - `sync`: To provide basic synchronization primitives like `WaitGroup`.

    A global variable `wg` of type `sync.WaitGroup` is declared, which will be used to wait for the completion of the goroutine.

2. **Printing Runtime Details**:

    ```go
    fmt.Println("OS ", runtime.GOOS)
    fmt.Println("Arch ", runtime.GOARCH)
    fmt.Println("CPUs ", runtime.NumCPU())
    fmt.Println("Go routines  ", runtime.NumGoroutine())
    ```

    The program prints out:
    - The operating system (OS) the program is being run on.
    - The architecture of the system.
    - The number of CPUs that can be executing simultaneously.
    - The number of goroutines currently running.

3. **Creating and Running a Goroutine**:

    ```go
    wg.Add(1)
    go foo()
    bar()
    ```

    The `wg.Add(1)` method adds a counter to the wait group. The `go foo()` statement starts the `foo` function as a goroutine, which will run concurrently with the rest of the program. The main program then continues to call and execute the `bar` function.

4. **Printing Runtime Details Again**:

    ```go
    fmt.Println("CPUs ", runtime.NumCPU())
    fmt.Println("Go routines  ", runtime.NumGoroutine())
    ```

    The program prints the number of CPUs and the number of goroutines again. Since the `foo` function is executed as a goroutine, the number of goroutines should be greater compared to the previous print.

5. **Waiting for the Goroutine**:

    ```go
    wg.Wait()
    ```

    The `wg.Wait()` method blocks and waits until the counter inside the wait group returns to zero. In this program, that will only happen when the `foo` goroutine completes its execution and calls the `wg.Done()` method, signaling it's done.

6. **Functions foo and bar**:
    These two functions are simple loop functions that print their respective names and an incrementing integer. The key difference is that `foo` is intended to be run as a goroutine, and once it's finished with its loop, it signals the `WaitGroup` that it's done using `wg.Done()`.

By leveraging goroutines and `WaitGroup`, the program can run multiple functions concurrently and efficiently synchronize their completion.

### Tell me the significance of wg.Add(1), wg.Wait(), wg.Done(). The go routine is not yet called and we are calling wg.Add(1), why is that ?

The `sync.WaitGroup` is a type provided by the `sync` package in Go that allows you to synchronize the completion of multiple goroutines. It's particularly useful when you want to ensure that the main function, or another goroutine, waits for other goroutines to complete their tasks before proceeding.

Here's a breakdown of the methods you mentioned:

1. **wg.Add(delta int)**:
    - This method is used to increment the counter inside the `WaitGroup` by the value of `delta`.
    - `wg.Add(1)` increases the counter by 1, signaling that there's one more goroutine that the `WaitGroup` should wait for.

2. **wg.Wait()**:
    - This method blocks and waits until the counter inside the `WaitGroup` returns to zero.
    - Essentially, it's saying: "Wait until all the goroutines that we've added to the `WaitGroup` have signaled that they are done."

3. **wg.Done()**:
    - This method is a convenience method that decrements the counter inside the `WaitGroup` by 1.
    - It's equivalent to `wg.Add(-1)`.

Regarding the sequence:

- It's crucial to call `wg.Add(1)` **before** launching the goroutine with the `go` keyword. This is because goroutines are executed concurrently, and there's no guarantee that the code after the `go` keyword will be executed immediately or after the goroutine starts. If `wg.Add(1)` is called after the goroutine starts, there's a potential race condition where the goroutine might finish and call `wg.Done()` before `wg.Add(1)` is called in the main goroutine. This would result in a negative counter inside the `WaitGroup`, leading to a panic.

So, the sequence ensures that:

1. We tell the `WaitGroup` that we have one more goroutine to wait for using `wg.Add(1)`.
2. We then launch the goroutine using the `go` keyword.
3. At some point, the launched goroutine will signal that it's done with its work using `wg.Done()`.
4. Meanwhile, the main function (or another goroutine) can safely wait for all signaled goroutines to finish using `wg.Wait()`.

## Output

- Run the following

```bash
$ go run main.go
OS  darwin
Arch  amd64
CPUs  16
Go routines   1
bar  0
bar  1
bar  2
bar  3
bar  4
bar  5
bar  6
bar  7
bar  8
bar  9
CPUs  16
Go routines   2
foo  0
foo  1
foo  2
foo  3
foo  4
foo  5
foo  6
foo  7
foo  8
foo  9
```
