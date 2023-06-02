fs = require('fs');

data = fs.readdirSync('./');

console.log('data: ', data);

console.log('This comes after. Example of sync demo')
