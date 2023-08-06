package main //  defines the package in which the program resides.

import "fmt" //  imports the fmt package which provides functions for formatted input/output.

// An interface is declared with keyword type, name of the interface and the keyword interface.
// An interface is a collection of method signatures.
type bot interface {
	getGreeting() string // Any type that has the getGreeting method is also of type bot
}

// struct is a data type which contains named fields.
type englishBot struct{} // declare englishBot struct, it has no fields
type spanishBot struct{} // declare spanishBot struct, it has no fields

// This function takes a bot interface and calls its getGreeting method
func printGreeting(b bot) {
	fmt.Println(b.getGreeting()) // calls getGreeting method on bot interface
}

// Attaching a function to englishBot type.
// englishBot type now implicitly implements bot interface, because it has getGreeting method
func (englishBot) getGreeting() string {
	// VERY custom logic for generating an english greeting
	return "Hi there!" // returns a hardcoded english greeting
}

// Similarly, spanishBot type now implicitly implements bot interface, because it has getGreeting method
func (spanishBot) getGreeting() string {
	return "Hola!" // returns a hardcoded spanish greeting
}

// Another interface human with method speak
type human interface {
	speak()
}

// A struct person with fields first and last
type person struct {
	first string
	last  string
}

// A struct secretAgent with fields person (of type person) and ltk (of type bool)
type secretAgent struct {
	person
	ltk bool
}

// Method speak for secretAgent type
func (s secretAgent) speak() {
	fmt.Println("I am ", s.first, s.last, " and ldk is ", s.ltk, " ----------> func(s secretAgent) speak() called")
}

// Method speak for person type
func (p person) speak() {
	fmt.Println("I am ", p.first, p.last, " ----------> func(p person) speak() called")
}

// Function bar takes a human interface and just prints it
func bar(h human) {
	fmt.Println("I was passed into bar", h)
}

// Main function where the execution of program begins
func main() {
	eb := englishBot{} // creates an instance of englishBot
	sb := spanishBot{} // creates an instance of spanishBot

	printGreeting(eb) // calls printGreeting with englishBot, will print: "Hi there!"
	printGreeting(sb) // calls printGreeting with spanishBot, will print: "Hola!"

	sa1 := secretAgent{ // creates an instance of secretAgent
		person: person{
			"James",
			"Bond",
		},
		ltk: true,
	}

	p1 := person{ // creates an instance of person
		"Dr",
		"Who",
	}

	bar(sa1) // calls bar with secretAgent
	bar(p1)  // calls bar with person

	checkType(p1)  // calls checkType with person, will print: "I am person"
	checkType(sa1) // calls checkType with secretAgent, will print: "I am secret agent"
}

// Function checkType does a type switch on human interface to identify the underlying type
func checkType(h human) {
	switch h.(type) { // h.(type) is a special form only permissible in switch type constructs
	case person:
		fmt.Println("I am person")
	case secretAgent:
		fmt.Println("I am secret agent")
	default:
		fmt.Println("I am default")
	}
}
