# Slice

## Explaination

Let's break down the code step by step.

## Initialization and Printing of Slice

```go
x := []int{1,2,3,4,5}
fmt.Println(x)
```

Here, a slice named `x` is initialized with 5 integers and then printed out. The output will be `[1 2 3 4 5]`.

## Looping through a Slice using `range`

```go
for i, v := range x {
    fmt.Println(i,v)
}
```

Using the `range` keyword, you can loop through the slice. `i` gets the index and `v` gets the value at that index. The output will be:

```bash
0 1
1 2
2 3
3 4
4 5
```

## Slicing a Slice

```go
fmt.Println(x[1:])
```

This prints out all elements from the slice starting at index 1. The output is `[2 3 4 5]`.

## Appending to a Slice

```go
x = append(x, 6,7,8)
fmt.Println(x)
```

The `append` function is used to add elements to the end of the slice. The output now will be `[1 2 3 4 5 6 7 8]`.

## Deleting from a Slice

```go
x = append(x[:2], x[3:]...)
fmt.Println(x)
```

Go doesn't have a built-in delete function for slices. But you can achieve deletion using a combination of slicing and the `append` function. Here, the element at index `2` is removed. The output is `[1 2 4 5 6 7 8]`.

## Using `make` to Create a Slice

```go
sli := make([]int, 10, 100)
fmt.Println("Slice length " , len(sli))
fmt.Println("Slice capacity " , cap(sli))
fmt.Println("Slice ", sli)
```

`make` can be used to create slices, maps, and channels. Here, it creates a slice of `int` with a length of `10` and a capacity of `100`. All the elements of the slice will have zero values by default. The output will be:

```bash
Slice length  10
Slice capacity  100
Slice  [0 0 0 0 0 0 0 0 0 0]
```

## Multidimensional Slice

```go
firstStringArray := []string{"abc","xyz"}
secondStringArray := []string{"this","is","string"}
multi := [][]string{firstStringArray ,secondStringArray}
fmt.Println(multi)
```

It's possible to have slices of slices, creating a multi-dimensional data structure. Here, a slice named `multi` is created containing two other slices of strings. The output will be:

```go
[[abc xyz] [this is string]]
```

In summary, this code provides a concise introduction to Go slices, showcasing creation, itexyzion, slicing, appending, deleting, and using the `make` function. It also briefly touches upon multi-dimensional slices.

## Output

- Run the following command

```bash
$ go run main.go
[1 2 3 4 5]
0 1
1 2
2 3
3 4
4 5
[2 3 4 5]
Appending to a slice
[1 2 3 4 5 6 7 8]
Deleting from a slice
[1 2 4 5 6 7 8]
Using make to create a slice
Slice length  10
Slice capacity  100
Slice  [0 0 0 0 0 0 0 0 0 0]
[[abc xyz] [this is string]]
```
