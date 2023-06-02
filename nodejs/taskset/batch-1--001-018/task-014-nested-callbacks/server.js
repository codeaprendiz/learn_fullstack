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

app.post('/messages', (req, res) => {
    var messageModelObject = new messageModel(req.body);

    messageModelObject.save()
        .then(() => {
            console.log("Message has been saved successfully in the database");
            console.log("This is a post request");
            console.log("Req body: ", req.body);
            // If you find a bad word in the message say "badword" then remove the message from the database
            // https://mongoosejs.com/docs/api/model.html#model_Model.findOne

            messageModel.findOne({ message: 'badword' }) // Find the first document where message is badword
                .then((censored) => {
                    console.log("Censored word found in the message: ", censored);
                    console.log("Removing the censored message from the database");
                    // https://mongoosejs.com/docs/api/model.html#model_Model.remove
                    messageModel.remove({ _id: censored.id })
                        .then(() => {
                            console.log("Censored message has been removed from the database");
                        })
                        .catch((err) => {
                            console.log("There was an error removing the censored message from the database", err);
                            res.sendStatus(500);
                        });
                }
                )
                .catch((err) => {
                    console.log("There was an error finding the censored message in the database", err);
                    res.sendStatus(500);
                });


            io.emit('message', req.body);
            res.sendStatus(200);
        })
        .catch((err) => {
            console.log("There was an error saving the msg object to the database", err);
            console.log("Sending 500 status code");
            res.sendStatus(500);
        });
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