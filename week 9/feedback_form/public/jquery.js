$(document).ready(function(){
    const socket = io();
    console.log(' i am ready ');
    $('form').submit(function(){
        $.post($(this).attr('action'),$(this).serialize(), function(res){
            // console.log('res: ',res);
        })
        console.log('submiiteed form')
        return false;
    })
    socket.on('claim',function(res){
        $('#customer').html(res);
        // console.log('sockets diri: ',res);
    })
    $('a').click(function(event){
        console.log('clicked the anchor tag');
        $.get($(this).attr('href'),function(res){
            console.log(res);
        })
        event.preventDefault();
    })
})