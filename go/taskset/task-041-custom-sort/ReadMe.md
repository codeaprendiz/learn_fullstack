# Custom Sort

## Explaination

This code snippet demonstrates how to implement custom sorting for a slice of a user-defined type in Go. In this instance, the user-defined type is a `Person` struct, and the code provides a method to sort the slice by the `Age` field of the `Person` struct.

Here's the breakdown:

1. **Defining the Person Struct**:

    ```go
    type Person struct {
        Name string
        Age  int
    }
    ```

    This struct has two fields: `Name` and `Age`.

2. **Stringer Interface for Person**:

    ```go
    func (p Person) String() string {
        return fmt.Sprintf("%s: %d", p.Name, p.Age)
    }
    ```

    Here, a method `String()` is implemented for the `Person` type, making it satisfy the `Stringer` interface. This method will be called when you try to print a value of type `Person` using `fmt.Println`.

3. **Defining the ByAge type**:

    ```go
    type ByAge []Person
    ```

    `ByAge` is a type that's defined to be a slice of `Person`. We'll use this type to implement the `sort.Interface`, allowing us to sort a slice of `Person` by age.

4. **Implementing sort.Interface**:

    To make `ByAge` sortable, you must implement the `sort.Interface`. This interface requires three methods: `Len()`, `Swap()`, and `Less()`.

    - `Len()`: Returns the number of elements in the collection.
    - `Swap(i, j int)`: Swaps the elements with indexes `i` and `j`.
    - `Less(i, j int) bool`: Returns true if the element with index `i` should sort before the element with index `j`.

    Here's how they're implemented for `ByAge`:

    ```go
    func (a ByAge) Len() int           { return len(a) }
    func (a ByAge) Swap(i, j int)      { a[i], a[j] = a[j], a[i] }
    func (a ByAge) Less(i, j int) bool { return a[i].Age < a[j].Age }
    ```

    The `Less()` method is particularly important because it defines the actual sorting criterion. In this case, it checks if the `Age` of the `i`th person is less than the `Age` of the `j`th person.

5. **Using the Custom Sorting in main**:

    ```go
    people := []Person{
        {"Bob", 31},
        {"John", 42},
        {"Michael", 17},
        {"Jenny", 26},
    }

    fmt.Println(people)
    sort.Sort(ByAge(people))
    fmt.Println(people)
    ```

    In the `main` function, a slice of `Person` called `people` is created. The original slice is printed, then sorted using the `ByAge` sorting method, and the sorted slice is printed again.

The output will show the slice of people sorted by age in ascending order.

This is a classic example of how you can leverage the power of Go interfaces to implement custom behavior (like sorting) for user-defined types.

## Output

- Run the following

```bash
$ go run main.go
[Bob: 31 John: 42 Michael: 17 Jenny: 26]
[Michael: 17 Jenny: 26 Bob: 31 John: 42]
```
