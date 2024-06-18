package main

import (
	"fmt"
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

func main() {
	cards := newDeck()
	fmt.Println(cards)
	mstring := cards.toString()
	fmt.Printf("mstring is of type %T and has value %v", mstring, mstring)
}
