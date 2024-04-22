const express = require('express');
const app = express();
const config = require('./config/config');
const router = require('./routes/routes');
const session = require('express-session');

// app.use(config.morgan);
app.use(express.static(__dirname + "/public"));
app.use(config.cors());
app.use(config.bodyParser.urlencoded({extended: true}));
app.use(session({
    secret: 'secretKeysample',
    resave: false,			
    saveUninitialized: true,	
    cookie: { maxAge: 60000 }
}));
app.use(router);

app.set('views', __dirname + '/src/views'); 
app.set('view engine', 'ejs');

app.listen(8005,()=>console.log('connected port 8005'));