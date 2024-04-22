const Database = require('../../config/database');
class Model extends Database{
    constructor(){
        super();
        this.connectDatabase()
    }
    /*
        executes the query
    */
    async query(query){
        try{
            const res = await this.executeQuery(query);
            return res;
        }catch(error){
            throw error;
        }
    }
}

module.exports = Model;