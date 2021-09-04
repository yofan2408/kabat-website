// Set Timeout
$(document).ready(function() {
    selesai();
});
function selesai() {
	setTimeout(function() {
		kandang1();
		selesai();
	}, 800);
}

// Inisiasi Element
var yes = document.getElementsByClassName("yes");
var line = document.getElementsByClassName("line")
var no = document.getElementsByClassName("no");

// User 1
function kandang1() {
	$.getJSON('https://api.thingspeak.com/channels/1399204/feeds.json?results=1',
        function(data) {
                 var suhu = [];
                 var kelembapan = [];
                 var waktu = [];
                 var berat = [];
                    $.each(data.feeds, function() {
                        suhu.push( parseFloat( this.field1 ) );
                        kelembapan.push( parseFloat( this.field2 ) );
                        berat.push( parseFloat( this.field3 /1000) );
                        waktu.push(d + " - " + mo + " - " + y);
                        entry = this.entry_id;
                    });
                    // Untuk Dashboard
                    $('#d_suhu').text(suhu + ' ºC');
                    $('#d_kelembapan').text(kelembapan + ' %');
                    $('#d_berat').text(berat + ' kg');
                    // Untuk Universal
                    $('#berats').text(berat + ' kg');
                    $('#suhu').text(suhu + ' ºC');
                    $('#kelembapan').text(kelembapan + ' %');
                    $('#entry').text("Jumlah Data : " + entry + " data");

                     // Untuk Floating Notif
                    $('#berat').text('Berat : ' +berat + ' kg' + ' ( Siap Panen )');
                    $('#waktu').text(waktu);

                    if(berat >= 3 ){
                    no[0].style.display = "none";
                    } else{
                    yes[0].style.display = "none";
                    line[0].style.display = "none";
                    document.getElementById("box-notif").style.display = "none";
                    }
                });
            };

// user2
