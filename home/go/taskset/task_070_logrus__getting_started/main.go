package main

import (
	log "github.com/sirupsen/logrus"
	"time"
)

func main() {
	// Sleep for 2 seconds before logging
	time.Sleep(2 * time.Second)

	log.WithFields(log.Fields{
		"animal": "walrus",
	}).Info("A walrus appears")
}
