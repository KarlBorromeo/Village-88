const express = require('express');
const app = express();
const session = require('express-session');
const { define } = require('mime');
app.use(session({secret: 'hehe',
                resave: false,
                saveUninitialized: true,
                cookie: {maxAge: 60000}
        }))

app.set('views', __dirname + '/views'); 
app.set('view engine', 'ejs');
app.get('/',function(req,res){
    if(req.session.counter === undefined){
         req.session.counter = 0;
    }else{
        req.session.counter++;
        req.session.save();
    } 
    console.log(req.session.counter)
    res.render('index',{counter: req.session.counter});
})
app.get('/reset',function(req,res){
    // req.session.destroy(()=>{
        req.session.counter = 0;
        res.redirect('/')
    // })
})
app.get('/repeat',function(req,res){
    if(req.session.counter){
        req.session.counter--;
    }
    req.session.save(()=>{
        res.redirect('/')
    })
})

app.listen(8005,function(){
    console.log('connecting port 8005');
})