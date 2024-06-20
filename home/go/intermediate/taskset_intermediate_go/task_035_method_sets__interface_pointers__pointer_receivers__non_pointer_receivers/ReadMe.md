# Method Sets

## Explaination

This program demonstrates Go's interfaces and how method receivers work with both pointer and non-pointer values. Let's break down the code step by step:

1. **Imports**:

   ```go
   import (
       "fmt"
       "math"
   )
   ```

   This imports the necessary packages: `fmt` for formatted input/output and `math` to provide mathematical constants and functions.

2. **Struct Definition**:

   ```go
   type circle struct {
       radius float64
   }
   ```

   A new type `circle` is defined as a struct with a single field `radius` of type `float64`.

3. **Interface Definition**:

   ```go
   type shape interface {
       area() float64
   }
   ```

   An interface named `shape` is defined with a single method `area` that returns a `float64`. Any type that has this method with the appropriate signature satisfies the `shape` interface.

4. **Method Definition**:

   ```go
   func (c circle) area() float64 {
       return math.Pi * c.radius * c.radius
   }
   ```

   A method `area` is attached to the `circle` type. This method calculates the area of the circle using the formula `π * radius^2`. Since the `circle` type has the `area` method, it satisfies the `shape` interface. Note that the method has a non-pointer receiver `(c circle)`, which means it operates on a copy of the original value.

5. **Function that Accepts the Interface**:

   ```go
   func info(s shape) {
       fmt.Println("area " , s.area())
   }
   ```

   The `info` function takes in a parameter `s` of type `shape`. Since `shape` is an interface, any type (like `circle`) that satisfies this interface (i.e., implements the `area` method) can be passed to this function.

6. **Main Function**:

    ```go
   c := circle{5}
   // working with non pointer
   info(c)
   // working with pointer 
   info(&c)
   ```

   In the `main` function, a `circle` `c` with radius `5` is instantiated. Then, the `info` function is called twice: once with the value of the circle (non-pointer) and once with the address of the circle (pointer). Both calls are valid because Go allows methods with non-pointer receivers to be called on both pointer and non-pointer values of the type.

In essence, this program highlights the flexibility of Go's interface system and the ability to use both pointer and non-pointer values with methods defined on non-pointer receivers.

### But how does &c work? I mean &c means address of c right?

Yes, you're right. `&c` gets the memory address of the variable `c`. This is a pointer to the value of `c`.

Now, here's the interesting aspect of method receivers in Go:

When you define a method on a non-pointer receiver, like in your example:

```go
func (c circle) area() float64 {
    return math.Pi * c.radius * c.radius
}
```

The Go runtime allows you to call this method on both a value of type `circle` and a pointer to a value of type `circle` (i.e., `*circle`).

When you call the method on a pointer, Go automatically dereferences the pointer for you. So when you do:

```go
info(&c)
```

The method `area` on the `circle` type is still being called. Go handles the dereferencing of the pointer `&c` to its underlying value and then calls the method on that value.

This behavior provides a lot of flexibility. It means you can define methods on value receivers and then call these methods regardless of whether you have a direct value or a pointer to that value.

However, it's essential to understand the implications:

1. **Efficiency**: If your struct is large, using a pointer receiver can be more efficient because it avoids copying the struct each time the method is called. In your example, `circle` is small, so the performance difference is negligible.
  
2. **Mutability**: Methods on non-pointer receivers receive a copy of the value they are called on. This means they can't modify the original value. In contrast, methods on pointer receivers can modify the original value.

In this particular case, the `area` method doesn't modify the `circle`, so there's no functional difference between calling it on a value or a pointer. But the flexibility of Go's method set allows for both calls to work seamlessly.

## Output

- Run the following command

```bash
$ go run main.go
area  78.53981633974483
area  78.53981633974483
```
