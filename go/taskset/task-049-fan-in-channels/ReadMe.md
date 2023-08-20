# Fan-in Channels

## Explaination

The given program is a classic representation of the "fan-in" pattern in concurrent programming. The "fan-in" pattern describes a scenario where multiple channels send their data into a single channel. This is a useful pattern when data from multiple sources (channels) need to be consolidated or processed in a single place (channel).

Let's break down the program:

1. **Channel Creation**:

   ```go
   even := make(chan int)
   odd := make(chan int)
   fanin := make(chan int)
   ```

   Three channels are created:
   - `even` will hold even numbers.
   - `odd` will hold odd numbers.
   - `fanin` will combine or "fan in" the data from both `even` and `odd` channels.

2. **Sending Values**:
   The `send` function sends numbers to either the `even` or `odd` channels based on their value:

   ```go
    for i := 0;i <10; i++ {
        if i%2 == 0 {
            e <- i
        } else {
            o <- i
        }
    }
   ```

   After sending all the numbers, the `even` and `odd` channels are closed. This signals that no more data will be sent on these channels.

3. **Receiving and Fan-In**:
   The `receive` function reads numbers from both the `even` and `odd` channels and sends them to the `fanin` channel:

   ```go
    go func() {
        for v := range e {
            fanin <- v
        }
        wg.Done()
    }()

    go func() {
        for v := range o {
            fanin <- v
        }
        wg.Done()
    }()
   ```

   The `receive` function utilizes goroutines to read from the `even` and `odd` channels concurrently. The `sync.WaitGroup` is used to wait for both of these goroutines to finish their tasks. Once both goroutines are done (i.e., they've read all values from the `even` and `odd` channels), the `fanin` channel is closed.

4. **Reading from `fanin` in the main function**:

   ```go
   for v := range fanin {
        fmt.Println(v)
   }
   ```

   In the main function, numbers are read from the `fanin` channel until it's closed (which happens after both the `even` and `odd` channels have been fully processed and all their values have been sent to `fanin`).

5. Finally, a message is printed indicating the program is about to finish:

   ```go
   fmt.Println("About to exit")
   ```

The program demonstrates a clean way to handle multiple channels and consolidate their data into a single channel. The output will be the numbers from 0 to 9 (inclusive) printed in an unpredictable order since the exact sequence depends on the scheduling of goroutines by the Go runtime.

### why are they declared differently in function argument? func receive(e, o <- chan int, fanin chan<- int)  ?

In Go, channels can be uni-directional or bi-directional. A bi-directional channel can both send and receive values, while a uni-directional channel can either send or receive values, but not both. The directionality of channels can be useful for expressing intent and adding a layer of type safety to functions that use channels.

In the function signature:

```go
func receive(e, o <-chan int, fanin chan<- int)
```

1. `e, o <-chan int`: The `e` and `o` channels are "receive-only" channels. This means you can only receive values from these channels within the `receive` function. You can't send values to these channels.

2. `fanin chan<- int`: The `fanin` channel is a "send-only" channel. This means you can only send values to this channel within the `receive` function. You can't receive values from this channel.

By specifying directionality in the function arguments:

- It makes the code more readable because you can tell at a glance what each channel is intended for.
- It provides compile-time safety. If you try to send a value to a receive-only channel or receive a value from a send-only channel within the `receive` function, the Go compiler will throw an error.

For example, if you mistakenly attempt to send a value to the `e` channel within the `receive` function, the Go compiler will catch this mistake and notify you.

## Output

- Run the following

```bash
$ go run main.go       
0
2
1
3
5
4
6
8
7
9
About to exit
```
