# Pointers In Structs

## Explaination

Sure! Let's break down the code:

### Struct Definition

```go
type person struct {
    first string
    last string
}
```

Here, you've defined a new type named `person`, which is a struct containing two string fields: `first` and `last`.

### Method on the Struct

```go
func (p *person) changeName() {
    (*p).first = "new name"
}
```

This defines a method `changeName` for a pointer receiver of type `person`. The method changes the `first` name of the person to "new name".

Here's a breakdown of the syntax:

1. `(p *person)` means the method has a pointer receiver. So, it operates on a memory address pointing to a value of type `person`.
  
2. Inside the method, `(*p).first` dereferences the pointer to access the underlying `person` value, and then accesses the `first` field. However, in Go, we usually don't need to explicitly dereference pointers when accessing fields or methods. So, `p.first = "new name"` would work just the same. Go automatically handles the dereferencing for you.

### Main Function

```go
p1 := person {
    first: "firstname",
    last: "lastname",
}
```

Here, you're creating a value of type `person` with the `first` name as "firstname" and the `last` name as "lastname".

```go
fmt.Println("Before changing name ", p1)
```

This prints the person's name before we change it.

```go
p1.changeName()
```

Here, even though `p1` is not a pointer, you're able to call the `changeName` method that's defined on a pointer receiver. Go allows this and will automatically take the address of `p1` to call the method. As the method operates on the original memory address of `p1`, any changes made within the method reflect on `p1`.

```go
fmt.Println("After changing name", p1)
```

This prints the person's name after the change. Since the `changeName` method modified the original value of `p1`, the output will show the `first` name as "new name".

### Summary

This code demonstrates how you can define methods on pointer receivers to modify the original data. The main function then shows how Go allows flexibility in calling such methods, either directly on values or on pointers, and how those changes persist outside the method when using pointer receivers.

## Output

- Run the following command

```bash
$ go run main.go
Before changing name  {firstname lastname}
After changing name {new name lastname}
```
