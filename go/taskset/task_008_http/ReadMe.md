# HTTP

## Explaination

Sure, let's break down both programs:

### **First Program**

1. **Packages Imported**: This program imports several packages, including:
   - `fmt`: For printing to the console.
   - `io`: Provides basic interfaces to I/O primitives.
   - `net/http`: To make HTTP requests.
   - `os`: To interact with the operating system, such as exiting a program.

2. **logWriter Struct**: 
   - `type logWriter struct{}`: Defines an empty struct named `logWriter`.

3. **main_v1 Function**: 
   - It tries to fetch the content of "http://google.com".
   - If there's an error during the HTTP request, it prints the error and exits.
   - If the request is successful, it then uses `io.Copy` to copy the response body to a `logWriter`. 

4. **Write Method for logWriter**: 
   - This method makes the `logWriter` type satisfy the `io.Writer` interface.
   - When called (such as by `io.Copy`), it prints the received byte slice as a string and also its length.
   - Finally, it returns the length of the byte slice and `nil` as the error (indicating no error occurred).

### **Second Program**

1. **Packages Imported**: Same as the first program.

2. **logWriter_v2 Struct**: 
   - `type logWriter_v2 struct{}`: Defines an empty struct named `logWriter_v2`.

3. **Write Method for logWriter_v2**: 
   - This is very similar to the `Write` method from the first program. The only difference is the method's name and the name of its receiver. The functionality and its role in the program are the same. (However, note that the detailed comment in the method might be a bit confusing. The method name is still `Write`, not `write_v2`.)

4. **main Function**:
   - It first calls the `main_v1` function from the first program.
   - Then, similar to `main_v1`, it fetches the content of "http://google.com".
   - If successful, it uses `io.Copy` to copy the response body to a `logWriter_v2`.

### **In Summary**:

Both programs are demonstrating how custom types (`logWriter` and `logWriter_v2`) can implement the `io.Writer` interface to work with functions like `io.Copy`. This is a powerful feature of Go that allows you to customize how built-in functions and methods work with your own types.

The second program additionally showcases how you can combine multiple main-like functions into one program, running them sequentially by calling them from the actual `main()` function. This is useful for demonstration purposes or when you want to organize your code in a modular fashion.

## Why the need to implement Write method?

Absolutely.

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
$ go mod init http
.
$ go mod tidy
.
$ go run .
------------------main v1----------------------
<!doctype html><html dir="rtl" itemscope=""
.
.
name="+(a||""))}}else F=a,E=[c]}window.document.addEventListener("
Just wrote this many bytes: 21341
------------------main v2------------------------
<!doctype html><html dir="rtl" itemscope="" itemtype="h
.
.
name="+(a||""))}}else F=a,E=[c]}window.document.addEventListener("DOMContentLoaded",function(){document.body.addEventListener("click",G)});}).call(this);</script></body></html>
Bytes length :  21268
```
