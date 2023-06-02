import express, { response } from 'express';
import data from './data/mock.json' assert {type: "json"};
const app = express();

const PORT= 3000;

app.use(express.static('./public'));
app.use(express.json());
app.use(express.urlencoded({ extended: true}));
app.use("/images", express.static('./images'))

app.post("/item", (req, res) => {
    console.log(req.body);
    res.send(req.body);
});

app.get('/', (req, res) => {
    res.json(data);
});


app.get("/next", (req, res, next) => {
    console.log("response will be sent by next handler function");
    next();
}, (req, res) => {
    res.send("this is the next handler function");
});

// Download method
app.get("/download", (req, res) => {
    res.download("images/astonishedbaby.jpeg");
});


// Redirect method

app.get("/redirect", (req, res) => {
    res.redirect("https://google.com");
});


//Route chaining

app.route("/class")
.get((req, res) => {
    res.send("GET route called");
})
.put((req, res) => {
    res.send("PUT route called");
})
.post((req, res) => {
    res.send("POST method called");
})
;


app.get("/class/:id/", (req, res) => {
    console.log(req.params);
    const studentId = Number(req.params.id);
    const student = data.filter((student) => student.id === studentId )
    res.send(student);
});


app.post('/create', (req, res) => {
    res.send('This is a POST request at /create');
});

app.put('/edit', (req, res) => {
    res.send('This is a PUT request at /edit');
});

app.delete('/delete', (req, res) => {
    res.send('This is a DELETE request at /delete');
});

app.listen(PORT, () => {
    console.log(`The server is listening on port ${PORT}`);
});