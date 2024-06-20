# Practice 1

## Running we get

Run the following command

```bash
$ ls
ReadMe.md  main.go

$ go run .        
go: cannot find main module, but found .git/config in /Users/username/workspace/ORG/learn-go
        to create a module there, run:
        cd ../.. && go mod init

$ go mod init structs     
go: creating new go.mod: module structs
go: to add module requirements and sums:
        go mod tidy

$ go mod tidy

$ go run .   
{Jim Party {jim@gmail.com 94000}}
Jim
{firstName:jimmy lastName:Party contactInfo:{email:jim@gmail.com zipCode:94000}}
```
