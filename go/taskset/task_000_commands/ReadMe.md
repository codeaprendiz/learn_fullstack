
# Commands

- Check the version

```bash
$ go version  
go version go1.20.5 darwin/arm64
```

- `GOPATH`: This environment variable points to the Go workspace, which is the root directory where Go projects and their source code are stored. It typically contains three subdirectories: `src` (source code files), `pkg` (compiled package files), and `bin` (executable binaries). It is important to set this variable correctly for Go tools to function properly.

```bash
$ go env | grep GOPATH
GOPATH="/Users/<username>/go"
$ ls /Users/<username>/go                                                     
bin pkg
```

- `GOROOT`: This environment variable points to the binary installation directory of Go. It specifies the location where the Go standard library and compiler are installed. It is automatically set during the installation of Go and does not need to be manually configured.

```bash
$ go env | grep GOROOT
GOROOT="/opt/homebrew/Cellar/go/1.20.5/libexec"
```

- `go build`: This command is used to compile Go source code files present in the current directory or package. It compiles the code and generates an executable binary file that can be run directly.

```bash
$ go build
.
```

- `go run`: This command compiles and executes one or more Go files. It is useful for quickly testing and running Go programs without explicitly generating a binary file

```bash
$ go run
.
```

- `go fmt`: This command is used to format all the Go source code files in the current directory according to the Go formatting guidelines. It automatically adjusts the code's indentation, spacing, and other stylistic elements, making it more readable and consistent.

```bash
$ go fmt
.
```

- `go install`: This command compiles and installs a Go package. It compiles the package and its dependencies, generating the binary files and placing them in the appropriate directories within the Go workspace. The installed package can then be imported and used in other Go programs.

```bash
$ go install
.
```

- `go get`: This command is used to download the raw source code of someone else's Go package. It retrieves the package source code and stores it in the correct directory within the Go workspace. It also downloads and installs any dependencies required by the package.

```bash
$ go get
.
```

- `go test`: This command runs any test files associated with different Go projects. It automatically detects and executes test functions within the Go source code, providing feedback on the test results.

```bash
$ go test
.
```

- `go env`: This command is used to display the Go environment variables. Running go env without any arguments will list various environment variables specific to Go, such as GO111MODULE, GOARCH, and GOBIN.

```bash
$ go env        
GO111MODULE=""
GOARCH="amd64"
GOBIN=""
```

- `go mod init`: This command is used to create a new Go module. A module is a collection of related Go packages that are versioned together. Running go mod init initializes a new module in the current directory, creating a go.mod file that tracks the module's dependencies and version information.

```bash
$ go mod init
.
```

- `go list -m all`: This command lists all the Go modules that are dependencies of the current project. It displays the module names along with their corresponding versions.

```bash
$ go list -m all
example.com/hello
golang.org/x/text v0.0.0-20170915032832-14c0d48ead0c
rsc.io/quote v1.5.2
rsc.io/sampler v1.3.0
```

- `go list -m -versions <module>`: This command retrieves all the available versions of a specific Go module. By specifying the module name, it lists all the available versions that can be used for dependency management.

```bash
$ go list -m -versions rsc.io/sampler
rsc.io/sampler v1.0.0 v1.2.0 v1.2.1 v1.3.0 v1.3.1 v1.99.99
```

- `go get <module>@<version>`: This command is used to download a specific version of a Go module. By providing the module name along with the desired version, it retrieves and installs that particular version of the module.

```bash
$ go get rsc.io/sampler@v1.3.0  
.     
```

- `go clean -modcache`: This command removes all downloaded modules from the Go module cache. The module cache is a local storage location where Go stores downloaded module files. Running this command clears the cache, allowing for a clean re-download of modules if needed.

```bash
$ go clean -modcache
.
```

- `go env -w <variable>=<value>`: This command sets the value of a specific environment variable for future Go commands. By specifying the variable name and its desired value, it modifies the environment configuration accordingly

```bash
$ go env -w GOBIN=/somewhere/else/bin
.
```

- `go env -u <variable>`: This command unsets a previously set environment variable that was configured using go env -w. By specifying the variable name, it removes the variable from the environment configuration.

```bash
$ go env -u GOBIN
.
```
