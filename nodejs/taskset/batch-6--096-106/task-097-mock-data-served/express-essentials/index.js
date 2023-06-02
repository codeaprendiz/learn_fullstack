import express from 'express';
import data from './data/mock.json' assert {type: "json"};
const app = express();

const PORT= 3000;

app.listen(PORT, () => {
    console.log(`The server is listening on port ${PORT}`);
    console.log(data);
});