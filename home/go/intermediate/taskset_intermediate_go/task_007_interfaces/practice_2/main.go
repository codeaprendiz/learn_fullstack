package main

import (
	"fmt"
)

type bot interface {
	getGreeting() string
}

type EnglishBot struct{}
type SpanishBot struct{}

func (englishBot EnglishBot) getGreeting() string {
	return "Hello!"
}

func (spanishBot SpanishBot) getGreeting() string {
	return "Hola!"
}

func printGreeting(b1 bot) {
	fmt.Println("Greetings : ", b1.getGreeting())
}

func main() {
	englishBot := EnglishBot{}
	spanishBot := SpanishBot{}
	printGreeting(englishBot)
	printGreeting(spanishBot)
}
