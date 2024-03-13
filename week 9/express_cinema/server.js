const express = require("express");
const fs = require('fs');
const app = express();
const bodyParser = require('body-parser');
const multer  = require('multer')

app.use(express.static(__dirname + "/static"));
app.use(bodyParser.urlencoded({extended: true}));

app.get('/',function(request,response){
    console.log(request);
    response.sendFile(__dirname + '/static/index.html')
})

/* images  for movies.html*/
app.get('/greyhound.jpg',function(request,response){
    console.log(request);
    response.sendFile(__dirname + '/static/images/movies/greyhound.jpg')
})
app.get('/hunter_killer.jpg',function(request,response){
    console.log(request);
    response.sendFile(__dirname + '/static/images/movies/hunter_killer.jpg')
})
app.get('/money_heist.jpg',function(request,response){
    console.log(request);
    response.sendFile(__dirname + '/static/images/movies/money_heist.jpg')
})
app.get('/naruto.png',function(request,response){
    console.log(request);
    response.sendFile(__dirname + '/static/images/movies/naruto.png')
})
app.get('/seven_deadly_sins.jpg',function(request,response){
    console.log(request);
    response.sendFile(__dirname + '/static/images/movies/seven_deadly_sins.jpg')
})
app.get('/what_wrong_sec_kim.jpg',function(request,response){
    console.log(request);
    response.sendFile(__dirname + '/static/images/movies/what_wrong_sec_kim.jpg')
})

/* images for theater.html */
app.get('/robinson.jpeg',function(request,response){
    console.log(request);
    response.sendFile(__dirname + '/static/images/theater/robinson.jpeg')
})
app.get('/cinema.jpg',function(request,response){
    console.log(request);
    response.sendFile(__dirname + '/static/images/theater/cinema.jpg')
})

/* STYLESHEETS */
app.get('/stylesheet',function(request,response){
    console.log(request);
    response.sendFile(__dirname + '/static/stylesheets/myOwnBP.css')
})

/* ejs */
app.set('views', __dirname + '/views'); 
app.set('view engine', 'ejs');
app.get('/movies',function(request,response){
    let images = fs.readdirSync(__dirname+'/static/images/movies');
    response.render('movies',{images:images});
})
app.get('/theaters',function(request,response){
    let images = fs.readdirSync(__dirname+'/static/images/theater');
    response.render('theaters',{images:images});
})
app.get('/movies/new',function(request,response){
    response.render('form');   
})

const upload = multer({ dest: 'uploads/' })
// app.post('/create',function(request,response){
//     console.log('body request: ',request.body);
//     console.log('type of request: ',typeof(request.body))
//     // console.log(typeof(request.body.img))
// })
app.post('/create', upload.array('img',2), function (req, res, next) {
    console.log('file: ',req.files);
    console.log('body ',req.body);
    // req.file is the `avatar` file
    // req.body will hold the text fields, if there were any
  })


/* port */
app.listen(8005,()=>{
    console.log('running port 8005');
})