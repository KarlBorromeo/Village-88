document.addEventListener('DOMContentLoaded',function(){
    var color1 = document.getElementById('color1');
    var color2 = document.getElementById('color2');
    var color3 = document.getElementById('color3');
    var reset =  document.getElementById('reset');
    var bg_color = 'rgb(182,214,168)';
    color1.addEventListener('click',function(){
        bg_color = 'rgb(182,214,168)';
    })
    color2.addEventListener('click',function(){
        bg_color = 'rgb(159,196,247)';
    })
    color3.addEventListener('click',function(){
        bg_color = 'rgb(180,166,213)';
    })
    reset.addEventListener('click',function(){
        bg_color = 'rgb(182,214,168)';
    })

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
        newP.style.position = 'absolute';
        newP.style.top = e.offsetY + 'px';
        newP.style.left = e.offsetX + 'px';
        newP.style.transform = styles.transform;
        newP.style.width = styles.width;
        newP.style.height = styles.height;
        newP.style.backgroundColor = styles.background_color;
        newP.style.borderRadius = styles.border_radius;
        newP.style.zIndex = '-1'
               
        div.appendChild(newP);
    })
})