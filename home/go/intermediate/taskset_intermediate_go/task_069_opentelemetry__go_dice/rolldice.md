# rolldice.md

The provided code snippet demonstrates how to initialize global variables for tracing and metrics collection using the OpenTelemetry (OtE) Go SDK in an application that presumably simulates rolling dice. These variables are essential for instrumenting the application to collect telemetry data such as traces and metrics. Let's break down the components:

## Tracer and Meter Initialization

1. **Tracer**:
   - `tracer = otel.Tracer("rolldice")`
   - This line initializes a tracer object, which is used to create spans. Spans represent units of work in your application, such as an operation being performed or a request being handled. 
   - The `"rolldice"` argument is a name for the tracer, typically reflecting the name of the application or the service it represents. This name can be useful for filtering or categorizing traces in a backend system or observability platform.

2. **Meter**:
   - `meter = otel.Meter("rolldice")`
   - Similar to the tracer, this line initializes a meter object for metrics collection. Meters are used to create and manage metrics like counters, gauges, and histograms.
   - The `"rolldice"` argument serves a similar purpose as with the tracer, helping to identify or categorize the metrics collected from this particular application or service.

### Metric Initialization

1. **rollCnt**:
   - `rollCnt metric.Int64Counter`
   - This line declares a variable named `rollCnt` of the type `metric.Int64Counter`, which is a specific metric type used to count occurrences of events. In this context, it would be used to count how many times dice have been rolled.

### 1 Summary

The code snippet sets the groundwork for tracing and metrics collection in an application with a focus on rolling dice. The tracer is ready to be used for creating and managing spans, while the meter is prepared for creating metrics. The `rollCnt` variable is declared to count dice rolls, but it requires further initialization to be fully functional and tied to the `meter`. Once fully set up, these components will allow the application to generate detailed telemetry data—traces for monitoring and analyzing the flow of operations, and metrics for quantitative measurements of those operations, such as the number of dice rolls performed.

---

The provided code snippet defines an `init` function, which is a special function in Go. The `init` function is automatically called by the Go runtime before the main function starts and after all the variable initializations are done. It is commonly used for setup tasks such as initializing global variables, setting up dependencies, or other one-time configurations. Here, the `init` function is used to initialize the `rollCnt` metric variable. Let's break down the steps involved in this function:

### 2 Metric Initialization

- `rollCnt, err = meter.Int64Counter("dice.rolls", metric.WithDescription("The number of rolls by roll value"), metric.WithUnit("{roll}"))`
  - This line attempts to initialize the `rollCnt` variable, which was declared globally as a `metric.Int64Counter`. The `Int64Counter` is a metric type designed to count occurrences of events that result in incrementing a counter by a whole number (int64).
  - `"dice.rolls"` is the name given to this counter metric, which serves as a unique identifier for the metric in telemetry data.
  - `metric.WithDescription("The number of rolls by roll value")` provides a human-readable description for the metric, explaining what it measures. In this case, it indicates that the metric counts the number of dice rolls, potentially categorized by the roll value.
  - `metric.WithUnit("{roll}")` sets the unit for the metric. The use of `"{roll}"` as the unit is a bit unconventional, as units are typically standard measurement units (e.g., seconds, bytes, meters). Here, it seems intended to indicate that the metric counts individual roll events, but typically, a unit might be omitted or set to a standard unit like "1" for counts.

### 2 Error Handling

- `if err != nil { panic(err) }`
  - After attempting to create the `Int64Counter`, the function checks if an error occurred during the process. If an error is present (`err != nil`), the function panics with that error. Panicking for an error in an `init` function is a strong reaction, indicating that the application cannot proceed if this metric cannot be initialized. It's a way to ensure that the application does not run in an incomplete or incorrect state.

### 2Summary

The `init` function's role here is to securely set up the `rollCnt` metric with specific attributes (name, description, unit) using the global `meter` object initialized elsewhere. By defining this setup in an `init` function, the developer ensures that `rollCnt` is ready to use before the application starts executing its main logic, avoiding potential runtime errors related to uninitialized metrics. This pattern is particularly useful in applications where telemetry and metrics are critical parts of the operation, ensuring that all necessary monitoring infrastructure is in place and correctly configured from the start.

---

The `rolldice` function is a HTTP handler in Go that simulates rolling a dice and records the outcome using OpenTelemetry (OtE) for both tracing and metrics. Let's break down its functionality step by step:

### Starting a New Trace Span

- `ctx, span := tracer.Start(r.Context(), "roll")`
  - This line starts a new trace span named "roll" using the global `tracer` object. The span represents the operation of rolling a dice within the context of an incoming HTTP request (`r.Context()`). The returned `ctx` is a context that now includes the trace span information, ensuring that any further operations within this context are linked to this span.
  - `defer span.End()`
    - This ensures that the span is ended automatically when the `rolldice` function returns. Ending a span signals that the operation it represents is complete.

### Simulating a Dice Roll

- `roll := 1 + rand.Intn(6)`
  - This simulates rolling a six-sided dice by generating a random integer between 1 and 6.

### Recording the Roll as a Trace Attribute

- `rollValueAttr := attribute.Int("roll.value", roll)`
  - This creates an attribute representing the roll value, which can be attached to the trace span for detailed tracing information.
- `span.SetAttributes(rollValueAttr)`
  - This attaches the roll value attribute to the current span, providing insight into the outcome of the dice roll within the trace data.

### Incrementing the Roll Counter Metric

- `rollCnt.Add(ctx, 1, metric.WithAttributes(rollValueAttr))`
  - This increments the `rollCnt` metric by 1, indicating another dice roll has occurred. It associates the roll value with the metric event, using the same attribute that was added to the span. This enriches the metric data with specific details about the dice roll, making it possible to correlate trace and metric data.

### Sending the Roll Result to the Client

- `resp := strconv.Itoa(roll) + "\n"`
  - This converts the roll integer to a string and prepares it as the HTTP response.
- `if _, err := io.WriteString(w, resp); err != nil { log.Printf("Write failed: %v\n", err) }`
  - This attempts to write the response to the HTTP client. If an error occurs during this write operation, it logs the error. This error handling ensures that issues with sending the response are noted but do not disrupt the overall operation of the server.

### Summary

The `rolldice` function is a comprehensive example of how to instrument a Go HTTP handler with OpenTelemetry for both tracing and metrics. It demonstrates generating a trace span for a specific operation, annotating the span with attributes, recording metrics associated with the operation, and handling the HTTP request and response lifecycle. Through this approach, developers can gain insights into both the performance characteristics of their applications and the behaviors of their users, all while maintaining a high level of observability.

---