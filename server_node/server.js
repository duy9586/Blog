var io = require('socket.io')(3000);

console.log('Connected to port ' + 3000);

io.on('error', function (socket) {
  console.log("error");
})

io.on('connection', async (socket) => {
  console.log('A devide is connect ' + socket.id);
});

var Redis = require('ioredis');
var redis = new Redis(3001);

redis.psubscribe("*", function (error, count) {
  //
});

redis.on('pmessage', function (partner, channel, message) {

  console.log(partner);
  console.log(channel);

  message = JSON.parse(message);
  message.data.chats.room = message.data.chats.author + message.data.chats.receiver;
  console.log(message);
  io.emit(channel + ":" + message.event, message.data.chats);
  console.log('Sent');
});
