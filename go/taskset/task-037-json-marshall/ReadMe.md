# JSON Marshall

## Explaination

This program demonstrates the encoding of Go data structures into JSON format. Let's go step-by-step:

1. **Imports**:
   - The program imports the `fmt` package for formatted I/O operations.
   - The `encoding/json` package is imported to use the JSON encoding and decoding functionalities.

2. **Struct Definition**:

   ```go
   type person struct {
       First string
       Last  string
       Age   int
   }
   ```

   - A new `person` type is defined as a struct with three fields: `First`, `Last`, and `Age`.

3. **Main Function**:

   ```go
   p1 := person {
       First: "James",
       Last: "Bond",
       Age: 23,
   }
   
   p2 := person {
       First: "Shinshan",
       Last: "Kazama",
       Age: 5,
   }
   ```

   - Two instances of the `person` struct, `p1` and `p2`, are created with different values.

   ```go
   sliceOfPeople := []person {
       p1,
       p2,
   }
   ```

   - A slice of `person` named `sliceOfPeople` is created, containing both `p1` and `p2`.

   ```go
   fmt.Println(sliceOfPeople)
   ```

   - The slice `sliceOfPeople` is printed, which will show the two person structs in a slice format.

   ```go
   bs, err := json.Marshal(sliceOfPeople)
   ```

   - The `json.Marshal` function is called with the `sliceOfPeople` slice. This function attempts to convert the slice into its JSON representation. If successful, the resulting JSON byte slice is stored in `bs`, and `err` will be `nil`. If there's an error during the process, the `err` variable will capture that error.

   ```go
   if err != nil {
       fmt.Println(err)
   }
   ```

   - If an error occurs during the JSON marshalling process, it will be printed.

   ```go
   fmt.Println(string(bs))
   ```

   - The resulting JSON byte slice `bs` is converted to a string and printed. This will show the JSON representation of the `sliceOfPeople` slice.

**Key Takeaway**:
The program demonstrates how to convert a slice of structs into its corresponding JSON representation in Go. It's important to note that the field names of the struct (`First`, `Last`, and `Age`) are capitalized, ensuring they're exported and can be accessed by the `json.Marshal` function. If they were not capitalized, they would not be included in the JSON output.

## Output

- Run the following command

```bash
$ go run main.go
[{James Bond 23} {Shinshan Kazama 5}]
[{"First":"James","Last":"Bond","Age":23},{"First":"Shinshan","Last":"Kazama","Age":5}]
```
