var fs = require('fs')

fs.readdir('./', (err, data) => {
    console.log(data)
})