# Practice 1

## Why the need to implement Write method?

In Go, interfaces define a contract or a set of behaviors that a type should implement. In simple terms, they specify "what" operations can be done, but not "how" these operations should be performed.

The `io.Writer` interface, defined in the `io` package, is one of the most widely used interfaces in Go. It has a single method:

```go
type Writer interface {
    Write(p []byte) (n int, err error)
}
```

Any type that provides a method with this exact signature is said to "satisfy" or "implement" the `io.Writer` interface.

So, when we say:

```go
func (logWriter) Write(bs []byte) (int, error) {
    fmt.Println(string(bs))
    fmt.Println("Just wrote this many bytes:", len(bs))
    return len(bs), nil
}
```

We are essentially giving our custom `logWriter` type a method that matches the signature required by the `io.Writer` interface. By doing so, our `logWriter` type now satisfies the `io.Writer` interface.

Why is this powerful?

Once a type satisfies an interface, it can be used anywhere the interface is expected. This means that our `logWriter` type can now be used with any function or method that expects an `io.Writer` type.

For example, the `io.Copy` function:

```go
func Copy(dst Writer, src Reader) (written int64, err error)
```

expects the first argument (`dst`) to be of a type that satisfies the `io.Writer` interface. Since our `logWriter` type now satisfies this interface, we can pass an instance of `logWriter` to `io.Copy`.

In essence, by making `logWriter` satisfy the `io.Writer` interface, we've enabled it to be plugged into a wide range of functions and libraries in Go that work with writable destinations. This is the power of interfaces in Go – they allow for great flexibility and inter-operability of types.

## Running

- Run the following command

```bash
$ go run main.go
Just wrote this many bytes: 21315
```

## when is the interface Writer method called here? i don't see any explicit call. Also what are we doing in io.Copy?

The code illustrates the usage of the `io.Writer` interface and the `io.Copy` function in Go. Let's break down how it works:

### `io.Writer` Interface and Its Usage

1. **`logWriter` Struct**: You've defined a `logWriter` struct with no fields.
2. **Implementing `io.Writer`**: You've implemented the `Write` method on `logWriter`, making it satisfy the `io.Writer` interface. The `io.Writer` interface requires a `Write` method with the signature `Write([]byte) (int, error)`.
3. **The `Write` Method Implementation**: Your implementation of `Write` prints the length of the byte slice it receives and then returns the length and `nil` as the error.

### The `io.Copy` Function

1. **Function Description**: `io.Copy` is a standard library function that takes two arguments: a destination implementing `io.Writer` and a source implementing `io.Reader`.
2. **What It Does**: It reads data from the source and writes it to the destination until there’s no more data to read or an error occurs. The function returns the number of bytes copied and the first error encountered while copying, if any.

### How Your Code Works

1. **HTTP Request**: `http.Get("http://google.com")` makes an HTTP GET request to Google and returns the response (`resp`) and an error value (`err`). The `resp.Body` is an `io.ReadCloser`, which means it implements the `io.Reader` interface.
2. **Using `io.Copy`**: When you call `io.Copy(lw, resp.Body)`, you are passing `lw` (an instance of `logWriter` which satisfies `io.Writer`) and `resp.Body` (which satisfies `io.Reader`).
3. **Interface Method Call**: Here's the crucial part - the `Write` method of `logWriter` is called implicitly by `io.Copy`. Each time `io.Copy` reads a chunk of data from `resp.Body`, it calls the `Write` method on `lw` to write that data. This is why you don't see an explicit call to `Write`; it's handled internally by `io.Copy`.

### Summary

- The `Write` method of `logWriter` is called by `io.Copy` each time it has data to write.
- `io.Copy` is effectively pumping data from `resp.Body` (the HTTP response body) and writing it to `lw` (your custom logger).
- In this process, `io.Copy` handles all the looping, reading from the reader, and writing to the writer. You've offloaded the heavy lifting of data transfer to `io.Copy`, while `logWriter` controls what happens with the data once it's received (in your case, just logging its length).