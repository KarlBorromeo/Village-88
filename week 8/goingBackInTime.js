function Desk(name){
    this.name = name;
    this.x = 0;
    this.y = 0;
    this.color = '';
}
Desk.prototype.move = function(x,y){
    this.x = x;
    this.y = y;
}
Desk.prototype.updateColor = function(new_color){
    this.color = new_color;
}
Desk.prototype.showDetails = function(){
    return{
        name: this.name,
        x: this.x,
        y: this.y,
        color: this.color
    }
}

/* ES5
function Desk(name){
    this.name = name;
    this.x = 0;
    this.y = 0;
    this.color = '';

    this.move = function(x,y){
        this.x = x;
        this.y = y;
    }
    this.updateColor = function(new_color){
        this.color = new_color;
    }
    this.showDetails = function(){
        return{
            name: this.name,
            x: this.x,
            y: this.y,
            color: this.color
        }
    }
}*/
/*ES6
class Desk{
    constructor(name){
        this.name = name;
        this.x = 0;
        this.y = 0;
        this.color = '';
    }
    move(x,y){
        this.x = x;
        this.y = y;
    }
    updateColor(new_color){
        this.color = new_color;
    }
    showDetails(){
        return{
            name: this.name,
            x: this.x,
            y: this.y,
            color: this.color
        }
    }
} */
var desk1 = new Desk("oak desk");
var desk2 = new Desk("maple desk");
desk1.updateColor('brown');
console.log(desk1.showDetails());
console.log(desk2.showDetails());