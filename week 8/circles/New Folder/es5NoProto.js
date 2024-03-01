document.addEventListener('DOMContentLoaded',function(){
    function Circle(offsetY,offsetX,bg_color){
        console.log('es5 no proto instance');
        let dimension = Math.round(Math.random()*130 + 100);
        this.top = offsetY + 'px';
        this.left = offsetX + 'px';
        this.width = dimension +'px',
        this.height = dimension +'px',
        this.bg_color = bg_color


        this.create = function(){
            this.newP = document.createElement('p');
            this.newP.style.top = this.top;
            this.newP.style.left = this.left;
            this.newP.style.width = this.width;
            this.newP.style.height = this.height;
            this.newP.style.backgroundColor = this.bg_color;
        }
        this.render = function(){
            var div = document.getElementsByTagName('div')[0];
            div.appendChild(this.newP);
        }
    }

    /* dynamic change of color */
    var bg_color = 'rgb(182,214,168)';
    var form = document.getElementsByTagName('form')[0];
    form.addEventListener('change',function(){
        inputs = document.querySelectorAll('input');
        for(input of inputs){
            if(input.checked){
                bg_color = input.value
            } 
        }
    })
    var reset =  document.getElementById('reset');
    reset.addEventListener('click',function(){
        bg_color = 'rgb(182,214,168)';
    })

    var div = document.getElementsByTagName('div')[0];
    div.addEventListener('click',function(e){
        var instance = new Circle(e.offsetY,e.offsetX,bg_color);
        instance.create();
        instance.render(); 
    })
})

