package main

import (
	"fmt"
	"io"
	"net/http"
	"os"
)

type logWriter_v2 struct{}

func (logWriter_v2) Write(byteslice []byte) (int, error) { // (logWriter_v2) is the receiver of the Write function. This means the Write function is a method associated with any value (or instance) of the type logWriter_v2. In Go, methods are just like functions but with a special receiver argument that binds the method to a particular type. The receiver appears between the func keyword and the method name. Write is the name of the method. The method takes one parameter, byteslice, which is of type []byte. This type represents a slice of bytes. In Go, slices are a more flexible alternative to arrays, as they can change their size. (int, error): This indicates that the Write method returns two values. The first return value is of type int, and the second return value is of type error. In Go, functions and methods can return multiple values, which is especially common when one of the return values indicates a possible error condition.
	fmt.Println(string(byteslice))
	fmt.Println("Bytes length : ", len(byteslice))
	return len(byteslice), nil
}

func main() {
	fmt.Println("------------------main v1----------------------")
	main_v1()
	fmt.Println("------------------main v2------------------------")

	resp, err := http.Get("http://google.com")
	if err != nil {
		fmt.Println("Error : ", err)
		os.Exit(1)
	}

	logWriter := logWriter_v2{}

	io.Copy(logWriter, resp.Body)
}
