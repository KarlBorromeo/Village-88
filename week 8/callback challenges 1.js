let foreach = function(array,operation){
    for(let i = 0; i<array.length; i++){
        array[i] = operation(array[i]);
    }
    return array;
}
/*
//1 
let result = foreach([1,2,3,4,5], function(num) { return num*2; });
console.log(result); //this should log [2,4,6,8,10]

//2
result = foreach([1,2,3,"v88", "training"], function(val) { 
    if(typeof(val) === 'number') { 
        return 0;
    }
    else {
        return val;
    }
});
console.log(result); //this should log [0,0,0,"v88","training"];

//3
result = foreach([1,2,3,"hello"], function(val) { return typeof(val); });
console.log(result); //this should log ["number", "number", "number", "string"];
*/

let filter = function(array,operation){
    let newArr = [];
    for(let i = 0; i<array.length; i++){
        if(operation(array[i])){
            newArr.push(array[i]);
        }
    }
    return newArr;
}
/*
//1
// let result = filter([1,2,3,4,15], function(val) { return val<10; }); //this filters each value in the array and only allows values that are less than 10
// console.log(result); //this should log [1,2,3,4]

//2
let result = filter([1,2,3,4,15], function(val) { return val<3; }); //only allows values that is less than 3
console.log(result); //this should log [1,2]
*/

let reject = function(array,operation){
    let newArr = [];
    for(let i = 0; i<array.length; i++){
        if(!operation(array[i])){
            newArr.push(array[i]);
        }
    }
    return newArr;
}
/*1*/
let result1 = reject([1,2,3,4,15], function(val) { return val<10; }); //rejects any value that is less than 10
console.log(result1); //this should log [15]

/*2*/
let result2 = reject([1,2,3,4,15], function(val) { return val<3; }); //rejects any value that is less than 3
console.log(result2); //this should log [3,4,15]