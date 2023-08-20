# Fan out channels

## Explaination

```go
func main() {
    c1 := make(chan int)
    c2 := make(chan int)

    go populate(c1)
    go fanOutIn(c1, c2)

    for v := range c2 {
        fmt.Println(v)
    }
}
```

Here in `main()`, two channels `c1` and `c2` are created. `populate(c1)` populates `c1` with numbers and runs as a goroutine. `fanOutIn(c1, c2)` reads from `c1`, processes the numbers in parallel, and sends the results to `c2`. The main goroutine then prints each value received from `c2`.

---

```go
func timeConsumingWork(n int) int {
    time.Sleep(time.Microsecond * time.Duration(rand.Intn(500)))
    return n + rand.Intn(1000)
}
```

`timeConsumingWork` is a mock function that represents a task that takes some random time (0 to 500 microseconds) to complete. It returns the passed integer `n` added to a random number between 0 and 999.

---

```go
func populate(c chan int) {
    for i := 0; i < 10; i++ {
        c <- i
    }
    close(c)
}
```

The `populate` function sends the numbers 0 through 9 to the channel `c`. After sending all the numbers, it closes the channel to indicate that no more data will be sent.

---

```go
func fanOutIn(c1, c2 chan int) {
    var wg sync.WaitGroup
    for v := range c1 {
        wg.Add(1)
        go func(v2 int) {
            c2 <- timeConsumingWork(v2)
            wg.Done()
        }(v)
    }
    wg.Wait()
    close(c2)
}
```

`fanOutIn` demonstrates the "fan out, fan in" concurrency pattern:

1. **Fan out**: For each number `v` received from the `c1` channel, a new goroutine is started to process that number.
  
2. **Processing in Goroutine**: Inside the goroutine, the `timeConsumingWork` function is called with the number `v` and the result is sent to the `c2` channel.
  
3. **WaitGroup**: The `sync.WaitGroup` is used to track the number of active goroutines. `wg.Add(1)` adds a count for each goroutine started, and `wg.Done()` reduces the count when a goroutine completes. The main routine of `fanOutIn` waits with `wg.Wait()` for all goroutines to complete before proceeding.
  
4. **Fan in**: After all the numbers have been processed and all the goroutines have completed, the `c2` channel is closed, indicating that there's no more data to be sent.

In essence, this code is a clear demonstration of how Go's channels and goroutines can be leveraged to efficiently process data in parallel, and how to synchronize and manage that concurrency.

## Output

- Run the following

```bash
$ go run main.go
426
696
170
96
733
277
220
445
241
112

```
