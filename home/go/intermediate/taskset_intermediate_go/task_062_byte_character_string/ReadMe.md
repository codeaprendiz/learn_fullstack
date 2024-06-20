# Byte, Character, String

In Go, the concepts of byte, character, and string are distinct and have specific roles, especially when dealing with text data. Let's explore each with a brief explanation and example:

## 1. Byte

- A `byte` in Go is an alias for `uint8` and represents a single 8-bit data unit.
- Commonly used to handle raw data or ASCII characters (which fit in 8 bits).

### 1. Example

```go
package main

import "fmt"

func main() {
    var b byte = 'A' // ASCII character 'A'
    fmt.Println("Byte:", b) // Output: 65 (ASCII value of 'A')
    fmt.Println("String(b): ", string(b))
}
```

Output

```bash
$ go run byte.go
Byte: 65
String(b):  A
```

## 2. Character

- In Go, a character is typically represented as a `rune`.
- A `rune` is an alias for `int32` and represents a Unicode code point.

### 2. Example

```go
package main

import "fmt"

func main() {
    var ch rune = 'あ' // A non-ASCII character (Japanese Hiragana)
    fmt.Println("Rune (Character):", ch) // Output: Unicode code point of 'あ'
    fmt.Println("String(ch) : ", string(ch))
}
```

Output

```bash
$ go run char.go
Rune (Character): 12354
String(ch) :  あ
```

## 3. String

- A `string` in Go is a sequence of bytes, often representing text.
- Strings in Go are UTF-8 encoded by default, meaning they can contain multi-byte characters.

### Example

```go
package main

import "fmt"

func main() {
    s := "Hello, 世界" // String with ASCII and non-ASCII characters
    fmt.Println("String:", s)

    // Iterating over the string to print each character as a rune
    for _, r := range s {
        fmt.Printf("Character: %c (Rune: %v)\n", r, r)
    }
}
```

Output

```bash
$ go run string.go  
String: Hello, 世界
Character: H (Rune: 72)
Character: e (Rune: 101)
Character: l (Rune: 108)
Character: l (Rune: 108)
Character: o (Rune: 111)
Character: , (Rune: 44)
Character:   (Rune: 32)
Character: 世 (Rune: 19990)
Character: 界 (Rune: 30028)
```

In this string example, iterating over `s` with a `range` loop gives each character as a `rune`, correctly handling multi-byte characters like '世' and '界'.

These examples highlight how Go differentiates between raw bytes (`byte`), characters (represented as `rune`), and strings (sequences of bytes, often text). Understanding these differences is crucial for properly handling text data, especially in a world with diverse languages and character sets.