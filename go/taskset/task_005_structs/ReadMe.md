
# Structs

## Running we get

Run the following command

```bash
$ go run main-v2.go
# command-line-arguments
./main-v2.go:30:2: undefined: main_v1

$ go run .         
go: cannot find main module, but found .git/config in /Users/rinkydahiya/workspace/Frontend-Backend-DevOps/learn-go
        to create a module there, run:
        cd ../.. && go mod init

$ go mod init structs     
go: creating new go.mod: module structs
go: to add module requirements and sums:
        go mod tidy

$ go mod tidy

$ go run . 
------------ main v1 -------------
{Jim Party {jim@gmail.com 94000}}
Jim
{firstName:jimmy lastName:Party contactInfo:{email:jim@gmail.com zipCode:94000}}
------------- main v2 -----------
Values before updation
{a 22}
{b 11 {a_inside_b 12}}
Values after updation
Value of objectA after update: {mnewstring 100}
```
