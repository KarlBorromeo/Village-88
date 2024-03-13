module.exports = {
    findIndex : function(array,target){
        for(let i=0; i<array.length; i++){
            console.log(array[i].id ,target);
            if(array[i].id === target){
                return i;
            }
        }
        return -1;
    },
    splice: function(string,index){
        let newString = '';
        for(let i=0; i<string.length; i++){
            if(i!=index){
                newString += string[i];                
            }
        }
        return newString;
    }
}