
var $query = function(string){
    return {
        click: function(params){
                    var e = document.querySelectorAll(string);
                    for(let i = 0; i<e.length; i++){
                        e[i].addEventListener('click',function(){
                            params({
                                name: "coded by karl",
                                eventType: "clickbait",
                            });
                        })                        
                    }

                },
        hide: function(){
                    var e = document.querySelectorAll(string);
                    for(let i = 0; i<e.length; i++){
                        e[i].style.display = "none";
                    }
                    
                },
        show: function(){
                    var e = document.querySelectorAll(string);
                    for(let i = 0; i<e.length; i++){
                        e[i].style.display = "block";
                    }
                },
        }
}
