# JSON Unmarshall

## Explaination

This program demonstrates the decoding of a JSON string into Go data structures. Let's break it down:

1. **Imports**:
   - The `fmt` package is imported for formatted I/O operations.
   - The `encoding/json` package is imported for JSON encoding and decoding functionalities.

2. **Struct Definition with Field Tags**:

   ```go
   type person struct {
       First string `json:"First"`
       Last  string `json:"Last"`
       Age   int    `json:"Age"`
   }
   ```

   - A `person` type is defined as a struct with three fields: `First`, `Last`, and `Age`.
   - Each field has a field tag that specifies how the field should be encoded to, or decoded from, JSON. This is primarily used for naming consistency between Go structs and JSON keys. In this case, it's somewhat redundant because the field names in the Go struct match the JSON keys, but it serves as an explicit declaration.

3. **Main Function**:

   ```go
   s := `[{"First":"James","Last":"Bond","Age":23},{"First":"Shinshan","Last":"Kazama","Age":5}]`
   ```

   - A string `s` is declared and initialized with a JSON string representing a slice of two people.

   ```go
   bs := []byte(s)
   ```

   - The string `s` is converted to a byte slice `bs`. This conversion is necessary because `json.Unmarshal`, which is used for decoding JSON data, expects data in byte slice form.

   ```go
   fmt.Println(s)
   fmt.Printf("%T\n", s)
   fmt.Println(bs)
   fmt.Printf("%T\n", bs)
   ```

   - The program prints the original JSON string, its type, the byte slice representation of that string, and its type.

   ```go
   var people []person
   err := json.Unmarshal(bs, &people)
   ```

   - The `json.Unmarshal` function is called to decode the byte slice `bs` into a slice of `person` structs. This function requires a pointer to the destination where the decoded data should be stored, which is why `&people` (a pointer to the `people` slice) is passed.

   ```go
   if err != nil {
       fmt.Println(err)
   }
   ```

   - If an error occurs during the JSON unmarshalling process, it's printed.

   ```go
   fmt.Println("All of the data", people)
   ```
  
   - Finally, the decoded slice of people is printed out, showing that the JSON string has been successfully converted into Go data structures.

**Key Takeaway**:
The program shows how you can take a JSON string, convert it to a byte slice, and then decode that byte slice into Go data structures using the `json.Unmarshal` function. It also highlights the use of field tags in Go struct definitions to ensure that the struct fields align correctly with the JSON keys.

### is byte slice a []uint8 ?

Yes, that's correct! In Go, a byte slice, represented as `[]byte`, is an alias for a slice of `uint8` values. The built-in `byte` type in Go is also an alias for `uint8`.

So, when you see `[]byte` in Go, you can think of it as `[]uint8`. They're used interchangeably, but `[]byte` is more idiomatic when working with raw byte data, strings, or when encoding/decoding data, as seen in operations like JSON marshalling/unmarshalling.

## Output

- Run the following

```bash
$ go run main.go
[{"First":"James","Last":"Bond","Age":23},{"First":"Shinshan","Last":"Kazama","Age":5}]
string
[91 123 34 70 105 114 115 116 34 58 34 74 97 109 101 115 34 44 34 76 97 115 116 34 58 34 66 111 110 100 34 44 34 65 103 101 34 58 50 51 125 44 123 34 70 105 114 115 116 34 58 34 83 104 105 110 115 104 97 110 34 44 34 76 97 115 116 34 58 34 75 97 122 97 109 97 34 44 34 65 103 101 34 58 53 125 93]
[]uint8
All of the data [{James Bond 23} {Shinshan Kazama 5}]
```
