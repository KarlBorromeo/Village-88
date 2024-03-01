document.addEventListener('DOMContentLoaded',function(){

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

    /* reset the color to default */
    var reset =  document.getElementById('reset');
    reset.addEventListener('click',function(){
        bg_color = 'rgb(182,214,168)';
    })

    /* click event handler */
    var div = document.getElementsByTagName('div')[0];
    div.addEventListener('click',function(e){

        let dynamicDimension = Math.round(Math.random()*130 + 100) ;
        var styles = {  width:dynamicDimension+'px',
                        height:dynamicDimension+'px',
                        border_radius:'100%',
                        background_color: bg_color,
                        transform: 'translate(-50%,-50%)'
                    }
        var newP = document.createElement('p');

        newP.style.top = e.offsetY + 'px';
        newP.style.left = e.offsetX + 'px';
        newP.style.width = styles.width;
        newP.style.height = styles.height;
        newP.style.backgroundColor = styles.background_color;      
        div.appendChild(newP);
    })
})