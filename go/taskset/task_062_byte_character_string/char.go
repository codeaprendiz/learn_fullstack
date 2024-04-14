package main

import "fmt"

func main() {
	var ch rune = 'あ'                    // A non-ASCII character (Japanese Hiragana)
	fmt.Println("Rune (Character):", ch) // Output: Unicode code point of 'あ'
	fmt.Println("String(ch) : ", string(ch))
}
