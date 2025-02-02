var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http,{
  cors: {
      origin: '*',
    }
});
var redis = require('redis');
var r = redis.createClient();


r.subscribe('canal');

io.on('connection', function(socket){
  console.log('usuario conectado');
});

r.on('message', function(channel, messageStr){
  var message = JSON.parse(messageStr);
	console.log(message);
	io.emit('message', message);    
});

http.listen(3000, function(){
  console.log('listening on *:3000');
});