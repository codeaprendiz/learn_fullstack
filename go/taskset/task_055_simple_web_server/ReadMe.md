# Simple Web Server

## Explaination

Certainly! Let's break down the provided code, which is a simple HTTP server using Go's standard library:

```go
package main

import (
  "fmt"
  "log"
  "net/http"
)
```

This block of code defines the package name (`main`) and imports three packages:

1. `fmt`: Used for formatted I/O.
2. `log`: Used for logging error messages.
3. `net/http`: Provides HTTP client and server implementations.

---

```go
func handler(w http.ResponseWriter, r *http.Request) {
  fmt.Fprintf(w, "Hi there, I love %s!", r.URL.Path[1:])
}
```

This defines a function named `handler` that will be our HTTP request handler:

1. `w http.ResponseWriter`: An interface that allows the server to form an HTTP response to be written back to the client.
2. `r *http.Request`: A pointer to the `http.Request` object which provides information about the incoming HTTP request, like headers, query parameters, and more.
3. `fmt.Fprintf(w, "Hi there, I love %s!", r.URL.Path[1:])`: This line sends a response to the client. Specifically, it responds with the string "Hi there, I love [URL path]!". The expression `r.URL.Path[1:]` gets the path from the incoming request URL and trims the leading `/`. So, if someone accesses `http://localhost:8080/Go`, the response would be "Hi there, I love Go!".

---

```go
func main() {
	http.HandleFunc("/", handler)
	log.Fatal(http.ListenAndServe(":8080", nil))
}
```

Here's what's happening in the `main` function:

1. `http.HandleFunc("/", handler)`: This registers the `handler` function to serve requests at the root URL path ("/"). Whenever an HTTP request comes to the root path, the `handler` function will be invoked.

2. `log.Fatal(http.ListenAndServe(":8080", nil))`: This starts an HTTP server that listens on port `8080`. The `nil` argument indicates that we're using the default `http.ServeMux`, which is an HTTP request multiplexer (a fancy term for a router). The `ListenAndServe` function will block and continue to serve incoming HTTP requests. If there's any error (like if the port is already in use), the function will return that error, and `log.Fatal` will log the error and then call `os.Exit(1)` to terminate the program.

---

To summarize:

This is a simple web server in Go. When you run the program and navigate to `http://localhost:8080/[ANYTHING]`, the server will respond with "Hi there, I love [ANYTHING]!". The [ANYTHING] part can be replaced with any string you put in the path to see the dynamic response based on the URL.

### We are only changing the request object here - `fmt.Fprintf(w, "Hi there, I love %s!", r.URL.Path[1:])`, so how is the response getting changed?

Great question! Let's clarify how the request and response are being used here.

In the line:

```go
fmt.Fprintf(w, "Hi there, I love %s!", r.URL.Path[1:])
```

- `r *http.Request`: Represents the incoming request, and as you pointed out, we're extracting information from it using `r.URL.Path[1:]` to get the path from the URL (minus the leading "/").

- `w http.ResponseWriter`: Represents the response that will be sent back to the client. Specifically, it's an interface to the server's response.

When you use `fmt.Fprintf(w, ...)`, you're not writing to the request. Instead, you're writing to the response.

`fmt.Fprintf` is a function that lets you format and write data to any `io.Writer`. In this context, `w http.ResponseWriter` is acting as that writer. Therefore, by using `fmt.Fprintf(w, ...)`, you're actually writing the formatted string directly to the HTTP response.

So, to answer your question, we're reading from the request (`r *http.Request`) to get the URL path, and we're writing to the response (`w http.ResponseWriter`) to send the message back to the client.

### how is the handler function for `/` i.e. `http.HandleFunc("/", handler)` also handlying for /anything?

The behavior you're observing is due to how the `http.HandleFunc` function works with regards to URL patterns.

When you register a handler function with the pattern `/` using `http.HandleFunc("/", handler)`, it means that this handler function will be invoked for any path that starts with `/`, unless a more specific handler has been registered for that path.

For instance:

- `/`: Matches, because it's exactly `/`.
- `/anything`: Matches, because it starts with `/`.
- `/something/else`: Also matches, because it starts with `/`.

Now, if you had another handler specifically for `/specific`, like this:

```go
http.HandleFunc("/specific", anotherHandler)
```

Then, a request to `/specific` would go to `anotherHandler` instead of `handler`, because it's a more specific match. However, a request to `/specific/and/more` would still be routed to the `handler` function since there's no more specific handler than `/`.

In essence, when the net/http package looks for a handler to execute, it starts with the most specific (i.e., longest) registered path and works its way down. If it doesn't find an exact match, it'll use the handler of the longest matching prefix. The `/` route essentially acts as a catch-all because every path will start with a `/`.

### explain r.URL.Path[1:] and how it is being used

Let's break it down.

In the code snippet you provided:

```go
fmt.Fprintf(w, "Hi there, I love %s!", r.URL.Path[1:])
```

`r.URL.Path` refers to the path component of the request URL. The `*http.Request` object `r` carries various information about the incoming request, and the `URL` field of that object (of type `*url.URL`) contains the parsed URL of the request. The `Path` attribute of this `URL` object is the path component of that URL.

For example, if you navigate to:

```bash
http://localhost:8080/Go
```

The `r.URL.Path` would be `/Go`.

Now, what does `[1:]` do? It's a slice operation on the string. Strings in Go can be sliced, similar to arrays and slices. The expression `[1:]` slices the string starting from the index `1` up to the end of the string.

So, if `r.URL.Path` is `/Go`, `r.URL.Path[1:]` would be `Go`.

The reason for using this slicing operation in the given context is to remove the leading `/` from the URL path, so that the message displays nicely in the response.

Therefore, when the `handler` function is invoked by a request to `http://localhost:8080/Go`, the output would be:

```bash
Hi there, I love Go!
```

Without the slicing (`r.URL.Path[1:]`), the output would have been:

```bash
Hi there, I love /Go!
```

### how is it removing the / though, i am not passing anything that says you remove /

In the code snippet you provided:

```go
fmt.Fprintf(w, "Hi there, I love %s!", r.URL.Path[1:])
```

the part `r.URL.Path[1:]` does not explicitly mention that it removes the `/`, but it achieves that removal implicitly by how slicing works in Go.

Let's break it down:

1. `r.URL.Path` is a string that represents the path component of the URL.
2. In Go, strings (like slices) can be "sliced" using the `[start:end]` syntax, where `start` is inclusive and `end` is exclusive. When `end` is omitted, it means slice till the end of the string.
3. `r.URL.Path[1:]` means "give me the string starting from index `1` (0-based) till the end".

Now, consider an example:

If the user navigates to `http://localhost:8080/Go`, the `r.URL.Path` will be `/Go`. The `/` is at index `0` and `G` is at index `1`.

With the slice operation `r.URL.Path[1:]`, it starts from index `1`, so it essentially "skips" the `/` at the beginning. The result is `Go`, and that's how it effectively removes the leading `/` from the path.

## Output

- Run the following

```bash
$ go run main.go  


## On another terminal

$ curl  http://localhost:8080/go-language
Hi there, I love go-language!% 
```
