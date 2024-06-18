package main

import (
	"fmt"
	"os"
	"strings"
)

type deck []string // type deck []string: This line defines a new type deck, which is a slice of strings. It's like creating an alias for a slice of strings and allows you to use the deck type throughout your code instead of directly using []string.

func (d deck) print() { // This is a method declaration. It creates a method named print that operates on the deck type. It associates the print() method with any variable of type deck. The (d deck) before the function name indicates that it's a method of the deck type. The method takes no arguments and has a receiver d of type deck, which is similar to the this or self keyword in other programming languages.
	for i, card := range d { // This is a loop statement that iterates over each element in the deck slice. The range keyword is used to iterate over the deck slice d. It returns two values: the index i and the element at that index, which is assigned to the variable card.
		fmt.Println(i, card) //  This line prints the index i and the value of card (an element of the deck slice) using fmt.Println(). It will print each index and its corresponding card value on a new line.
	}
}

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

func newDeckFromFile(filename string) deck { // Function Signature func newDeckFromFile(filename string) deck: This defines a function named newDeckFromFile that takes a filename string as an argument and returns a value of type deck.
	byteslice, err := os.ReadFile(filename) // Reading the File bs, err := os.ReadFile(filename): This line reads the content of the file named filename into a byte slice bs. If an error occurs during reading, the error will be assigned to err.
	if err != nil {                         // Error Handling if err != nil: If an error occurred while reading the file (i.e., err is not nil), the following block will execute:
		fmt.Println("Error: ", err) // fmt.Println("Error: ", err): This line prints the error message to the standard output.
		os.Exit(1)                  // os.Exit(1): This line causes the program to exit immediately with a status code of 1, indicating an error. This is a fairly drastic measure and stops the program entirely. Depending on the context, you might prefer to return an error to the caller instead.
	}
	bytesliceToString := string(byteslice)     // string(byteslice): This converts the byte slice bs containing the file's content into a string.
	s := strings.Split(bytesliceToString, ",") // strings.Split(..., ","): This function splits the string at each comma , and returns a slice of strings s. The assumption here is that the deck's content in the file is represented as a comma-separated string.

	return deck(s) // Converts the slice of strings s into a deck type and returns it. || This last line is taking advantage of the fact that deck has been defined as an alias for a slice of strings (type deck []string). Since s is already a slice of strings, it can be directly converted into a deck by using deck(s).

}

func deal(d deck, handSize int) (deck, deck) { // Function Signature func deal(d deck, handSize int) (deck, deck): This defines the function named deal. It takes two parameters: || d: The original deck from which you want to deal cards. || handSize: The number of cards you want in the first returned deck. || The function returns two values, both of type deck. These will represent two different sets of cards.
	d1 := d[:handSize] // Slicing the Deck d1 := d[:handSize]: This line takes the first handSize elements from the deck d and assigns them to a new deck variable named d1. This uses Go's slicing syntax, and d1 will contain the first handSize cards from the original deck.
	d2 := d[handSize:] // Slicing the Remaining Cards d2 := d[handSize:]: This line takes all the elements from the deck d starting from the index handSize to the end of the slice and assigns them to a new deck variable named d2. This will include all the cards that were not included in d1.
	return d1, d2
}

func main() {
	mNewDeckFromFile := newDeckFromFile("savingToFile.txt")

	d1, d2 := deal(mNewDeckFromFile, 1)
	fmt.Println("The d1 deck :")
	d1.print()
	fmt.Println("The d2 deck : ")
	d2.print()
}
