package main

import (
	"fmt"
	"log"
	"net/http"
	"time"
)

const (
	httpHeaderAppName    string = "X-App-Name"
	httpHeaderAppVersion string = "X-App-Version"
)

// metaResponseWriter captures the status code and response length
type customResponseWriter struct {
	writer http.ResponseWriter
	status int
	length int
}

func (w *customResponseWriter) Header() http.Header {
	log.Println("Control : Header()")
	return w.writer.Header()
}

func (responseWriter *customResponseWriter) WriteHeader(statusCode int) {
	log.Println("Control : WriteHeader(statusCode int) : statusCode", statusCode)
	responseWriter.status = statusCode
	responseWriter.writer.WriteHeader(statusCode)
}

func (responseWriter *customResponseWriter) Write(b []byte) (int, error) {
	log.Println("Control : Write(b []byte)")
	if responseWriter.status == 0 {
		log.Println("responseWriter.status was 0")
		responseWriter.status = http.StatusOK
	}
	responseWriter.length = len(b)
	log.Println("responseWriter.length : ", len(b))
	return responseWriter.writer.Write(b)
}

// withAppHeaders adds custom headers to the response
func withAppHeaders(nextHandlerFunction http.HandlerFunc) http.HandlerFunc {
	log.Println("Control : withAppHeaders")
	return func(responseWriter http.ResponseWriter, request *http.Request) {
		log.Println("Control : withAppHeaders : inside return")
		responseWriter.Header().Set(httpHeaderAppName, "http-dump")
		responseWriter.Header().Set(httpHeaderAppVersion, "1.0")
		nextHandlerFunction(responseWriter, request)
	}
}

// simpleLogger logs the duration and other details of each HTTP request
func simpleLogger(nextHandlerFunction http.HandlerFunc) http.HandlerFunc {
	log.Println("Control : simpleLogger ")
	return func(responseWriter http.ResponseWriter, r *http.Request) {
		log.Println("Control : simpleLogger : inside return")
		crw := customResponseWriter{writer: responseWriter}

		start := time.Now()
		nextHandlerFunction(&crw, r)
		duration := time.Since(start)

		log.Printf("Request to %s, Method: %s, Status: %d, Duration: %v", r.URL.Path, r.Method, crw.status, duration)
	}
}

func helloWorldHandler(responseWriter http.ResponseWriter, request *http.Request) {
	log.Println("Control : helloWorldHandler()")
	fmt.Fprintln(responseWriter, "Hello, World!")
}

func main() {
	http.HandleFunc("/", simpleLogger(withAppHeaders(helloWorldHandler)))
	log.Fatal(http.ListenAndServe(":8080", nil))
}
