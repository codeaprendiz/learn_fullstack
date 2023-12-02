
# Practice 1

## Explaination

**Scenario**: Imagine a factory where workers assemble toys. Once a toy is assembled, it gets passed to the packaging department, which then packages the toy.

**Main Concepts**:

- **Goroutines**: Represent the workers.
- **Channels**: Represent the conveyor belt on which toys are placed once assembled.

**Breakdown**:

1. **Goroutines (`worker`)**: Each `worker` function represents an assembly worker. When the `worker` goroutine is initiated with the `go` keyword, it begins assembling the toy.
2. **Channel (`conveyorBelt`)**: Once a toy is assembled, the worker places it on the `conveyorBelt` (sends it to the channel).
3. **Main Goroutine (`packagingDept`)**: The `packagingDept` function represents the packaging department. It waits for toys to appear on the `conveyorBelt` (receives from the channel) and then packages them.

## Run

```bash
$ go run main.go
Assembling: lego
Assembling: car
Assembling: robot
Assembling: doll
Packaged: doll
Packaged: lego
Packaged: car
Packaged: robot
```
