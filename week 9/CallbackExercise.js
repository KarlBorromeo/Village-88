function mainFunction(string,operation){
    operation(string);
}
mainFunction("Karl",function(name){
    console.log('Hello ' + name);
})

console.log('---------------------');

function main2Function(){
    return function(name){
        console.log('Hi ' +name+ ' I am returned function');
        }
}
let returnedFunc = main2Function();
returnedFunc('Karl');

console.log('---------------------');

function main3Function(func1, func2){
    let randomNo = Math.floor(Math.random()*2+1);
    if(randomNo == 2){
        func1();
    }else{
        func2();
    }
}
main3Function(function(){
        console.log('I am function 1');
    },function(){
        console.log('I am function 2');
    });