var express = require('express')
var app = express()

app.use(express.static(__dirname))

var messages = [
    { name: 'Helium', message: 'Hi' },
    { name: 'Neon', message: 'Hi' }
]

app.get('/messages', (req, res) => {
    res.send(messages);
})


var server = app.listen(3000, () => {
    console.log('server is listening on port', server.address().port)
})