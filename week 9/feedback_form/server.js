const express = require('express');
const bodyParser = require('body-parser')
const session = require('express-session');
const customMod = require('./customMod');
const app = express();
/* configure sesison */
app.use(session({
    secret: 'your_secret_key',
    resave: false,	
    saveUninitialized: true,
    cookie: { maxAge: 360000 }
}))

const server = app.listen(8005,()=>console.log('connecting por 8005'))
const io = require('socket.io')(server);


/* for static contents */
app.use(express.static(__dirname + "/public"));


app.set('views', __dirname + '/views'); 
app.set('view engine', 'ejs');
let num;
const urlencodedParser = bodyParser.urlencoded({ extended: false })
app.get('/',function(req,res){
    res.render('index',{cuopons: null});
})
app.post('/claim',urlencodedParser,function(req,res){
    let cuopons = {};
    console.log(req.body);
    if(session.customer>0){
        let code = customMod.randomCode();
        cuopons = {
            code: code,
            customer: --session.customer
        }        
    }else{
        cuopons = {
            code: 'Unavailable',
            customer:session.customer
        } 
    }
    io.emit('claim',session.customer);
    res.render('cuopons',{cuopons: cuopons});
})
app.get('/reset',function(req,res){
    console.log('resetting');
    session.customer = 10;
    io.emit('claim',session.customer)
    res.status(200).json();
})
