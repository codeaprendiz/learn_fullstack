# Arrays

## Explaination

The provided Go code demonstrates the usage of arrays. Here's an explanation of the code:

```go
package main

import "fmt"

func main() {
    var arr [5]int     // Declare an array named 'arr' with a length of 5
    arr[2] = 24        // Assign the value 24 to the element at index 2
    fmt.Println(arr[2]) // Print the value of the element at index 2
    fmt.Println("Length of array is", len(arr)) // Print the length of the array
}
```

Here's a breakdown of the key points:

1. `var arr [5]int`: This line declares an array named `arr` with a length of 5. An array is a fixed-size collection of elements of the same data type (`int` in this case). The array indices range from 0 to 4 (since the length is 5).

2. `arr[2] = 24`: This line assigns the value 24 to the element at index 2 in the array. Indexing starts from 0, so `arr[2]` refers to the third element in the array.

3. `fmt.Println(arr[2])`: Prints the value of the element at index 2 in the array. In this case, it will print the value 24.

4. `fmt.Println("Length of array is", len(arr))`: Prints the length of the array using the built-in `len()` function. The length of the array is 5, so this line will print "Length of array is 5."

In summary, the code demonstrates how to declare, access, and modify elements of an array in Go, as well as how to retrieve the length of the array using the `len()` function.

## Output

- Run the following

```bash
$ go run main.go
24
Length of array is  5
```
