# Directional Channels

## Explaination

This code is demonstrating different types of channel directions in Go: bidirectional, send-only, and receive-only channels. Here's a breakdown:

1. Three channels are created:

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

   The expected output here will be:

   ```bash
   c 	chan int : 
   cr 	<-chan int : 
   cs 	chan<- int
   ```

3. A goroutine is launched with the `send` function:

   ```go
   go send(c)
   ```

   The `send` function takes a send-only channel (`chan<- int`) as an argument and sends the integer `43` into it. 

4. The `receive` function is then called:

   ```go
   receive(c)
   ```

   The `receive` function takes a receive-only channel (`<-chan int`) as an argument and receives the integer value from the channel, which is then printed.

   The output from the `send` and `receive` functions will be:

   ```bash
   inside send()
   inside receive()
   43
   ```

5. Lastly, a message indicating the end of the program is printed:

   ```go
   fmt.Println("\nAbout to exit")
   ```

Note: Though the `cr` (receive-only) and `cs` (send-only) channels are created, they are not being used in the given code. They are primarily present to demonstrate the channel type declarations.

Final output of the program will be:

```bash
c 	chan int : 
cr 	<-chan int : 
cs 	chan<- int
inside send()
inside receive()
43
About to exit
```

## Output

- Run the following

```bash
$ go run main.go

c       chan int : 
cr      <-chan int : 
cs      chan<- int
inside receive()

inside send()
43

About to exit
```
