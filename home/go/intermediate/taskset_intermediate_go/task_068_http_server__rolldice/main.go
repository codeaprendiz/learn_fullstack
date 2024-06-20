package main

import (
	"context"
	"fmt"
	"log"
	"math/rand"
	"net"
	"net/http"
	"os"
	"os/signal"
	"time"
)

func main() {
	if err := run(); err != nil {
		log.Fatalln(err)
	}
}

func run() error {
	// Handle SIGINT (CTRL+C) gracefully.
	ctx, stop := signal.NotifyContext(context.Background(), os.Interrupt)
	defer stop()

	// Start HTTP server.
	srv := &http.Server{
		Addr:         ":8080",
		BaseContext:  func(_ net.Listener) context.Context { return ctx },
		ReadTimeout:  time.Second,
		WriteTimeout: 10 * time.Second,
		Handler:      newHTTPHandler(),
	}

	// Listen for HTTP server errors in a goroutine.
	srvErr := make(chan error, 1)
	go func() {
		srvErr <- srv.ListenAndServe()
	}()

	// Wait for either an HTTP server error or a signal.
	select {
	case err := <-srvErr:
		return err
	case <-ctx.Done():
		stop()
	}

	// Attempt to gracefully shut down the server.
	if err := srv.Shutdown(context.Background()); err != nil {
		return err
	}

	return nil
}

func newHTTPHandler() http.Handler {
	mux := http.NewServeMux()
	mux.HandleFunc("/rolldice", rolldice)
	return mux
}

func rolldice(w http.ResponseWriter, r *http.Request) {
	roll := 1 + rand.Intn(6) // Roll a dice.
	fmt.Fprintf(w, "%d\n", roll)
}
