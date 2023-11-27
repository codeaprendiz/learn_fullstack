# Race Condition

## Explaination

Alright, let's break down this code:

1. **Initialization and Information Print Statements**:

    ```go
    fmt.Println("CPUs ", runtime.NumCPU())
    fmt.Println("GoRoutines", runtime.NumGoroutine())
    ```

    The program starts by printing the number of CPUs and the number of goroutines that are currently active. Initially, only the main goroutine will be active.

2. **Setting up the Counter**:

    ```go
    counter := 0
    ```

    We declare a variable `counter` initialized to zero.

3. **Setting up the WaitGroup and Starting Multiple Goroutines**:

    ```go
    var wg sync.WaitGroup
    const gs = 10
    wg.Add(gs)
    for i := 0; i < gs; i++ {
        go func() { ... }()
    }

    ```
    Here, we declare a `sync.WaitGroup` and a constant `gs` set to 10. The program then increments the WaitGroup's counter by 10 (`wg.Add(gs)`) because we plan to launch 10 goroutines. Then, we start 10 goroutines inside the for loop.

4. **Inside Each Goroutine**:

    ```go
    v := counter            // Reading the counter value.
    runtime.Gosched()       // Yield the processor.
    v++
    counter = v             // Incrementing the counter.
    fmt.Println("Go routine ", runtime.NumGoroutine())
    wg.Done()
    ```

    For each goroutine:
    - It reads the value of `counter` into the local variable `v`.
    - It yields its processor time using `runtime.Gosched()`. This function allows the Go scheduler to run another goroutine, if any is waiting, making our race condition more pronounced.
    - It increments the local variable `v`.
    - It writes the value back to the `counter`.
    - It prints the number of active goroutines.
    - It signals that this goroutine's work is done by calling `wg.Done()`, decrementing the counter of the WaitGroup.

5. **Waiting and Final Print Statements**:

    ```go
    wg.Wait()
    fmt.Println("CPUs ", runtime.NumCPU())
    fmt.Println("GoRoutines", runtime.NumGoroutine())
    fmt.Print("Counter" , counter)
    ```

    After starting all the goroutines, the main function waits for all of them to complete using `wg.Wait()`. Once they're done, the program prints the number of CPUs, the number of active goroutines, and the final value of the `counter`.

**Key Points**:

- The use of `runtime.Gosched()` amplifies the race condition that exists when multiple goroutines try to access and modify the `counter` simultaneously. Since there's no synchronization mechanism around the counter, its final value might be different from 10 (the number of goroutines).
- This code demonstrates the problems that arise from concurrent access to shared variables. Normally, one would use synchronization mechanisms like mutexes to protect the shared variable (`counter` in this case) from race conditions.
- The output will likely be inconsistent between runs due to the race condition.

## Output

- Run the following

```bash
$ go run main.go
CPUs  16
GoRoutines 1
Go routine  11
Go routine  10
Go routine  9
Go routine  8
Go routine  7
Go routine  6
Go routine  5
Go routine  4
Go routine  3
Go routine  11
CPUs  16
GoRoutines 1
Counter10

$ go run main.go
CPUs  16
GoRoutines 1
Go routine  9
Go routine  8
Go routine  7
Go routine  8
Go routine  7
Go routine  6
Go routine  5
Go routine  4
Go routine  7
Go routine  5
CPUs  16
GoRoutines 1
Counter10

$ go run -race main.go 
CPUs  16
GoRoutines 1
Go routine  3
Go routine  4
==================
WARNING: DATA RACE
Read at 0x00c00001e0c8 by goroutine 8:
  main.main.func1()
      $HOME/workspace/devops-essentials/go/task-043-race-condition/main.go:19 +0x3c

Previous write at 0x00c00001e0c8 by goroutine 7:
  main.main.func1()
      $HOME/workspace/devops-essentials/go/task-043-race-condition/main.go:23 +0x68

Goroutine 8 (running) created at:
  main.main()
      $HOME/workspace/devops-essentials/go/task-043-race-condition/main.go:18 +0x244

Goroutine 7 (finished) created at:
  main.main()
      $HOME/workspace/devops-essentials/go/task-043-race-condition/main.go:18 +0x244
==================
Go routine  4
Go routine  4
Go routine  5
Go routine  4
Go routine  5
Go routine  2
Go routine  3
Go routine  2
CPUs  16
GoRoutines 1
Counter10Found 1 data race(s)
exit status 66
```

## Take aways from output

The provided output showcases the behavior of the Go program you provided in the presence of race conditions. Let's break down the output.

1. **First and Second Run (without the `-race` flag):**

```bash
$ go run main.go
CPUs  16
GoRoutines 1
Go routine  11
...
Counter10
```

For both of these runs:

- The program starts with 1 goroutine (the main goroutine).
- When the goroutines are started, you see varying numbers for the active goroutines because they are being scheduled and run concurrently.
- Despite the race condition in the program, the counter is incremented to 10, which is the intended number, but this is purely coincidental due to the way the race condition is manifesting. There is no guarantee that this will always be the case.

2. **Third Run (with the `-race` flag):**

```bash
$ go run -race main.go 
CPUs  16
GoRoutines 1
...
WARNING: DATA RACE
...
Counter10Found 1 data race(s)
exit status 66
```

- The `-race` flag enables the race detector, which dynamically analyzes the program for race conditions while it's running.
- The race detector has detected a race condition and prints a detailed report about it. The report indicates that:
  - There was a read operation at a memory location by one goroutine.
  - There was a previous write operation at the same memory location by another goroutine.
  - These operations were concurrent, meaning they were not safely coordinated (e.g., with a mutex), and hence the program has a data race.
- The paths and line numbers in the report indicate where in the code the race condition was detected. For instance, the lines:

  ```bash
  main.main.func1()
      $HOME/workspace/devops-essentials/go/task-043-race-condition/main.go:19 +0x3c
  ```

  point to the exact location in the Go code where the race was detected.
  
- Finally, the program exits with a special status code (66) to indicate that a data race was found.

**Takeaways:**

- The behavior of programs with race conditions can be unpredictable, which is why the order of "Go routine" prints and the number of goroutines varies between runs.
  
- The `-race` flag is a powerful tool in Go's toolkit that helps developers identify and fix race conditions in their programs. The detailed report it provides can be used to pinpoint exactly where in the code the race is occurring.
