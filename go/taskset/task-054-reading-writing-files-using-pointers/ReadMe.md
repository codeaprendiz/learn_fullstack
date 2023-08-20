# Reading Writing Files using pointers

[golang.org » doc » articles » wiki](https://golang.org/doc/articles/wiki/)

## Explaination

Let's break down this code:

### Import Statements

```go
import (
	"fmt"
	"os"
)
```

Two packages are imported:

1. `fmt`: Used for formatted I/O.
2. `os`: Provides a platform-independent interface to operating system functionality.

### Page Struct

```go
type Page struct {
	Title string
	Body  []byte
}
```

A new type named `Page` is defined. It represents a web page or a document with two fields:

- `Title`: A string that stores the title of the page.
- `Body`: A byte slice (`[]byte`) that stores the content/body of the page.

### Save Method

```go
func (p *Page) save() error {
	filename := p.Title + ".txt"
	return os.WriteFile(filename, p.Body, 0600)
}
```

This is a method attached to a pointer receiver of type `Page`. The method's purpose is to save the content of the `Page` to a file. The file's name is derived from the `Title` field of the `Page` followed by ".txt".

`os.WriteFile` is used to write the body (`p.Body`) to the file. The file permission `0600` means that the owner can read and write, while others have no permissions.

### LoadPage Function
```go
func loadPage(title string) (*Page, error) {
	filename := title + ".txt"
	body, err := os.ReadFile(filename)
	if err != nil {
		return nil, err
	}
	return &Page{Title: title, Body: body}, nil
}
```

This function attempts to load a page from a file. Given a title, it constructs a filename by appending ".txt" and tries to read the file using `os.ReadFile`. If successful, it returns a pointer to a `Page` with the provided title and read body. If there's an error, it returns `nil` and the error.

### Main Function

```go
func main() {
	p1 := &Page{Title: "TestPage", Body: []byte("This is a sample Page.")}
	p1.save()
	p2, _ := loadPage("TestPage")
	fmt.Println(string(p2.Body))
}
```

Here's the flow within the `main` function:

1. A pointer to a `Page` (`p1`) is created with the title "TestPage" and a sample body.
2. The `save` method is called on `p1`, writing its content to a file named "TestPage.txt".
3. The `loadPage` function is called to retrieve the content of the file named "TestPage.txt".
4. The body of the loaded page (`p2`) is printed to the console.

**Note**: Error handling is being ignored in this example for brevity (using `_` to discard the error from `loadPage`). In a real-world application, it's essential to handle errors appropriately.

### Explain the significance of * and & in all places in the code

In Go, the symbols `*` and `&` have specific meanings in the context of pointers and their usage:

### 1. `*` (Asterisk)

When you see the `*` symbol in Go, it can either denote a pointer type or dereference a pointer:

#### a. Pointer Type:

When used in type declaration, the `*` indicates a pointer type. A pointer holds the memory address of a value.

```go
type Page struct {
	Title string
	Body  []byte
}

func (p *Page) save() error { ... }
```

In the `save` method declaration, `*Page` means that the method has a receiver of type "pointer to `Page`". This means that the method operates on a pointer to a `Page` instance.

#### b. Dereferencing a Pointer

When used in front of a pointer variable, it returns the value the pointer points to.

```go
// If you had done something like this in some context:
*pointerToPage = somePageValue
```

### 2. `&` (Ampersand)

The `&` symbol is used to get the memory address of a value, effectively creating a pointer to that value:

```go
p1 := &Page{Title: "TestPage", Body: []byte("This is a sample Page.")}
```

Here, `&Page{...}` creates a new `Page` value and immediately gets its address, returning a pointer to the `Page`. `p1` is a pointer to a `Page`.

### Where These Symbols Are Used in Your Code:

1. `func (p *Page) save() error { ... }`: The `*` denotes that the method `save` is defined on a pointer receiver of type `Page`. It means `p` inside the method is a pointer, and you can access the fields of the `Page` struct through it, like `p.Title` and `p.Body`.

2. `p1 := &Page{...}`: The `&` is used to get the address of the `Page` value. It means `p1` is a pointer pointing to the memory location where the `Page` value is stored.

3. `func loadPage(title string) (*Page, error) { ... }`: The `*` before `Page` in the return type indicates that this function returns a pointer to a `Page` value.

4. `return &Page{Title: title, Body: body}, nil`: Here, `&` is used to return the address of the newly created `Page` value. It ensures that what's returned is a pointer to the `Page`, not the `Page` value itself.

### Why Use Pointers?

Pointers can be more efficient in cases where you want to modify the original data without making a copy. Also, when dealing with large data structures, passing pointers can be more memory-efficient than passing the structures by value. In Go, function arguments are passed by value, meaning that a copy is made. Using pointers can help avoid these data copies.

## Output

- Run the following

```bash
$ go build wiki.go

$ ./wiki       
This is a sample Page.

```
