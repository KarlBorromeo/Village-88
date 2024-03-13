
const socket = io();
$(document).ready(function(){
    console.log('I am ready');
    socket.on('updated-cash',function(cash){
        balance = cash;
        $('#cash').html(cash);
    })
    $('#donate').click(function(){
        socket.emit('donate');
    })
    $('#redeem').click(function(){
        socket.emit('redeem');
    })
})