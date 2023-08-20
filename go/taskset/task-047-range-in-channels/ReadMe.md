# Range in channels

## Explaination

This code demonstrates the usage of bidirectional, receive-only, and send-only channels, as well as how to send and receive multiple values from a channel. The main difference from the previous code is that multiple values are sent and received, and the channel is closed once sending is done.

Here's a breakdown:

1. Three channels are declared:

   ```go
   c := make(chan int)        // a bidirectional channel (can both send and receive)
   cr := make(<-chan int)     // a receive-only channel
   cs := make(chan<- int)     // a send-only channel
   ```

2. The types of these channels are printed using `fmt.Printf`:

   ```go
   fmt.Printf("\nc \t%T : ", c)
   fmt.Printf("\ncr \t%T : ", cr)
   fmt.Printf("\ncs \t%T", cs)
   ```

   The output here will be:

   ```bash
   c 	chan int : 
   cr 	<-chan int : 
   cs 	chan<- int
   ```

3. A goroutine is started with the `send` function:

   ```go
   go send(c)
   ```

   The `send` function takes a bidirectional channel (`chan int`) as an argument. Inside this function, values from `0` to `9` are sent to the channel, and after sending all the values, the channel is closed using `close(c)`.

4. The `receive` function is then called:

   ```go
   receive(c)
   ```

   The `receive` function also takes a bidirectional channel (`chan int`) as an argument. Inside this function, the program waits to receive values from the channel. As the values are received, they are printed. The `for v := range c` loop will continue to wait for values until the channel is closed, at which point the loop will exit.

5. A message indicating the end of the main function is printed:

   ```go
   fmt.Println("\nAbout to exit")
   ```

Final output will be something like:

```bash
c 	chan int : 
cr 	<-chan int : 
cs 	chan<- int
inside send()
inside receive()
0
1
2
3
4
5
6
7
8
9
About to exit
```

Note: Even though `cr` (receive-only) and `cs` (send-only) channels are created, they aren't actually used in the code. They are primarily present to demonstrate the channel type declarations.

## Output

- Run the following

```bash
$ go run main.go

c       chan int : 
cr      <-chan int : 
cs      chan<- int
inside receive()

inside send()
0
1
2
3
4
5
6
7
8
9

About to exit
```
