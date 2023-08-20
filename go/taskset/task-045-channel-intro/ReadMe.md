# Channel Intro

## Explaination

This program demonstrates basic usage of buffered channels in Go. Let's break down the code:

1. A channel `c` of type `int` is created with a buffer size of 1:

   ```go
   c := make(chan int, 1)
   ```

2. A goroutine is started which sends the integer value `42` to the channel `c`:

   ```go
   go func() {
       c <- 42
   }()
   ```

   Since the channel `c` has a buffer size of 1, the goroutine doesn't need to wait for another goroutine to receive the value. It places `42` in the channel buffer and completes its execution.

3. The main goroutine receives the value from the channel and prints it:

   ```go
   fmt.Println(<-c)
   ```

   The output at this point will be `42`.

4. The main goroutine then sends the integer value `43` to the channel `c`:

   ```go
   c <- 43
   ```

   Again, since the channel buffer has been emptied by the previous receive operation, this send operation does not block, and `43` is placed in the channel buffer.

5. The main goroutine receives the value from the channel and prints it:

   ```go
   fmt.Println(<-c)
   ```

   The output now will be `43`.

Overall, the output of the program will be:

```bash
42
43
```

The key concept demonstrated here is the usage of buffered channels. Buffered channels allow a specified number of values to be sent without a corresponding receiver being ready. In this example, the buffer size is `1`, meaning the channel can hold one value at a time before needing another goroutine to receive the value.

## Output

- Run the following

```bash
$ go run main.go       
42
```
