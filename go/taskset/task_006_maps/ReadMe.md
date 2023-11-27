# Maps

- Run the following command

```bash
$ go mod init maps                             
go: creating new go.mod: module maps
go: to add module requirements and sums:
        go mod tidy

$ go mod tidy

$ go run .
------------- main_v1------------
Hex code for red is #ff0000
Hex code for green is #4bf745
Hex code for white is #ffffff
0
false
James key is present
James 1
Falcon 2
Todd 3
Map after deleting Todd map[Falcon:2 James:1]
-------------main_v2--------------
map[key1:value1 key2:value2 key3:value3]
map[key1:value1 key3:value3]
0
false
mmapVar["key1"] exists and is  1
After adding key3
key1 1
key2 2
key3 3
Map after deleting key3
Key :  key1  Value:  1
Key :  key2  Value:  2
```
