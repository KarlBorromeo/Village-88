const express = require('express');
const app = express();
const fs = require('fs');

/* my custom module */
const customMethods = require('./customMethods');

app.use(express.static(__dirname+'/static'));
app.get('/',function(request,response){
    response.sendFile(__dirname + '/static/index.html')
})
app.get('/stylesheets',function(request,response){
    response.sendFile(__dirname + '/static/stylesheets/style.css');
})
/* images */
app.get('/samp1.jpg',function(request,response){
    response.sendFile(__dirname + '/static/images/samp1.jpg')
})
app.get('/samp2.jpg',function(request,response){
    response.sendFile(__dirname + '/static/images/samp2.jpg')
})
app.get('/samp3.jpg',function(request,response){
    response.sendFile(__dirname + '/static/images/samp3.jpg')
})

let awards = [
    {
        id:'php-track',
        name: 'PHP Track',
        img: 'http://localhost:8002/samp1.jpg',
        date: '01-01-2024',
        awarderBy: 'Karen',
        technologies : ['PHP','CodeIgniter','Ajax','Jquery','SQL']
    },
    {
        id:'js-track',
        name: 'JS Track',
        img: 'http://localhost:8002/samp2.jpg',
        date: '02-05-2024',
        awarderBy: 'Karen',
        technologies : ['Express','Node','Socket']
    },
    {
        id:'elective',
        name: 'Elective',
        img: 'http://localhost:8002/samp3.jpg',
        date: '04-29-2024',
        awarderBy: 'Karen',
        technologies : ['React']
    },
]

app.set('views', __dirname + '/views'); 
app.set('view engine', 'ejs');
app.get('/awards',function(resquest,response){
    response.render('awards',{awards: awards});
})
app.get('/php-track',function(request,response){
    var awardID = customMethods.splice(request.url,0);
    let index = customMethods.findIndex(awards,awardID);
    response.render('details',{award: awards[index]})
})
app.get('/js-track',function(request,response){
    var awardID = customMethods.splice(request.url,0);
    let index = customMethods.findIndex(awards,awardID);
    response.render('details',{award: awards[index]})
})
app.get('/elective',function(request,response){
    console.log('hello i ma hp track')
    var awardID = customMethods.splice(request.url,0);
    let index = customMethods.findIndex(awards,awardID);
    response.render('details',{award: awards[index]})
})


app.listen(8002,()=>{
    console.log('listening port 8002')
})