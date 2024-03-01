document.addEventListener('DOMContentLoaded',function(){
    class Circle{
        constructor(offsetY,offsetX,bg_color){
            console.log('es6 instance');
            let dimension = Math.round(Math.random()*130 + 100);
            this.top = offsetY + 'px';
            this.left = offsetX + 'px';
            this.width = dimension +'px',
            this.height = dimension +'px',
            this.bg_color = bg_color
        }

        create(){
            this.newP = document.createElement('p');
            this.newP.style.top = this.top;
            this.newP.style.left = this.left;
            this.newP.style.width = this.width;
            this.newP.style.height = this.height;
            this.newP.style.backgroundColor = this.bg_color;
        }
        render(){
            let div = document.getElementsByTagName('div')[0];
            div.appendChild(this.newP);
        }
    }

    /* dynamic change of color */
    let bg_color = 'rgb(182,214,168)';
    let form = document.getElementsByTagName('form')[0];
    form.addEventListener('change',function(){
        inputs = document.querySelectorAll('input');
        for(input of inputs){
            if(input.checked){
                bg_color = input.value
            } 
        }
    })
    let reset =  document.getElementById('reset');
    reset.addEventListener('click',function(){
        bg_color = 'rgb(182,214,168)';
    })

    let div = document.getElementsByTagName('div')[0];
    div.addEventListener('click',function(e){
        let instance = new Circle(e.offsetY,e.offsetX,bg_color);
        instance.create();
        instance.render(); 
    })
})

