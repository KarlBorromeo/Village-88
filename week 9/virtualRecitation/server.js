const express = require('express');
const app = express();
const server = app.listen(8005,()=>console.log('connected 8005'));
const io = require('socket.io')(server);

app.use(express.static(__dirname + '/public'));

app.set('views',__dirname + '/views');
app.set('view engine','ejs');

app.get('/',function(req,res){
    res.render('index');
})

let history = '';
io.on('connection',function(socket){
    socket.on('joined',function(){
        const message = `<li>Socket ID <span> ${socket.id} </span> is present</li>`;
        history += message;
        io.emit('history',{history:history});
    })
    io.emit('history',{history:history});
    socket.on('raisehand',function(){
        const message = `<li>Socket ID <span> ${socket.id} </span> raised hand!</li>`;
        history += message;
        io.emit('history',{history:history});
    })
    socket.on('disconnect',function(){
        const message = `<li>Socket ID <span> ${socket.id} </span> left</li>`;
        history += message;
        io.emit('history',{history:history});
    })
});  