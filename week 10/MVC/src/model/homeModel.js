const KB_Model = require('./model');
class Model extends KB_Model{
    constructor(){
        super();
    }
    async fetchCars(){
        let query = 'SELECT * FROM cars where id = 1';
        try{
            let res = await this.query(query);
            return res;      
        }catch(error){
            throw error;
        }
    }
}
module.exports = new Model();