var express = require('express')
var bodyParser = require('body-parser')
var app = express()
var http = require('http').Server(app)
var io = require('socket.io')(http)
var mongoose = require('mongoose')

app.use(express.static(__dirname))
app.use(bodyParser.json())
app.use(bodyParser.urlencoded({ extended: false }))

var dbUrl = 'mongodb://mongoadmin:secret@127.0.0.1:27888'
mongoose.Promise = global.Promise;

// https://mongoosejs.com/docs/models.html
var messageModel = mongoose.model('message', {
    name: String,
    message: String,
})


app.get('/messages', (req, res) => {
    // https://mongoosejs.com/docs/api/model.html#Model.find()
    messageModel.find({})
        .then((messages) => {
            console.log("Successfully found all the documents as per mongo query");
            console.log("Messages : ", messages);
            res.send(messages);
        })
        .catch((err) => {
            console.log("Error finding the documents in the database:", err);
            res.sendStatus(500);
        });
});



app.post('/messages', async (req, res) => {
    try {
        var messageModelObject = new messageModel(req.body);

        var savedMessage = await messageModelObject.save()
        console.log("Message has been saved successfully in the database");

        var censored = await messageModel.findOne({ message: 'badword' });

        if (censored) {
            console.log("Censored word found in the message: ", censored);
            removeCensoredMessage = await messageModel.findByIdAndDelete(censored._id);
            console.log("Censored message has been removed from the database");
        }
        else {
            io.emit('message', req.body);
        }

        res.sendStatus(200);
    }
    catch (error) {
        res.sendStatus(500);
        return console.log("Error while saving the message in the database : ", error);
    }

});


io.on('connection', (socket) => {
    console.log("A user is connected");
})

// https://mongoosejs.com/docs/connections.html
mongoose.connect(dbUrl, {
    serverSelectionTimeoutMS: 5000
}).catch((err) => {
    console.log("Error while connecting to the database : ", err.reason)
}
);

var server = http.listen(3000, () => {
    console.log("Database is connected.")
    console.log('server is listening on port', server.address().port)
})