package main

import (
	"fmt"
	"os"
	"strings"
)

type deck []string // type deck []string: This line defines a new type deck, which is a slice of strings. It's like creating an alias for a slice of strings and allows you to use the deck type throughout your code instead of directly using []string.

func newDeck() deck { // The function declaration func newDeck() deck { ... } defines a function named newDeck that returns a value of type deck which is a slice of strings
	cards := deck{}                             // Create an empty slice of strings to store the deck of cards.
	cardSuits := []string{"Spades", "Diamonds"} // Define a slice representing card suit
	cardValues := []string{"Ace", "Two"}        // Define a slice representing card value

	for _, suit := range cardSuits { // Nested loops to create all possible combinations of cards. // The first loop iterates over each card suit.
		for _, value := range cardValues { //  The second loop iterates over each card value.
			cards = append(cards, value+"-of-"+suit) // Concatenate the card value, " of ", and the card suit to create a card string. Example: "Ace of Spades"
		}
	}
	return cards
}

func (d deck) toString() string { // This line declares a method named toString() that operates on the deck type. The (d deck) before the function name indicates that it's a method of the deck type, and the variable d will be the value of the deck type on which the method is called. The method returns a single string.
	sliceOfStrings := []string(d) // []string(d): This line converts the deck slice d into a slice of strings. Since d is already a slice of strings (a custom type deck), it's converted to a regular slice of strings ([]string) for the strings.Join() function to work. This conversion happens because strings.Join() expects a slice of strings as its first argument.
	fmt.Printf("sliceOfStrings is of type %T and has value %v\n", sliceOfStrings, sliceOfStrings)
	concatenatedString := strings.Join(sliceOfStrings, ",") // strings.Join(sliceOfStrings, ","): Now that we have a regular slice of strings (denoted by []string) in the variable sliceOfStrings, we can pass it as the first argument to strings.Join(). The second argument to strings.Join() is the separator ,, which specifies how the strings in the slice should be joined in the final result.
	return concatenatedString
}

func (d deck) saveToFile(filename string) error { // Receiver (d deck): This method is associated with a receiver of type deck. The receiver d represents an instance of the deck type and allows access to its value within the method || Method Name and Parameter saveToFile(filename string): The method name is saveToFile, and it takes a single parameter, filename, which is expected to be the name of the file where the deck should be saved. || Return Type error: The method returns an error, which could be nil if the operation succeeds, or an actual error object if something goes wrong.
	deckToString := d.toString()                   // d.toString(): toString method is associated with the type deck that converts the deck into a string representation.
	byteSlice := []byte(deckToString)              // []byte(d.toString()): The result of d.toString() is then converted to a byte slice ([]byte). In Go, you can convert a string to a slice of bytes using this syntax, allowing you to treat strings as raw bytes.
	return os.WriteFile(filename, byteSlice, 0666) // The os.WriteFile function is used to write the byte slice to the specified file. The file permission mode 0666 allows read and write access for the owner, group, and others. This line returns the error directly, either nil for success or an error object if something goes wrong. || In Go, files are written as sequences of bytes. When writing to or reading from a file, you're often dealing with raw byte data. The os.WriteFile function, which is used to write data to a file, expects data to be provided as a byte slice ([]byte).
}

func main() {
	cardsDeck := newDeck()
	fmt.Println("Writing to file")
	cardsDeck.saveToFile("savingToFile.txt")
	fmt.Println("Writing to file completed")
}
