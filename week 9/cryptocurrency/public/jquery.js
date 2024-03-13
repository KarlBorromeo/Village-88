$(document).ready(function(){
    console.log('i am ready');
    $.get('/cryptocurrency',function(res){
        let string = makeList(res);
        $('#items').html(string);
        $('div').toggle();
    })

    $(document).on('click',function(event){
        event.preventDefault();
    })

    $(document).on('click','.title-anchor',function(event){
        $('div').show();
        const anchorText = $(this).text();
        const anchorHref = $(this).attr('href');
        const temp = $('#title').text();
        const anchorTempHref = '/'+removeSpace(temp)
        $('#title').html(anchorText);
        $(this).text(temp);
        $(this).attr('href',anchorTempHref);
        console.log('requesting pleas ewait ',anchorHref);
        $.get(anchorHref,function(res){
            let string = makeList(res);
            $('#items').html(string);
            if(res){
                $('div').hide();                
            }

        })
    })

    $('.buttons').on('click',function(){
        $('div').show();
        $.get($(this).attr('href'),function(res){
            let string = makeList(res);
            $('#items').html(string);
            if(res){
                $('div').hide();
            }
        })
    })
})

function removeSpace(text){
    let newText = '';
    for(let i=0; i<text.length; i++){
        if(text[i] != ' '){
            newText += text[i]
        }
    }
    return newText.toLowerCase();
}

function makeList(res){
    let string = '';
    for(let item of res){
        string += '<li>'+item.name+'</li>'
    }
    return string
}