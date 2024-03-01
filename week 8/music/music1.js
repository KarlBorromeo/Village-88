class Note{
    constructor(name,pitch){
        this.nameList = ["do", "re", "mi", "fa", "sol", "la", "ti"];
        this.name = name;
        this.pitch = pitch;
    }
    show(){
        console.log('note: ',this.name,' pitch:  ',this.pitch);
    }
    updateNote(name,pitch){
        this.name = name;
        this.pitch = pitch;
    }
}

class Instrument extends Note{
    record;
    constructor(){
        super();
        this.record = [];
    }
    getRecord(){
        return this.record;
    }
    showRecord(){
        for(let record of this.record){
            console.log(record);
        }
    }
    addNote(name,pitch){
        let note = new Note(name,pitch);
        this.record.push(note);
    }
    removeLastNote(){
        let newRecord = [];
        if(this.record.length>1){
            for(let i=0; i<this.record.length-1; i++){
                newRecord.push(this.record[i]);
            }            
        }
        this.record = newRecord;
    }
    changeNote(order, name, pitch){
        if(order <= this.record.length){
            order--;
            for(let i=0; i<this.record.length; i++){
                if(i==order){
                    this.record[i].updateNote(name,pitch);
                }
            }
        }
    }
    shuffleRecord(){
        if(this.record.length > 1){
            let n = this.record.length;
            while(n){
                let i = Math.floor(Math.random()*n--);
                let temp = this.record[i];
                this.record[i] = this.record[n];
                this.record[n] = temp;
            }
        }
    }
    autoCompose(num){
        this.record = [];
        for(let i=0; i<num; i++){
            let index = Math.floor(Math.random()*this.nameList.length);
            let name = this.nameList[index];
            let pitch = Math.floor(Math.random()*(this.nameList.length)+1);
            this.addNote(name,pitch);
        }
    }
}

class Piano extends Instrument{
    constructor(brand,model,color){
        super();
        this.brand = brand;
        this.model = model;
        this.color = color;
    }
}

class  Xylophone extends Instrument{
    constructor(brand,model,color){
        super();
        this.brand = brand;
        this.model = model;
        this.color = color;
    }
}

document.addEventListener('DOMContentLoaded',function(){
    let piano = new Piano('Rockjam',' Melody 61 Key Keyboard Piano','Brown');
    let saveBtn = document.querySelector('#save-btn');
    saveBtn.addEventListener('click',function(){
        let name;
        let pitch;
        let inputs = document.querySelectorAll('input');
        for(let i=0; i<inputs.length; i++){
            if(inputs[i].checked){
                name = inputs[i].value;
            }
        }
        pitch = document.querySelector('#pitch').value;
        piano.addNote(name,pitch);
    })

    let showBtn = document.querySelector('#show');
    showBtn.addEventListener('click',function(){
        piano.showRecord();
    })

    let shuffleBtn = document.querySelector('#shuffle');
    shuffleBtn.addEventListener('click',function(){
        console.log('shuffling');
        piano.shuffleRecord();
    })

    let removeLastBtn = document.querySelector('#removeLast');
    removeLastBtn.addEventListener('click',function(){
        console.log('removing last note');
        piano.removeLastNote();
    })

    let playBtn = document.querySelector('#play');
    playBtn.addEventListener('click',function(){
        console.log('playing');
        let records = piano.getRecord();
        if(records.length>0){
            for(let i=0; i<records.length; i++){    
                setTimeout(function() {
                    console.log(records[i].name);
                    let audio = new Audio(`piano/${records[i].name}.mp3`);
                    audio.play();
                }, 1000 * i);
            }     
        }else{
            alert('no recordings yet');
        }
    })
})



// let instance1 = new Piano;
// instance1.addNote("do", "4");
// instance1.addNote("re", "7");
// instance1.changeNote(2, "re", 5)
// // instance1.removeLastNote();
// // instance1.showRecord();
// // instance1.shuffleRecord();
// // instance1.showRecord();
// instance1.autoCompose(5);
// instance1.showRecord();
