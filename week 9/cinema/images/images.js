const http = require('http');
const fs = require('fs');

let server = http.createServer( function (request,response){
        /* images url until below */
        if(request.url === '/img/1'){
            fs.readFile('greyhound.jpg',function(error,content){
                if(!error){
                    response.writeHead(200,{'Content-Type': 'image/*'});
                    response.write(content);
                }else{
                    response.writeHead(500,{'Content-Type': 'image/*'});
                    response.write('can\'t locate the file');
                }
                response.end();
            })
        }else if(request.url === '/img/2'){
            fs.readFile('hunter_killer.jpg',function(error,content){
                if(!error){
                    response.writeHead(200,{'Content-Type': 'image/*'});
                    response.write(content);
                }else{
                    response.writeHead(500,{'Content-Type': 'image/*'});
                    response.write('can\'t locate the file');
                }
                response.end();
            })
        }else if(request.url === '/img/3'){
            fs.readFile('money_heist.jpg',function(error,content){
                if(!error){
                    response.writeHead(200,{'Content-Type': 'image/*'});
                    response.write(content);
                }else{
                    response.writeHead(500,{'Content-Type': 'image/*'});
                    response.write('can\'t locate the file');
                }
                response.end();
            })
        }else if(request.url === '/img/4'){
            fs.readFile('naruto.png',function(error,content){
                if(!error){
                    response.writeHead(200,{'Content-Type': 'image/*'});
                    response.write(content);
                }else{
                    response.writeHead(500,{'Content-Type': 'image/*'});
                    response.write('can\'t locate the file');
                }
                response.end();
            })
        }else if(request.url === '/img/5'){
            fs.readFile('seven_deadly_sins.jpg',function(error,content){
                if(!error){
                    response.writeHead(200,{'Content-Type': 'image/*'});
                    response.write(content);
                }else{
                    response.writeHead(500,{'Content-Type': 'image/*'});
                    response.write('can\'t locate the file');
                }
                response.end();
            })
        }else if(request.url === '/img/6'){
            fs.readFile('what_wrong_sec_kim.jpg',function(error,content){
                if(!error){
                    response.writeHead(200,{'Content-Type': 'image/*'});
                    response.write(content);
                }else{
                    response.writeHead(500,{'Content-Type': 'image/*'});
                    response.write('can\'t locate the file');
                }
                response.end();
            })
        }else if(request.url === '/img/robinson'){
            fs.readFile('robinson.jpeg',function(error,content){
                if(!error){
                    response.writeHead(200,{'Content-Type': 'image/*'});
                    response.write(content);
                }else{
                    response.writeHead(500,{'Content-Type': 'image/*'});
                    response.write('can\'t locate the file');
                }
                response.end();
            })
        }else if(request.url === '/img/cinema'){
            fs.readFile('cinema.jpg',function(error,content){
                if(!error){
                    response.writeHead(200,{'Content-Type': 'image/*'});
                    response.write(content);
                }else{
                    response.writeHead(500,{'Content-Type': 'image/*'});
                    response.write('can\'t locate the file');
                }
                response.end();
            })
        }else{
            response.writeHead(500);
            response.end('file not found,sorry goy!');
        }
    })

server.listen(7891);
console.log('using port 7891');