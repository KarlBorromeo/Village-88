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

let words = ['karl','jhaerix','lyam','gilly'];
let index = 0;
let sensored = createBlanks(words[index]);
let history = {
    word: sensored,
    chats: ''
}
io.on('connection',function(socket){
    io.emit('history',history); 
    socket.on('guess-word',function(payload){       // payload{guess:'',name:''}
        console.log(payload);
        let chat = `<li><p><span class="name">${payload.name}:</span>${payload.guess}</p></li>`
        history.chats += chat;
        if(words[index] === payload.guess){
            let notif = `<li><p class="correct">${payload.name} won! "${words[index]}" is the exact word!</p></li>`
            history.chats += notif;
            index++;
            sensored = createBlanks(words[index]);
            history.word = sensored;
        }
        io.emit('history',history);
    }) 
})

/* ---------------------------------------- */
/* functions */
function createBlanks(word){
    const numBlanks = (word.length/2)
    for(let i=0; i<numBlanks; i++){
        const randomIndex = geneateIndex(word);
        console.log(randomIndex);
        if(word[randomIndex] === '_'){
            i--;
        }else{
            word = replaceLetter(word,randomIndex);
        }
    }
    return word;
}
function geneateIndex(word){
    return Math.floor(Math.random()*word.length);
}
function replaceLetter(word,index){
    let newWord ='';
    for(let i=0; i<word.length; i++){
        if(i==index){
            newWord += '_';
        }else{
            newWord += word[i];
        }
    }
    return newWord;
}