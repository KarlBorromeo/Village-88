function Circles(counts){
    this.counts = counts;
    this.top = 0;
    this.left = 0;
    this.width = 0;
    this.height = 0;
    this.position = 'absolute';
    this.transform = 'translate(-50%,-50%)';
    this.bg_color = '';
    this.border_radius = '100%';

    this.generate_params = function(){
        this.top = this.generate_random(0,800);
        this.left = this.generate_random(0,1000);
        let dimension = this.generate_random(10,140);
        this.width = dimension;
        this.height = dimension;
        let array = ['green','blue','yellow','brown','red','white','violet','orange'];
        this.bg_color = array[this.generate_random(0,array.length-1)];
    }
    this.generate_random = function(min,max){
        return Math.floor(Math.random()*(max-min)+min);
    }
    this.create_element = function(){
        this.newEl = document.createElement('p');
        this.newEl.style.position = this.position;
        this.newEl.style.top = this.top;
        this.newEl.style.left = this.left;
        this.newEl.style.width = this.width;
        this.newEl.style.height = this.height;
        this.newEl.style.borderRadius = this.border_radius;
        this.newEl.style.backgroundColor = this.bg_color;
        this.newEl.style.animation = 'shrink 1s ease-out forwards';
    }
    this.draw_circles = function(parent_id){
        var styles = document.createElement('style');
        var keyframes = `@keyframes shrink {
                    0%{
                        opacity: 1;
                    }
                    100%{
                        opacity: 0;
                        scale: 1.5;
                    }
                }`;
        styles.appendChild(document.createTextNode(keyframes));
        document.head.appendChild(styles);
        /* passing the this to details cause the setTimeout can't read tehe this attributes and methods */
        var copy = this;
        for(let i=0; i<this.counts; i++){
            setTimeout(function() {
                copy.generate_params();
                copy.create_element();
                var parent = document.getElementById(parent_id);
                parent.appendChild(copy.newEl);
            }, 100 * i);
        }
    }
}

