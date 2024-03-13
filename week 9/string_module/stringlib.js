module.exports = class stringlib{
    concat(str1,str2){
        return str1 + str2;
    }
    repeat(string,multiplier){
        let res = '';
        for(let i=1; i<=multiplier; i++){
            res+=string;
        }
        return res;
    }
    toString(val){
        return val+'';
    }
    charAt(string,index){
            return string[index];
    } 
}
// module.exports = new stringlib();