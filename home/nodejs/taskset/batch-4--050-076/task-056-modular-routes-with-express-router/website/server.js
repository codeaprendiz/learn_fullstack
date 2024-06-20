const express = require('express');
const path = require('path');

const routes = require('./routes');

const app = express();

const port = 3000;

app.set('view engine', 'ejs');
app.set('views', path.join(__dirname, './views'));
app.use(express.static(path.join(__dirname, './static')));

// Use the routes module for all requests
app.use('/', routes);

app.listen(port, () => {
  console.log(`Server is listening on port ${port} Ready to accept requests!`);
});
