// 1. Use traditional callbacks to accomplish the desired tasks.
// function EmitRandomNumber(index=1,callback){
//     setTimeout(()=>{
//         let number = callback(index);
//         if(number <= 80 && index < 10){
//             EmitRandomNumber(++index,callback);
//         }else{
//             return
//         }
//     },2000)     
// }

// EmitRandomNumber(1,function(index){
//     let number = Math.floor(Math.random()*100);
//     console.log('Attempt #'+index+'. EmitRandomNumber is called.');
//     console.log('2 seconds have lapsed.');
//     console.log('Random number generated is '+number);
//     return number;
// });

// Use promises this time.
// function EmitRandomNumber(index = 1){
//     let req = new Promise((resolve,reject) =>{
//         let number = Math.floor(Math.random()*100);
//         console.log('Attempt #'+index+'. EmitRandomNumber is called');
//         console.log('2 seconds have lapsed.');
//         console.log('Random number generated is '+number );
//         console.log('- - - - -');
//         if(number<=80 && index < 10){
//             setTimeout(() => {
//                 resolve();
//             }, 2000);         
//         }
//     })

//     req.then(()=>{
//         EmitRandomNumber(++index)
//         })
// }
// EmitRandomNumber();

async function EmitRandomNumber(index=1){
    try{
        const res = await new Promise( async(resolve,reject)=> {
            await new Promise((done) => setTimeout(done,2000))
            let number = Math.floor(Math.random()*100);
            console.log('Attempt #'+index+'. EmitRandomNumber is called');
            console.log('2 seconds have lapsed.');
            console.log('Random number generated is '+number );
            console.log('- - - - -');
            if(number <= 80 && index < 10){
                EmitRandomNumber(++index);
                resolve();
            }else{
                reject('done');
            }
        });         
    }catch(error){
        console.log(error);
    }

}
EmitRandomNumber();
