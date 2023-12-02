package main

import "fmt"

type contactInfo struct { // type contactInfo struct {...}: This line defines a new struct type called contactInfo. A struct is a composite data type in Go that groups together variables (fields) under a name, making it a way to encapsulate related fields. In this case, the contactInfo struct has two fields:
	email   string // email: A string field to store the email address.
	zipCode int    // zipCode: An integer field to store the zip code.
}

type person struct { // type person struct {...}: This line defines another struct type called person. This struct consists of three fields:
	firstName   string // firstName: A string field for the first name.
	lastName    string // lastName: A string field for the last name.
	contactInfo        // contactInfo: An embedded field of type contactInfo. This is a feature of Go called struct embedding, and it means that the person struct includes all the fields from the contactInfo struct. || The embedding of the contactInfo struct inside the person struct means that the fields email and zipCode can be accessed directly on a person object, without having to go through a separate field name. It allows for a form of inheritance and can be used to model "is a" relationships in the code.
}

func main() {
	jim := person{
		firstName: "Jim",
		lastName:  "Party",
		contactInfo: contactInfo{
			email:   "jim@gmail.com",
			zipCode: 94000,
		},
	}

	fmt.Println(jim)
	fmt.Println(jim.firstName)
	jim.updateName("jimmy")
	jim.print()
}

func (pointerToPerson *person) updateName(newFirstName string) {
	(*pointerToPerson).firstName = newFirstName
}

func (p person) print() {
	fmt.Printf("%+v", p)
}
