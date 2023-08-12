# Creating cards Game

## cards : Running the programmes

```bash
$ go run main.go deck.go
0 Three of Hearts
1 Three of Diamonds
2 Two of Clubs
3 Ace of Hearts
4 Three of Spades
5 Four of Clubs
6 Two of Spades
7 Four of Diamonds
8 Two of Hearts
9 Ace of Spades
10 Four of Hearts
11 Three of Clubs
12 Ace of Clubs
13 Ace of Diamonds
14 Two of Diamonds
15 Four of Spades

## Running the tests
$ go mod init deck_test.go
go: creating new go.mod: module deck_test.go
go: to add module requirements and sums:
        go mod tidy

$ go test               
PASS
ok      deck_test.go    0.398s
```

## cards_v2 : Running the programmes

```bash
$ go run deck_v1.go
[Ace of Spades Two of Hearts Three of Diamonds]

$ go run deck_v2.go                          
[Ace-of-Spades Two-of-Spades Ace-of-Diamonds Two-of-Diamonds]

$ go run deck_v3.go
[Ace-of-Spades Two-of-Spades Ace-of-Diamonds Two-of-Diamonds]
sliceOfStrings is of type []string and has value [Ace-of-Spades Two-of-Spades Ace-of-Diamonds Two-of-Diamonds]
mstring is of type string and has value Ace-of-Spades,Two-of-Spades,Ace-of-Diamonds,Two-of-Diamonds

$ go run deck_v4.go
Writing to file
sliceOfStrings is of type []string and has value [Ace-of-Spades Two-of-Spades Ace-of-Diamonds Two-of-Diamonds]
Writing to file completed

$ go run deck_v5.go                          
Writing to file
sliceOfStrings is of type []string and has value [Ace-of-Spades Two-of-Spades Ace-of-Diamonds Two-of-Diamonds]
Writing to file completed
sliceOfStrings is of type []string and has value [Ace-of-Spades Two-of-Spades Ace-of-Diamonds Two-of-Diamonds]
Printing the new deck :  Ace-of-Spades,Two-of-Spades,Ace-of-Diamonds,Two-of-Diamonds

$ go run deck_v6.go                          
0 Ace-of-Spades
1 Two-of-Spades
2 Ace-of-Diamonds
3 Two-of-Diamonds

$ go run deck_v7.go
The d1 deck :
0 Ace-of-Spades
The d2 deck : 
0 Two-of-Spades
1 Ace-of-Diamonds
2 Two-of-Diamonds


$ go run deck_v8.go
0 Ace-of-Spades
1 Two-of-Diamonds
2 Two-of-Spades
3 Ace-of-Diamonds
```