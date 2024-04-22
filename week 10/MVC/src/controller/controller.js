const fs = require('fs');
const path = require('path');
class Controller{
    constructor(){
        console.log('this is base controller');
    }
    /* 
        - search and import the file
        - return the imported file
        - needs the model paramter matches on the model filename at the directory of '/model'
    */
    load(model){
        const modelPath = path.join(__dirname, '../model');
        const files = fs.readdirSync(modelPath);
        if(files.length>0){
            const filename = model + '.js';
            console.log(filename)
            for(let i=0; i<files.length; i++){
                if(filename == files[i]){
                    console.log(modelPath+'/'+filename);
                    const yourModel = require(modelPath+'/'+filename);
                    return yourModel;
                }
            }
        }
        return null;
    }
}
module.exports = Controller;