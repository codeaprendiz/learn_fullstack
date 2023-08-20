# Methods

## Explaination

This program introduces the concept of Structs and Methods in Go.

### Structs

#### 1. `person`

```go
type person struct {
    first string
    last  string
}
```

This is a simple struct called `person` that has two fields, `first` and `last`, both of type `string`.

#### 2. `secretAgent`

```go
type secretAgent struct {
    person
    ltk bool
}
```

This struct `secretAgent` embeds the `person` struct. This means every `secretAgent` is also a `person` with fields `first` and `last`. Additionally, the `secretAgent` has a field `ltk` of type `bool`.

### Method

```go
func (s secretAgent) speak() {
    fmt.Println("I am ", s.first, s.last, " and ltk is ", s.ltk)
}
```

Here, a method `speak` is associated with the `secretAgent` type. The syntax `(s secretAgent)` before the method name is a receiver, which means this method is tied to any value of type `secretAgent`. The method can be called using a `secretAgent` type value.

Inside the method, we're accessing the fields of the `secretAgent` and printing them. Note that `first` and `last` are fields of the embedded `person` type, but they can be accessed directly as if they were fields of `secretAgent`.

### Main Function

In the `main` function:

```go
sa1 := secretAgent{
    person: person{
        "James",
        "Bond",
    },
    ltk: true,
}
```

A variable `sa1` of type `secretAgent` is created. The `person` part of `secretAgent` is initialized with the values `"James"` and `"Bond"`. The `ltk` field is set to `true`.

```go
fmt.Println(sa1)
```

This line prints the entire struct.

```go
sa1.speak()
```

This line calls the `speak` method on the `sa1` variable, producing the output:

```bash
I am James Bond and ltk is true
```

### Summary

The program demonstrates the definition and use of structs in Go, embedding one struct inside another, and creating methods for structs.

## Output

- Run the following

```bash
$ go run main.go
{{James Bond} true}
I am  James Bond  and ldk is  true
```
