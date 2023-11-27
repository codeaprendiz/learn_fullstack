package main

import "fmt"

type structA struct { // structA: This is the name of the new struct type.
	string_field_structA string // string_field_structA: This field of the struct is of type string. You can store any
	int_field_structA    int    // int_field_structA: This field of the struct is of type int. You can store any integer value in this field.
}

type structB struct { // structB: This is the name of the new struct type.
	string_field_structB string // string_field_structB: This field of the struct is of type string.
	int_field_structB    int    // int_field_structB: This field of the struct is of type int.
	structA                     // An embedded field of type structA. This is a feature of Go called struct embedding, and it means that the structB struct includes all the fields from the structA struct.
}

func (objectA *structA) updateStructA(newString string, newInt int) { //  This defines a method updateStructA on a pointer to structA. The method takes two parameters: newString of type string and newInt of type int. Inside the method:
	(*objectA).string_field_structA = newString // This line updates the string_field_structA field of the structA that objectA points to with the value of newString.
	(*objectA).int_field_structA = newInt       // This line updates the int_field_structA field of the structA that objectA points to with the value of newInt.
}

func (objectB structB) print() { // this defines a method print on the structB type. Inside the method:
	fmt.Printf("Value is %v\n", objectB) // This line prints the value of objectB, which is an instance of structB. The %v format specifier is used to print the value in a default format, and \n adds a newline character at the end.
}

func (objectA structA) print() {
	fmt.Printf("Value of objectA after update: %v\n", objectA)
}

func main() {
	fmt.Println("------------ main v1 -------------")
	main_v1()
	fmt.Println("\n------------- main v2 -----------")
	objectA := structA{
		string_field_structA: "a",
		int_field_structA:    22,
	}

	objectB := structB{
		string_field_structB: "b",
		int_field_structB:    11,
		structA: structA{
			string_field_structA: "a_inside_b",
			int_field_structA:    12,
		},
	}

	fmt.Println("Values before updation")
	fmt.Println(objectA)
	fmt.Println(objectB)
	fmt.Println("Values after updation")
	objectA.updateStructA("mnewstring", 100)
	objectA.print()
}
