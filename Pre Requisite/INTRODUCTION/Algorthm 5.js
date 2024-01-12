// Given an array and a value Y, 
// count and print the number of array values greater than Y.
function countPrint(y,array){
    console.log(array,y)
    let counter= 0;
    for(let i=0; i<array.length; i++){
        if(array[i]>y){
            console.log(array[i]);
            counter++;
        }
    }
    console.log('total',counter)
}
countPrint(2,[1,2,-5,0,5,6])

// Given an array, print the max, min, and average values for that array.
function maxMinAve(array){
    let max = array[0];
    let min = array[0];
    let sum = 0;
    for(let i=0; i<array.length; i++){
        if(max<array[i]){
            max = array[i]
        }

        if(min>array[i]){
            min = array[i]
        }

        sum += array[i]
    }

    let average = sum/array.length
    console.log("MAX ",max)
    console.log("MIN ", min)
    console.log("AVERAGE ", average)
}
maxMinAve([1,3,0,5,1,2])

// Given an array of numbers, 
// create a function that returns a new array 
// where negative values were replaced with the
//  string ‘Dojo’.    For example, replaceNegatives( [1,2,-3,-5,5])
//  should return [1,2, "Dojo", "Dojo", 5].
function replaceNegatives(array){
    for(let i=0; i<array.length; i++){
        if(array[i]<0){
            array[i] = "Dojo"
        }
    }
    return array
}
console.log(replaceNegatives([1,2,-3,-5,5]))

// Given an array, and indices start and end, 
// remove values in that index range, working in place 
// (hence shortening the array).  For example, removeVals
// ([20,30,40,50,60,70],2,4) should return [20,30,70].
function removeVals(array,start,end){
    let newlist = []
    for(let i=0; i<array.length; i++){
        if(i<start || i>end){
            newlist.push(array[i])
        }
    }
    console.log(newlist)
}
removeVals([20,30,40,50,60,70],2,4)