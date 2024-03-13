const express = require('express');
const app = express();
const server = app.listen(8005,()=>console.log('listening 8005'))
const io = require('socket.io')(server);
let cash = 0;
app.use(express.static(__dirname + "/public"));

app.set('views', __dirname + '/views'); 
app.set('view engine', 'ejs');


app.get('/',function(req,res){
    res.render('index');
})
app.get('/cash',function(req,res){
    res.send('updated cash:'+ cash);
})

io.on('connection',function(socket){
    console.log('socket id: ',socket.id);
    io.emit('updated-cash',cash);
    socket.on('donate',function(){
        cash+=10;
        io.emit('updated-cash',cash);
    })
    socket.on('redeem',function(){
        if(cash>=10){
            cash-=10;
        }else{
            cash = 0;
        }
        io.emit('updated-cash',cash)
    })
})


