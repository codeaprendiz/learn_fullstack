fs = require('fs');

function phoneNumber(err, data) {
    if (err) {
        console.log('An error occurred: ', err);
        return;
    }
    console.log('data: ', data);
}

fs.readdir('./', phoneNumber);

console.log("This will come before. Example of async.")
