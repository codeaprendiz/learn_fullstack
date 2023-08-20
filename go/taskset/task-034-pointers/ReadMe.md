# Pointers

This code demonstrates the concept of pointers in Go and how they can be used to modify the value of a variable indirectly via its memory address. Let's break it down step by step.

1. **Pointers Introduction**:
   A pointer is a variable that stores the memory address of another variable. In Go, the `&` operator is used to get the memory address of a variable, and the `*` operator is used to access the value stored at a particular address.

2. **Main Function**:

   ```go
   x := 45
   fmt.Println("The value of x is ", x)
   fmt.Println("The address of x is ", &x)
   changeValue(&x)
   fmt.Println("The new value of x is ", x)
   ```

   - `x := 45`: Initializes an integer `x` with a value of 45.
   - `&x`: Returns the memory address where `x` is stored.
   - `changeValue(&x)`: Passes the address of `x` to the `changeValue` function. This allows the function to modify the value of `x` indirectly.

3. **changeValue Function**:

   ```go
   func changeValue(y *int) {
       fmt.Println("The address of y is " , y)
       fmt.Println("The value stored at that address is " , *y)
       *y = 49
       fmt.Println("The new value at y is " , *y)
   }
   ```

   - The function takes a pointer to an integer (`*int`) as its parameter. This means `y` is a pointer that can store the address of an integer.
   - `y`: Holds the address of the passed variable (in this case, the address of `x`).
   - `*y`: Dereferences the pointer, i.e., it accesses the value stored at the address that `y` is pointing to.
   - `*y = 49`: Changes the value stored at the address `y` is pointing to. Since `y` is pointing to `x`, this modifies the value of `x`.

4. **Output**:

   When the program is executed, you will see:
   - The initial value of `x`.
   - The memory address of `x`.
   - The memory address stored in `y` (which is the same as the address of `x`).
   - The value stored at that address (which is the initial value of `x`).
   - The new value at the address after the change.
   - The new value of `x` after the function call.

In essence, this program demonstrates how you can use pointers to pass the address of a variable to a function and change the variable's value through its memory address, allowing for indirect modification of variables in Go.

## Output

```bash
$ go run main.go                              
The value of x is  45
The address of x is  0x140000140d0
The address of y is  0x140000140d0
The value stored at that address is  45
The new value at y is  49
The new value of x is  49
```
