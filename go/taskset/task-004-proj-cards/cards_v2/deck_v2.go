package main

import (
	"fmt"
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

func main() {
	cards := newDeck()
	fmt.Println(cards)
}
