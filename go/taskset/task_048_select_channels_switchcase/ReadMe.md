# Select Channels

## Explaination

This program demonstrates the concept of Go's `select` statement with channels, a powerful feature that allows a program to wait on multiple communication operations. The program utilizes three channels to send and receive values based on their type (even, odd, or quit).

Here's the breakdown:

1. **Channel Creation**:

   ```go
   even := make(chan int)
   odd := make(chan int)
   quit := make(chan int)
   ```

   Three channels are created: `even` for even numbers, `odd` for odd numbers, and `quit` to signal when sending is complete.

2. **Sending**:
   The `send` function is executed in its own goroutine. This function will send numbers to the appropriate channel based on whether they're even or odd:

   ```go
   go send(even, odd, quit)
   ```

   Inside the `send` function:

   ```go
   for  i:=0; i<10; i++ {
    if i % 2 == 0 {
        e <- i
    } else {
        o <- i
    }
  }
   ```

   Numbers from 0 through 9 are evaluated. If the number is even, it's sent to the `even` channel; otherwise, it's sent to the `odd` channel.

   After all numbers are sent, a value of `1` is sent to the `quit` channel to signal that sending is complete:

   ```go
   q <- 1
   ```

3. **Receiving**:
   The `receive` function processes the received numbers:

    ```go
   receive(even, odd, quit)
   ```

   Inside the `receive` function, there's a continuous loop waiting for values from the channels:

   ```go
   for {
    select {
    case v := <- e:
        fmt.Println("Even channel ", v)
    case v := <- o:
        fmt.Println("Odd channel ", v)
    case v := <- q:
        fmt.Println("Quit channel ", v)
        return
    default:
        fmt.Println("No match")
    }
}
    ```

   The `select` statement works somewhat like a `switch` statement, but for channels:

   - If there's a value ready in the `even` channel, it's received and printed.
   - If there's a value ready in the `odd` channel, it's received and printed.
   - If there's a value ready in the `quit` channel, it's received, printed, and the `receive` function exits.
   - The `default` case would print "No match" if none of the channels have a value ready. However, due to the synchronous nature of the program and the absence of any buffers on the channels, this case will likely not get hit in this particular code.

The flow of the program will generally be:

1. Start sending numbers from the `send` goroutine.
2. The main goroutine (executing the `receive` function) will continuously receive these numbers.
3. Once all numbers are sent, the `quit` channel receives a value, causing the `receive` function to exit.

The expected output will be:

```bash
Even channel 0
Odd channel 1
Even channel 2
Odd channel 3
Even channel 4
Odd channel 5
Even channel 6
Odd channel 7
Even channel 8
Odd channel 9
Quit channel 1
```

The commented-out `close` calls in the `send` function indicate that originally, the channels might have been intended to be closed after sending all values, but they've been left out in this particular version of the code.

## Output

- Run the following

```bash
$ go run main.go --race
No match
Even channel  0
No match
No match
No match
No match
No match
No match
Odd channel  1
No match
No match
No match
No match
No match
No match
No match
Even channel  2
No match
Odd channel  3
No match
Even channel  4
No match
Odd channel  5
Even channel  6
No match
No match
No match
No match
Odd channel  7
Even channel  8
No match
Odd channel  9
Quit channel  1
```
