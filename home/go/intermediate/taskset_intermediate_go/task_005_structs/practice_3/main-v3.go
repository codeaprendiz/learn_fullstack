package main

import "fmt"

type contactInfo struct {
	email   string
	zipCode int
}

type Person struct {
	firstName string
	contact   contactInfo
}

func main() {
	contactInfoJim := contactInfo{
		email:   "test@gmail.com",
		zipCode: 12345,
	}

	fmt.Printf("fmt.Printf contactInfoJim : %v\n", contactInfoJim)

	personJim := Person{
		firstName: "Jim",
		contact:   contactInfoJim,
	}

	fmt.Printf("fmt.Printf personJim : %v\n", personJim)

	personJim.printPerson()

	fmt.Printf("Calling the update function and update zip to 4567")

	personJim.updatePersonContactInfo(4567)

	personJim.printPerson()
}

// Function to print the person details
func (p Person) printPerson() {
	fmt.Printf("printPerson using fmt.Printf : %v", p)
}

// Update value function

func (p *Person) updatePersonContactInfo(newZipCode int) {
	(*p).contact.zipCode = newZipCode
}
