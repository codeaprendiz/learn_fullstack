package main

import "fmt"

func printMap_v2(mMap map[string]int) {
	for key, value := range mMap {
		fmt.Println("Key : ", key, " Value: ", value)
	}
}

func main() {
	fmt.Println("------------- main_v1------------")
	main_v1()
	fmt.Println("-------------main_v2--------------")
	mapVar := map[string]string{ // A new map variable mapVar is created with string keys and string values, and it's initialized with two key-value pairs. || In Go, the map type is used to create associative arrays or hash tables, where you can store values associated with a particular key. The syntax for declaring the type of a map is: map[KeyType]ValueType|| KeyType: Represents the type of the key. This is what you use to index into the map. || ValueType: Represents the type of the value that will be stored against the key.
		"key1": "value1",
		"key2": "value2",
	}

	mapVar["key3"] = "value3" // A new key-value pair with key "key3" and value "value3" is added to the map.

	fmt.Println(mapVar) // The map is printed to the console

	delete(mapVar, "key2") // he delete function is used to remove the key-value pair with key "key2" from the map.

	fmt.Println(mapVar)

	mmapVar := map[string]int{ // Here, a map named mmapVar is declared and initialized. The keys of the map are of type string, and the values are of type int.
		"key1": 1,
		"key2": 2,
	}

	value, ok := mmapVar["fakekey"] // In Go, when you access a map value using a key, you can get two return values:

	fmt.Println(value) // 	The first return value (value in this case) is the value associated with the key from the map. If the key is not present in the map, you'll get the zero value for the map's value type. For an int, the zero value is 0.
	fmt.Println(ok)    // 	The second return value (ok in this case) is a boolean. It is true if the key was found in the map and false otherwise.

	val, exists := mmapVar["key1"]

	if exists {
		fmt.Println("mmapVar[\"key1\"] exists and is ", val)
	}

	mmapVar["key3"] = 3

	fmt.Println("After adding key3")
	for key, value := range mmapVar {
		fmt.Println(key, value)
	}

	delete(mmapVar, "key3")

	fmt.Println("Map after deleting key3")
	printMap_v2(mmapVar)
}
