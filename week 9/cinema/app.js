const http = require('http');
const fs = require('fs');
const static_contents = require('./static');

let server = http.createServer( function (request,response){
    static_contents(request,response);
    })

server.listen(7890);
console.log('using port 7890');