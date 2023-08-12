package main

import "fmt"

type bot_v2 interface {
	getGreeting_v2() string
}

type englishBot_v2 struct{}
type spanishBot_v2 struct{}

func (eB englishBot_v2) getGreeting_v2() string {
	return "Hiii there!"
}

func (sB spanishBot_v2) getGreeting_v2() string {
	return "Hola!"
}

func printGreeting_v2(b bot_v2) {
	fmt.Println(b.getGreeting_v2())
}

func main() {
	eB := englishBot_v2{}
	sB := spanishBot_v2{}

	printGreeting_v2(eB)
	printGreeting_v2(sB)

}
