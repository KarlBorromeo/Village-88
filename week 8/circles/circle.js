document.addEventListener('DOMContentLoaded',function(){
    class Shapes{
        constructor(offsetY,offsetX,bg_color,border_radius,rotate){
            console.log('es6 instance');
            let dimension = Math.round(Math.random()*130 + 100);
            this.top = offsetY + 'px';
            this.left = offsetX + 'px';
            this.width = dimension +'px';
            this.height = dimension +'px';
            this.bg_color = bg_color;
            this.border_radius = border_radius;
            this.rotate = 'translate(-50%,-50%) '+rotate;
        }

        create(){
            this.newP = document.createElement('p');
            this.newP.style.top = this.top;
            this.newP.style.left = this.left;
            this.newP.style.width = this.width;
            this.newP.style.height = this.height;
            this.newP.style.backgroundColor = this.bg_color;
            this.newP.style.borderRadius = this.border_radius;
            this.newP.style.transform = this.rotate;
        }
        render(){
            let div = document.getElementsByTagName('div')[0];
            div.appendChild(this.newP);
            setTimeout(function(){
                let listOfP = document.querySelectorAll('p');
                listOfP[0].remove();
            }, 3000);
        }
    }
    class Circle extends Shapes{
        constructor(offsetY,offsetX,bg_color,border_radius,rotate){
            super(offsetY,offsetX,bg_color,border_radius,rotate);
        }
    }
    class Square extends Shapes{
        constructor(offsetY,offsetX,bg_color,border_radius,rotate){
            super(offsetY,offsetX,bg_color,border_radius,rotate);
        }
    }
    class Rhombus extends Shapes{
        constructor(offsetY,offsetX,bg_color,border_radius,rotate){
            super(offsetY,offsetX,bg_color,border_radius,rotate);
        }
    }

    /* default color and shapes */
    let preSelectedColor = document.querySelector('#color-form input');
    let preSelectedShape = document.querySelector('#shape-form input');
    let bg_color = preSelectedColor.value;
    let shape = preSelectedShape.value;
    preSelectedColor.checked = true;
    preSelectedShape.checked = true;
    colorBorder();
    shadeShape();

    /* dynamic change of color  and shapes*/
    let color_form = document.querySelector('#color-form');
    let shape_form = document.querySelector('#shape-form');
    color_form.addEventListener('change',function(){
        inputs = document.querySelectorAll('#color-form input');
        for(input of inputs){
            if(input.checked){
                bg_color = input.value
            } 
        }
        colorBorder();
        shadeShape();
    })
    shape_form.addEventListener('change',function(){ shadeShape() });

    /* reset to default the shapes and colors */
    let reset =  document.getElementById('reset');
    reset.addEventListener('click',function(){
        bg_color = preSelectedColor.value;
        shape = preSelectedShape.value;
        preSelectedColor.checked = true;
        preSelectedShape.checked = true;
        colorBorder();
        shadeShape();
    })

    /* shade the selected shape */
    function shadeShape(){
        inputs = document.querySelectorAll('#shape-form input');
        labels = document.querySelectorAll('#shape-form label');
        for(let i=0; i<inputs.length; i++){
            labels[i].style.backgroundColor = 'white';
            if(inputs[i].checked){
                labels[i].style.backgroundColor = bg_color;
                shape = inputs[i].value;
            }
        }
    }

    /* color the border of selected color */
    function colorBorder(){
        inputs = document.querySelectorAll('#color-form input');
        labels = document.querySelectorAll('#color-form label');
        for(let i=0; i<inputs.length; i++){
            labels[i].style.border = 'none';
            if(inputs[i].checked){
                labels[i].style.border = '2px solid black';
            }
        }
    }

    /* created elements */
    let div = document.getElementsByTagName('div')[0];
    div.addEventListener('click',function(e){
        if(shape == 'circle'){
            instance = new Circle(e.offsetY,e.offsetX,bg_color,'100%','rotate(0deg)');
        }else if(shape == 'square'){
            instance = new Square(e.offsetY,e.offsetX,bg_color,'0%','rotate(0deg)');
        }else{
            instance = new Rhombus(e.offsetY,e.offsetX,bg_color,'0%','rotate(45deg)');
        }
        instance.create();
        instance.render(); 
    })
})

