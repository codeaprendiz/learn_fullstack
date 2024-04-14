package main

import (
	"context"
	"fmt"
	"net"
	"net/http"
	"os"
	"os/signal"
	"time"
)

func main() {
	// Create a simple HTTP handler
	handler := http.NewServeMux()
	handler.HandleFunc("/", func(w http.ResponseWriter, r *http.Request) {
		fmt.Fprintln(w, "Hello, World!")
	})

	// Create a context that cancels on OS interrupt signals.
	ctx, stop := signal.NotifyContext(context.Background(), os.Interrupt)
	defer stop()

	// Initialize the HTTP server with enhanced configurations
	srv := &http.Server{
		Addr:         ":8080",
		BaseContext:  func(_ net.Listener) context.Context { return ctx },
		ReadTimeout:  1 * time.Second,
		WriteTimeout: 10 * time.Second,
		Handler:      handler,
	}

	// Start the HTTP server in a goroutine so it doesn't block
	go func() {
		fmt.Println("Starting server on port 8080")
		if err := srv.ListenAndServe(); err != http.ErrServerClosed {
			fmt.Printf("HTTP server ListenAndServe: %v\n", err)
		}
	}()

	// Block until an interrupt signal is received or context is canceled
	<-ctx.Done()
	fmt.Println("Shutting down server...")

	// Create a context to attempt a graceful shutdown within a timeout
	shutdownCtx, cancel := context.WithTimeout(context.Background(), 5*time.Second)
	defer cancel()

	// Attempt to gracefully shut down the server
	if err := srv.Shutdown(shutdownCtx); err != nil {
		fmt.Printf("Server Shutdown: %v\n", err)
	} else {
		fmt.Println("Server gracefully stopped")
	}
}
