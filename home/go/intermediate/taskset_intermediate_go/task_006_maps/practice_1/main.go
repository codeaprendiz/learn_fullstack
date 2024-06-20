package main

import "fmt"

func main() {
	colors := map[string]string{
		"red":   "#ff0000",
		"green": "#4bf745",
		"white": "#ffffff",
	}

	fmt.Println("colors : ", colors)

	// Adding element
	colors["yellow"] = "laksjdf"

	fmt.Println("Adding key: yellow and value: laksjdf")

	fmt.Println("colors : ", colors)

	fmt.Println("Deleting element with key: yellow")

	// Deleting element
	delete(colors, "yellow")

	fmt.Println("colors : ", colors)

	fmt.Printf("\n\n")

	printMap(colors)

	fmt.Printf("\n\n")

	m := map[string]int{
		"James":  1,
		"Falcon": 2,
	}

	fmt.Println("Checking if m[\"fakeKey\"] exists : ")
	value, if_exists := m["fakeKey"]
	fmt.Println("value ", value)
	fmt.Println("if_exists : ", if_exists)

	fmt.Printf("\n\n")
	fmt.Println("Checking if m[\"James\"] is presents : ")
	if _, ok := m["James"]; ok {
		fmt.Println("James key is present")
	}

	fmt.Printf("\n\n")
	fmt.Println("Adding another key Todd to the map with a value of 3")
	m["Todd"] = 3

	fmt.Printf("\n\n")
	fmt.Println("Iterating through the key and values")
	for key, value := range m {
		fmt.Printf("Key : %v, Value : %v\n", key, value)
	}

	fmt.Println("\nDeleting key Todd")
	delete(m, "Todd")

	fmt.Println("Map after deleting Todd", m)
}

func printMap(c map[string]string) {
	fmt.Println("PrintMap Function")
	for color, hex := range c {
		fmt.Println("Hex code for", color, "is", hex)
	}
}
