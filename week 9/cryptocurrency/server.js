const express = require('express');
const app = express();
const axios = require('axios');
const session = require('express-session');

app.use(express.static(__dirname + "/public"));
app.set('views', __dirname + '/views'); 
app.set('view engine', 'ejs');

/* configure sesison */
app.use(session({
    secret: 'your_secret_key',
    resave: false,	
    saveUninitialized: true,
    cookie: { maxAge: 360000 }
}))

app.get('/',function(req,res){
    res.render('crypto');
})

/* render top 10 crypto*/
app.get('/cryptocurrency',function(req,res){
    req.session.url = 'https://api.coingecko.com/api/v3/global';
    req.session.start = 0;
    axios.get('https://api.coingecko.com/api/v3/global')
        .then(async (response) => {
            await new Promise(resolve => setTimeout(resolve,3000))
            const items = cryptoLimit(response.data.data.total_market_cap,10);
            // res.render('list',{items: items});
            res.json(items)
        })
        .catch(error => {
            res.json(error);
        })
})

/* render top 10 exchange */
app.get('/exchanges',function(req,res){
    req.session.url = 'https://api.coingecko.com/api/v3/exchanges';
    req.session.start = 0;
    axios.get('https://api.coingecko.com/api/v3/exchanges')
        .then(async response => {
            await new Promise(resolve => setTimeout(resolve,3000))

            const items = limit(response.data,10);
            // res.render('list',{items: items});
            res.json(items)
        })
        .catch(error => {
            res.json(error);
        })
})

/* render top 10 financial platforms */
app.get('/financeplatforms',function(req,res ){
    req.session.start = 0;
    req.session.url = 'https://api.coingecko.com/api/v3/asset_platforms';
    axios.get('https://api.coingecko.com/api/v3/asset_platforms')
        .then(async response => {
            await new Promise(resolve => setTimeout(resolve,3000))
            const items = limit(response.data,10);
            // res.render('list',{items: items});
            res.json(items)
        })
        .catch(error => {
            res.json(error);
        })
})

/* render all top 100 items */
app.get('/top',function(req,res){
    axios.get(req.session.url)
    .then(async response => {
        await new Promise(resolve => setTimeout(resolve,3000))
        let items;
        if(req.session.url == 'https://api.coingecko.com/api/v3/global'){
            items = cryptoLimit(response.data.data.total_market_cap,100);
        }else{
            items = limit(response.data,100);
        }       
        // res.render('list',{items: items});
        res.json(items)
    })
    .catch(error => {
        res.json(error);
    })
})

/* render next 10 items */
app.get('/next',function(req,res){
    req.session.start += 10;
    axios.get(req.session.url)
    .then(async response => {
        await new Promise(resolve => setTimeout(resolve,3000))
        let items;
        if(req.session.url == 'https://api.coingecko.com/api/v3/global'){
            items = cryptoLimit(response.data.data.total_market_cap,10,req.session.start);
        }else{
            items = limit(response.data,10,req.session.start);
        }       
        // res.render('list',{items: items});
        res.json(items)
    })
    .catch(error => {
        res.json(error);
    })
})

/* render prev 10 items */
app.get('/prev',function(req,res){
    if(req.session.start <10){
        req.session.start = 0;
    }else{
       req.session.start -= 10; 
    }
    axios.get(req.session.url)
    .then(async response => {
        await new Promise(resolve => setTimeout(resolve,3000))
        let items;
        if(req.session.url == 'https://api.coingecko.com/api/v3/global'){
            items = cryptoLimit(response.data.data.total_market_cap,10,req.session.start);
        }else{
            items = limit(response.data,10,req.session.start);
        }       
        // res.render('list',{items: items});
        res.json(items)
    })
    .catch(error => {
        res.json(error);
    })
})

app.listen(8005,()=>console.log('connected prot 8005'))

/* return dynamic list for crypto only */
function cryptoLimit(res,end,start=0){
    console.log(res)
    let arrayKeys = Object.keys(res);
    let items  = [];
    let limit;
    if(arrayKeys.length<end){
        limit = arrayKeys.length;
    }else{
        limit = end + start;
    }
    for(let i=start; i<limit; i++){
        items[items.length] = {name: arrayKeys[i],value: res[arrayKeys[i]]}
    }
    return items;
}
/* return dynamic list for except crypto */
function limit(res,end,start=0){
    let items  = [];
    let limit;
    if(res.length<end){
        limit = res.length
    }else{
        limit = end+start;
    }
    for(let i=start; i<limit; i++){
        items[items.length] = {name:res[i].name,value:'',}
    }
    return items;
}