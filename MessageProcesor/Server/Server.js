/**
 * Created by Arch Gentoo on 06.08.17.
 */

const url = require('url');

const { spawn } = require('child_process');
const config = spawn('php', ['../../index.php', 'config']);

const app = require('express')();

const http = require('http').Server(app);
const io = require('socket.io')(http);

app.get('/', function(req, res){
    res.sendFile(__dirname + '/index.html');
});

function getChartData(){
    var chartData = spawn('php', ['../../index.php', 'chartData', 'tradesOnDay']);
    chartData.stdout.on('data', (data) => {
        var obj = JSON.parse(data.toString());
        feedChartData(obj);
    });
}

function feedChartData(obj){
    io.emit('foo', obj);
}

io.on('connection', function(socket){
    // Read latest trades and serve to client.
    getChartData();
});

config.stdout.on('data', (data) => {
    const urlObj = url.parse(data.toString());

    http.listen(urlObj.port, function(){
        console.log('listening on port: ' + urlObj.port);
    });

});