# Create Post Message Service

## Screenshots and Explaination

- Adding post request method
  
```javascript
app.post('/messages', (req, res) => {
    console.log("This is post request");
    console.log("Req body: ", req.body);
    res.sendStatus(200);
})
```

- Running the server and hitting post

```bash
# Terminal 1
$ curl -X POST -H "Content-Type: application/json" -d '{"key1":"value1", "key2":"value2"}' http://localhost:3000/messages
OK

# Terminal 2: Where server is running
server is listening on port 3000
This is post request
Req body:  undefined
```

- So we need to add body parser

```bash
$ npm install -s body-parser
.
```

- Now giving the same request again 

```bash
# Terminal 1
$ curl -X POST -H "Content-Type: application/json" -d '{"key1":"value1", "key2":"value2"}' http://localhost:3000/messages
OK

# Terminal 2: Where server is running
server is listening on port 3000
This is post request
Req body:  { key1: 'value1', key2: 'value2' }
```

- Now checking the things in browser

```bash
# Terminal 1
curl -X POST -H "Content-Type: application/json" -d '{"name":"value1", "message":"value2"}' http://localhost:3000/messages
OK
```

- After you click on `send`

![img](.images/image-2023-05-17-21-18-02.png)

- Start capturing the user input in console.log

![img](.images/image-2023-05-18-21-26-25.png)

- Tring to call `/messages` post endpoint on the server, we are unable to parse the request data.

```bash
# Server
server is listening on port 3000
This is post request
Req body:  {}
```

![img](.images/image-2023-05-18-21-37-14.png)

- After using bodyParser.urlencoded()

```bash
# Server
server is listening on port 3000
This is post request
Req body:  [Object: null prototype] {
  name: 'Argon',
  message: 'Hi, this is argon\n'
}
```

![img](.images/image-2023-05-18-22-05-09.png)

- Fixing the redundant printing of message by clearing `#message` before each call

![img](.images/image-2023-05-18-22-22-39.png)
