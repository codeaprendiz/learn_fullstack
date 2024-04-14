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

func run() (err error) {
	// Handle SIGINT (CTRL+C) gracefully.
	ctx, stop := signal.NotifyContext(context.Background(), os.Interrupt)
	defer stop()

	// Start HTTP server.
	srv := &http.Server{
		Addr:         ":8080",
		BaseContext:  func(_ net.Listener) context.Context { return ctx },
		ReadTimeout:  1 * time.Second,
		WriteTimeout: 10 * time.Second,
		Handler: http.HandlerFunc(func(w http.ResponseWriter, r *http.Request) {
			fmt.Fprintln(w, "Hello, World!")
		}),
	}
	srvErr := make(chan error, 1)
	go func() {
		fmt.Println("Server is starting on port 8080...")
		srvErr <- srv.ListenAndServe()
	}()

	// Wait for interruption or server error.
	select {
	case err = <-srvErr:
		// Error when starting or running HTTP server.
		fmt.Println("Server error:", err)
		return
	case <-ctx.Done():
		// Received SIGINT (CTRL+C).
		fmt.Println("SIGINT received, shutting down server...")
		stop()
	}

	// Attempt to gracefully shut down the server.
	if err = srv.Shutdown(context.Background()); err != nil {
		fmt.Println("Error during server shutdown:", err)
		return
	}

	fmt.Println("Server shut down gracefully.")
	return nil
}

func main() {
	if err := run(); err != nil {
		fmt.Println("Error:", err)
	}
}
