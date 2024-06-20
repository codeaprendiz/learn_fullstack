# Practice 2

Your code provides an excellent example to explain interfaces in Go. Let's break it down:

## Understanding Interfaces in Go

In Go, an interface is a type that specifies a set of method signatures (behavior) but does not implement them. Interfaces are used to define the behavior that structs (or non-struct types) must fulfill. They allow for polymorphism in Go.

### The Code Example

1. **Defining the Interface**:

   ```go
   type bot interface {
       getGreeting() string
   }
   ```

   - Here, you define an interface named `bot`.
   - The `bot` interface requires any type that implements it to have a `getGreeting` method that returns a string.

2. **Struct Types**:
   - You declare two struct types, `EnglishBot` and `SpanishBot`, with no fields.

   ```go
   type EnglishBot struct{}
   type SpanishBot struct{}
   ```

3. **Implementing Interface Methods**:
   - Both `EnglishBot` and `SpanishBot` implement the `getGreeting` method, thus fulfilling the `bot` interface.

   ```go
   func (englishBot EnglishBot) getGreeting() string {
       return "Hello!"
   }
   func (spanishBot SpanishBot) getGreeting() string {
       return "Hola!"
   }
   ```

   - Even though these methods are not explicitly declared to be part of the `bot` interface, in Go, the implementation is implicit. If a type has all the methods that an interface requires, it is considered to implement that interface.

4. **Interface in Action**:
   - The `printGreeting` function takes a parameter of type `bot`.

   ```go
   func printGreeting(b1 bot) {
       fmt.Println("Greetings : ", b1.getGreeting())
   }
   ```

   - This function can accept any type that implements the `bot` interface. In this case, both `EnglishBot` and `SpanishBot` can be passed to this function.

5. **Using the Interface in `main`**:
   - You create instances of `EnglishBot` and `SpanishBot`.
   - Both instances are passed to `printGreeting`.

   ```go
   englishBot := EnglishBot{}
   spanishBot := SpanishBot{}
   printGreeting(englishBot)
   printGreeting(spanishBot)
   ```

   - Despite `englishBot` and `spanishBot` being different types, they both fulfill the `bot` interface, so they can be used interchangeably where a `bot` is required.

### Key Takeaways

- Interfaces in Go provide a way to specify the behavior that a type must have.
- Go uses implicit implementation: a type implements an interface just by having the methods that the interface requires.
- Interfaces are not limited to struct types; any type can implement an interface if it has the required methods.
- Interfaces are used for polymorphism in Go, allowing functions to be written in a more generic and flexible way.

Your code is a classic example of using interfaces to allow different types (here `EnglishBot` and `SpanishBot`) to be used interchangeably, as long as they implement the same set of methods defined in the interface (`bot` in this case).

## Run

```bash
$ go run main.go
Greetings :  Hello!
Greetings :  Hola!
```
