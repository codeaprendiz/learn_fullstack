package main

import (
	"github.com/sirupsen/logrus"
)

// CustomHook is our custom logrus hook
type CustomHook struct{}

// Levels returns the levels that this hook is interested in.
func (hook *CustomHook) Levels() []logrus.Level {
	// return logrus.AllLevels // Apply to all levels
	return []logrus.Level{
		logrus.InfoLevel, // Apply to Info level only
	}
}

// Fire is called by logrus when a log entry is fired.
func (hook *CustomHook) Fire(entry *logrus.Entry) error {
	// Add a custom field to every log
	entry.Data["customField"] = "customValue"
	return nil
}

func main() {
	// Initialize the logger
	logger := logrus.New()

	// Add the custom hook to the logger
	logger.AddHook(&CustomHook{})

	// Log some messages with different levels
	logger.Info("This is an info message")
	logger.Warn("This is a warning message")
	logger.Error("This is an error message")
}
