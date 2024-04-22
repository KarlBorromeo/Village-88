const KB_Controller = require('./controller');
class homeController extends KB_Controller{
    constructor(){
            super();
            this.model = this.load('homeModel');
        }
    index(){
        return function(req, res) {
            console.log(req.url);
            if (req.session.visit === undefined) {
                req.session.visit = 1;
            } else {
                req.session.visit++;
            }
            console.log('Session: ', req.session);
            res.render('index', { visit: req.session.visit });
        };
    }
    result(){
        return function(req,res){
            res.send('result')
        }
    }
    fetchCars(){
        let model = this.model;
        return async function(req,res){
            try{
                const response = await model.fetchCars()
                res.send(response); 
            }catch(error){
                console.log(error);
                throw error;
            }
        }
    }
}
module.exports = new homeController();
