class Database{
    constructor(){
        this.mysql      = require('mysql2');
        this.connection = this.mysql.createConnection({
                            host     : 'localhost',
                            user     : 'root',
                            password : 'jklborromeo',
                            database : 'collection',
                            port     : '3308'
                        });
    }
     /*
        connect to the database
    */
    connectDatabase(){
        console.log('connecting DB....');
        this.connection.connect(function(err) {
                if (err){
                    console.log(err);
                }else{
                    console.log('connected DB succesfully')
                }
        });  
    }
    /*
        executes the query
    */
    async executeQuery(query){
        console.log('executed the query');
        try{
            let result = await new Promise((resolve,reject)=>{
                this.connection.query(query, function (err, result) {
                    if(result){
                        resolve(result)
                    }else{
                        reject(err);
                    }
                });	            
            })    
            return result;      
        }catch(error){
            throw error;
        }
    }

}

module.exports = Database;