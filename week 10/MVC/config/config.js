class Config{
    /* middlewares */
    constructor(){
        this.morgan = require('morgan')
        this.cors = require('cors')
        this.bodyParser = require('body-parser')     
    }
}
module.exports = new Config();