# Sort

## Explaination

This code demonstrates how to use Go's `sort` package to sort slices of integers and strings.

Let's break it down step-by-step:

1. **Imports**:

    ```go
    import (
        "fmt"
        "sort"
    )
    ```

    Here, you're importing two packages: 
    - `fmt`: For formatted input/output functions.
    - `sort`: Provides functions for sorting slices and user-defined collections.

2. **Defining the Data**:

    ```go
    x := []int{9,8,7,6,5,4,3,2,1}
    y := []string{"Abc","asdf","what is this", "programming"}
    ```

    You're defining two slices:
    - `x`: A slice of integers in descending order.
    - `y`: A slice of strings in no particular order.

3. **Printing Initial Slices**:

    ```go
    fmt.Println(x)
    fmt.Println(y)
    ```

    You're printing the original, unsorted slices. The output will be:

    ```bash
    [9 8 7 6 5 4 3 2 1]
    [Abc asdf what is this programming]
    ```

4. **Sorting the Slices**:

    ```go
    fmt.Println("After sorting")
    sort.Ints(x)
    sort.Strings(y)
    ```

    - `sort.Ints(x)`: This function sorts a slice of integers (`x` in this case) in ascending order.
    - `sort.Strings(y)`: This function sorts a slice of strings (`y` in this case) in lexicographical (dictionary) order.

    Now, both slices `x` and `y` have been sorted in-place, meaning the original slices have been modified to become sorted.

5. **Printing Sorted Slices**:

    ```go
    fmt.Println(x)
    fmt.Println(y)
    ```

    You're printing the sorted slices. The output will be:

    ```bash
    [1 2 3 4 5 6 7 8 9]
    [Abc asdf programming what is this]
    ```

    - `x` is now in ascending order.
    - `y` is sorted in lexicographical order (from "Abc" to "what is this").

Overall, the program showcases the simplicity and efficiency with which Go allows users to sort slices using built-in functions.

## Output

```bash
$ go run main.go                              
[9 8 7 6 5 4 3 2 1]
[Abc asdf what is this programming]
After sorting
[1 2 3 4 5 6 7 8 9]
[Abc asdf programming what is this]
```
