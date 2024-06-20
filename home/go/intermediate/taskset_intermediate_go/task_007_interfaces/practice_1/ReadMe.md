# Practice 1

## Explaination

```go
type bot interface {
    getGreeting() string
}
```

In the code snippet you provided, you have defined an `interface` named `bot`. In Go, an interface is a type that specifies a behavior (i.e., a set of methods) but not an implementation. Any other type that provides implementations for all the methods specified by an interface is said to "satisfy" that interface.

Here's what the given code means:

```go
type bot interface {
    getGreeting() string
}
```

This `bot` interface specifies that any type that wishes to satisfy the `bot` interface must have a method named `getGreeting` that returns a `string`.

Let's see how this interface can be used.

Imagine you have two types, `englishBot` and `spanishBot`, both of which can greet but in different languages:

```go
type englishBot struct {}
type spanishBot struct {}
```

Now, let's implement the `getGreeting` method for both types:

```go
func (eb englishBot) getGreeting() string {
    return "Hello!"
}

func (sb spanishBot) getGreeting() string {
    return "¡Hola!"
}
```

Both `englishBot` and `spanishBot` satisfy the `bot` interface because they both have a `getGreeting` method that returns a `string`.

Now, you can write a function that accepts the `bot` interface, which means it can accept any type that satisfies the `bot` interface:

```go
func printGreeting(b bot) {
    fmt.Println(b.getGreeting())
}
```

This function can be used with both `englishBot` and `spanishBot`:

```go
func main() {
    eb := englishBot{}
    sb := spanishBot{}

    printGreeting(eb)  // Output: Hello!
    printGreeting(sb)  // Output: ¡Hola!
}
```

This is the power of interfaces in Go. You can define behavior without worrying about the underlying implementation, and any type that provides that behavior can be used interchangeably. It's a way to achieve polymorphism in Go.

- Run the following command

```bash
$ go run main.go
Hi there!
Hola!
I was passed into bar {{James Bond} true}
I was passed into bar {Dr Who}
I am person
I am secret agent
```
