package main

import (
	"fmt"
)

type deck []string // type deck []string: This line defines a new type deck, which is a slice of strings. It's like creating an alias for a slice of strings and allows you to use the deck type throughout your code instead of directly using []string.

func main() {
	myDeck := deck{"Ace of Spades", "Two of Hearts", "Three of Diamonds"}
	fmt.Println(myDeck)
}
