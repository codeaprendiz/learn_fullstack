package main

import (
	"fmt"
	"log"
	"net/http"
)

func handler(w http.ResponseWriter, r *http.Request) {
	log.Printf("Control : handler")
	fmt.Fprintf(w, "Control : handler ::  URL.Path[1:] :  %s", r.URL.Path[1:])
}

// httpLog wraps an http.HandlerFunc for logging
func httpLog(nextHandlerFunc http.HandlerFunc) http.HandlerFunc {
	log.Printf("Control : httpLog")
	return func(w http.ResponseWriter, r *http.Request) {
		log.Printf("Control : httpLog : inside return : r.URL.Path : %s", r.URL.Path)
		nextHandlerFunc(w, r)
	}
}

// withAppHeaders adds a custom header to the response
func withAppHeaders(nextHandlerFunc http.HandlerFunc) http.HandlerFunc {
	log.Printf("Control : withAppHeaders")
	return func(w http.ResponseWriter, r *http.Request) {
		log.Printf("Control : withAppHeaders : inside return")
		w.Header().Set("X-Custom-Header", "my-value")
		nextHandlerFunc(w, r)
	}
}

func main() {
	// Wrap the handler with logging and custom header middleware
	http.HandleFunc("/", httpLog(withAppHeaders(handler)))

	log.Fatal(http.ListenAndServe(":8080", nil))
}
