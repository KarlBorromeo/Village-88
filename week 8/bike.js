/* ES6
// class Bike{
//     constructor(price,max_speed){
//         this.price = price
//         this.max_speed = max_speed
//         this.miles = 0      
//     }
//     displayInfo(){
//         return{
//             price: this.price,
//             max_speed: this.max_speed,
//             miles: this.miles
//         }
//     }
//     drive(){
//         console.log('Driving.....');
//         this.miles += 10;
//     }
//     reverse(){
//         console.log('Reversing....');
//         if(this.miles<=5){
//             this.miles = 0;     
//         }else{
//             this.miles -= 5;
//         }
//     }
// } */

/* ES5
function Bike(price,max_speed){
    this.price = price
    this.max_speed = max_speed
    this.miles = 0      

    this.displayInfo = function(){
        return{
            price: this.price,
            max_speed: this.max_speed,
            miles: this.miles
        }
    }
    this.drive = function(){
        console.log('Driving.....');
        this.miles += 10;
    }
    this.reverse = function(){
        console.log('Reversing....');
        if(this.miles<=5){
            this.miles = 0;     
        }else{
            this.miles -= 5;
        }
    }
} */

//ES5 with Prototype
function Bike(price,max_speed){
    this.price = price
    this.max_speed = max_speed
    this.miles = 0      
}
Bike.prototype.displayInfo = function(){
    return{
        price: this.price,
        max_speed: this.max_speed,
        miles: this.miles
    }
}
Bike.prototype.drive = function(){
    console.log('Driving.....');
    this.miles += 10;
}
Bike.prototype.reverse = function(){
    console.log('Reversing....');
    if(this.miles<=5){
        this.miles = 0;     
    }else{
        this.miles -= 5;
    }
}



// // instance 1
var instance1 = new Bike(2000,75);
execute(instance1,3,1);

// // instance 2
var instance2 = new Bike(3000,90);
execute(instance2,2,2);

// // instance 3
var instance3 = new Bike(5000,125);
execute(instance2,0,3);

// function execute
function execute(obj,drive,reverse){
    var i = 0;
    while(i<drive){
        i++;
        obj.drive();
    }
    var k = 0;
    while(k<reverse){
        k++;
        obj.reverse();
    }
    console.log(obj.displayInfo());
}