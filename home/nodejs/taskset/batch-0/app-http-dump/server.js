var express = require('express')
var app = express()

app.use(express.static(__dirname))

app.get('/getrequest', (req, res) => {
    const requestData = {
        customMessage: "The following are the contents of the request and response",
        request: {
            params: req.params,
            body: req.body,
            headers: req.headers,
            socket_remoteAddress: req.socket.remoteAddress,
            url: req.url,
            hostname: req.hostname,
            cookies: req.cookies
        }
    };

    const jsonString = JSON.stringify(requestData, null, 2);
    res.setHeader('Content-Type', 'application/json');
    res.send(jsonString);
});


var messages = [
    { name: 'Helim', message: 'Hi' },
    { name: 'Neon', message: 'Hi' }
]

app.get('/messages', (req, res) => {
    res.send(messages);
})

// Middleware to handle requests that do not match any defined routes
app.use((req, res) => {
    const requestData = {
        customMessage: "The following are the contents of the request and response",
        request: {
            params: req.params,
            body: req.body,
            headers: req.headers,
            socket_remoteAddress: req.socket.remoteAddress,
            url: req.url,
            hostname: req.hostname,
            cookies: req.cookies
        }
    };

    const jsonString = JSON.stringify(requestData, null, 2);
    res.setHeader('Content-Type', 'application/json');
    res.status(404).send(jsonString);
})


var server = app.listen(3000, () => {
    console.log('server is listening on port', server.address().port)
})