# [Tutorial: Developing a RESTful API with Go and Gin](https://go.dev/doc/tutorial/web-service-gin)

Using the command prompt, create a directory for your code called web-service-gin.

```bash
mkdir web-service-gin
cd web-service-gin
```

Create a module in which you can manage dependencies.

```bash
go mod init example/web-service-gin
```

After adding gin dependency in imports

```bash
go get .
```

To start the server

```bash
go run .
```

```bash
curl http://localhost:8080/albums
```

Output

```json
[
    {
        "id": "1",
        "title": "Blue Train",
        "artist": "John Coltrane",
        "price": 56.99
    },
    {
        "id": "2",
        "title": "Jeru",
        "artist": "Gerry Mulligan",
        "price": 17.99
    },
    {
        "id": "3",
        "title": "Sarah Vaughan and Clifford Brown",
        "artist": "Sarah Vaughan",
        "price": 39.99
    }
]
```

After adding POST method

```bash
go run .
```

```bash
curl http://localhost:8080/albums \
    --include \
    --header "Content-Type: application/json" \
    --request "POST" \
    --data '{"id": "4","title": "The Modern Sound of Betty Carter","artist": "Betty Carter","price": 49.99}'
```

```bash
curl http://localhost:8080/albums  
[
    {
        "id": "1",
        "title": "Blue Train",
        "artist": "John Coltrane",
        "price": 56.99
    },
    {
        "id": "2",
        "title": "Jeru",
        "artist": "Gerry Mulligan",
        "price": 17.99
    },
    {
        "id": "3",
        "title": "Sarah Vaughan and Clifford Brown",
        "artist": "Sarah Vaughan",
        "price": 39.99
    },
    {
        "id": "4",
        "title": "The Modern Sound of Betty Carter",
        "artist": "Betty Carter",
        "price": 49.99
    }
]
```

Write a handler to return a specific item

```bash
go run .
```

```bash
curl http://localhost:8080/albums/2
```

Output

```json
{
    "id": "2",
    "title": "Jeru",
    "artist": "Gerry Mulligan",
    "price": 17.99
}
```
