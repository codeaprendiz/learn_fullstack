package main

import (
	"fmt"
	"log"
	"net/http"
	"time"
)

// Simple middleware that logs the duration of each HTTP request
func simpleLogger(nextHandlerFunction http.HandlerFunc) http.HandlerFunc {
	log.Println("Control : simpleLogger")
	return func(w http.ResponseWriter, r *http.Request) {
		log.Println("Control : simpleLogger : inside return")
		start := time.Now() // Start time of the request

		nextHandlerFunction(w, r) // Process the request

		duration := time.Since(start)                             // Calculate the duration
		log.Printf("Request to %s took %v", r.URL.Path, duration) // Log the URL and duration
	}
}

// Simple handler that responds with "Hello, World!"
func helloWorldHandler(nextHandlerFunction http.ResponseWriter, r *http.Request) {
	log.Println("Control : helloWorldHandler")
	fmt.Fprintln(nextHandlerFunction, "Hello, World!")
}

func main() {
	http.HandleFunc("/", simpleLogger(helloWorldHandler)) // Use the logger middleware
	log.Fatal(http.ListenAndServe(":8080", nil))          // Start the server
}
