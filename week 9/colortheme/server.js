const express = require('express');
const app = express();
const server = app.listen(8005,()=>console.log("connected port 8005"))
const io = require('socket.io')(server);

app.use(express.static(__dirname + "/public"));

app.set('views',__dirname + '/views');
app.set('view engine','ejs')

app.get('/',function(req,res){
    res.render('index');
})

let color = 'white';
io.on('connection',function(socket){
    io.emit('generated-color',color);
    socket.on('light',function(){
        color = 'white';
        io.emit('generated-color',color)
    })
    socket.on('dark',function(){
        color = 'rgb(51,51,51)'
        io.emit('generated-color',color)
    })
    socket.on('random',function(){
        color = randomColor()
        io.emit('generated-color',color)
    })
})

function randomColor(){
    const rgb = ['a','b','c','d','e','f','0','1','2','3','4','5','6','7','8','9'];
    let color = '#'  //this is what we'll return!
    for(let i = 0; i < 6; i++)   // 6 is total number of characters in hex
    {
        let x = Math.floor((Math.random()*16));  // 16 for hex
        color += rgb[x]; 
    }
    return color;
}