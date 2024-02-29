var ninja1 = {
    hp: 100,
    strength: 15,
    attack: function() {
        return Math.round(Math.random()*this.strength);

    }
}
var ninja2 = {
    hp: 150,
    strength: 10,
    attack: function() {
        return Math.round(Math.random()*this.strength);
    }
}
for(let i=0; i<10; i++){
    console.log('==Round '+ i+'==');
    ninja1Damage = ninja1.attack();
    ninja2.hp -= ninja1Damage;
    console.log('Ninja1 attacks Ninja2 and does a damage of '+ninja1Damage+'! Ninja1 health: '+ninja1.hp+'. Ninja2 health: '+ninja2.hp);
    ninja2Damage = ninja2.attack();
    ninja1.hp -= ninja2Damage;
    console.log('Ninja1 attacks Ninja2 and does a damage of '+ninja2Damage+'! Ninja2 health: '+ninja2.hp+'. Ninja1 health: '+ninja1.hp);
}
if(ninja1.hp > ninja2.hp){
    console.log('NINJA1 WINS!');
}else{
    console.log('NINJA2 WINS!');
}