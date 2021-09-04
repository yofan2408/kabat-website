$(document).ready(function() {
    chartIt();
    waktu();
});
function waktu() {
	setTimeout(function() {
        catatan();
		waktu();
	}, 900);
}
// Catatan Function
function catatan() {
  n =  new Date();
  y = n.getFullYear();
  m = new Array();
  m[0] = "Januari";m[1] = "Februari"; m[2] = "Maret"; m[3] = "April"; m[4] = "Mei"; m[5] = "Juni"; m[6] = "Juli"; m[7] = "Agustus"; m[8] = "September"; m[9] = "Oktober"; m[10] = "November"; m[11] = "Desember";
  mo = m[n.getMonth()]
  d = n.getDate();
  h = n.getHours();
  mn = n.getMinutes();
  s = n.getSeconds()
  document.getElementById("day").innerHTML = d;
  document.getElementById("my").innerHTML = mo + " - " + y;
  document.getElementById("time").innerHTML = h + " : " + mn + " : " + s;

}

// Chart Function
async function chartIt(){
    const loadedData = await loadData();
    var beratLine = new Chart(document.getElementById("line").getContext('2d'), {
        type: 'line',
        responsive: true,
        backgroundColor: 'rgba(255, 251, 230, 0.5)',
        data: {
            labels: loadedData.timeStamp,
            datasets: [
                {
                label: 'Berat ( KG )',
                data: loadedData.berat,
                backgroundColor: [
                    'orange'
                ],
                borderColor: [
                    'rgba(255, 186, 27, 0.5)'
                ],
                borderWidth:3,
                },
        ],
        },
    })

    var BeratBar = new Chart(document.getElementById("bar").getContext('2d'), {
        type: 'bar',
        responsive: true,
        backgroundColor: 'rgba(255, 251, 230, 0.5)',
        data: {
            labels: loadedData.timeStamp,
            datasets: [
                {
                label: 'Berat ( KG )',
                data: loadedData.berat,
                backgroundColor: [
                    'rgba(255, 186, 27, 0.1)'
                ],
                borderColor: [
                    'rgba(255, 186, 27, 0.5)'
                ],
                borderWidth:2,
                },
        ],
        },
    })

    var suhu = new Chart(document.getElementById("suhu-chart").getContext('2d'), {
        type: 'line',
        responsive: true,
        backgroundColor: 'rgba(255, 251, 230, 0.5)',
        data: {
            labels: loadedData.timeStamp,
            datasets: [
                {
                label: 'Suhu ( °C )',
                data: loadedData.suhu,
                backgroundColor: [
                    'rgba(255, 186, 27, 0.1)'
                ],
                borderColor: [
                    'rgba(255, 186, 27, 0.5)'
                ],
                borderWidth:2,
                },
        ],
        },
    })

    var kelembapan = new Chart(document.getElementById("kelembapan-chart").getContext('2d'), {
        type: 'line',
        responsive: true,
        backgroundColor: 'rgba(255, 251, 230, 0.5)',
        data: {
            labels: loadedData.timeStamp,
            datasets: [
                {
                label: 'Kelembapan ( % )',
                data: loadedData.kelembapan,
                backgroundColor: [
                    'rgba(255, 186, 27, 0.1)'
                ],
                borderColor: [
                    'rgba(255, 186, 27, 0.5)'
                ],
                borderWidth:2,
                },
        ],
        },
    })

    var berat = new Chart(document.getElementById("berat-chart").getContext('2d'), {
        type: 'line',
        responsive: true,
        backgroundColor: 'rgba(255, 251, 230, 0.5)',
        data: {
            labels: loadedData.timeStamp,
            datasets: [
                {
                label: 'Berat ( Kg )',
                data: loadedData.berat,
                backgroundColor: [
                    'rgba(255, 186, 27, 0.1)'
                ],
                borderColor: [
                    'rgba(255, 186, 27, 0.5)'
                ],
                borderWidth:2,
                },
        ],
        },
    })
}
function refresh() {
    setTimeout(function () {
        $( "#bar" ).load(window.location.href + "#line");
    }, 100);
}

async function loadData() {
    var suhu = [];
    var kelembapan = [];
    var berat = [];
    var timeStamp = [];
    await $.getJSON('https://api.thingspeak.com/channels/1399204/feeds.json?results=8', function(data) {
        $.each(data.feeds, function() {
            var value1 = this.field1;
            var value2 = this.field2;
            var value3 = this.field3;
            var raw_time = this.created_at;
            if (raw_time){
                var timewZ = raw_time.split("T").slice(1);
            }
            suhu.push(parseFloat(value1));
            kelembapan.push(parseFloat(value2));
            berat.push(parseFloat(value3));
            timeStamp.push(timewZ);
        });
    });
    return {suhu,kelembapan,berat, timeStamp};
  }



// Animation DOM
    // Catatan
    document.getElementById("tambah").addEventListener("click", clicky);
    function clicky(){
    document.getElementById('tambah2').style.display="block";
    document.getElementById('t1').style.display="inline-block";
    document.getElementById('t2').style.display="inline-block";
    document.getElementById('meet').style.marginTop="-10px";}

    document.getElementById("t2").addEventListener("click", clicky2);
    function clicky2(){
        document.getElementById('tambah2').style.display="none";
        document.getElementById('t1').style.display="none";
        document.getElementById('t2').style.display="none";
        document.getElementById('meet').style.marginTop="-50px";}

    // Chart
    document.getElementById("linebtn").addEventListener("click", clicky3);
    function clicky3(){
        document.getElementById("linebtn").style.background="rgba(240, 173, 78, 0.5)";
        document.getElementById("barbtn").style.background="none";
        document.getElementById('lines').style.display="block";
        document.getElementById('bars').style.display="none";}

    document.getElementById("barbtn").addEventListener("click", clicky4);
    function clicky4(){
        document.getElementById("barbtn").style.background="rgba(240, 173, 78, 0.5)";
        document.getElementById("linebtn").style.background="none";
        document.getElementById('lines').style.display="none";
        document.getElementById('bars').style.display="block";}

    // Monitoring
        //inisiasi
    document.getElementById("btn_suhu").addEventListener("click", halaman_suhu);
    document.getElementById("btn_kelembapan").addEventListener("click", halaman_kelembapan);
    document.getElementById("btn_berat").addEventListener("click", halaman_berat);
    document.getElementById("suhu_back").addEventListener("click", suhu_back);
    document.getElementById("kelembapan_back").addEventListener("click", kelembapan_back);
    document.getElementById("berat_back").addEventListener("click", berat_back);

    // Suhu Page
    function halaman_suhu(){
        document.getElementById('halaman_awal').style.display="none";
        document.getElementById('halaman_suhu').style.display="block";}
    function suhu_back(){
        document.getElementById('halaman_awal').style.display="block";
        document.getElementById('halaman_suhu').style.display="none";}

    // Kelembapan Page
    function halaman_kelembapan(){
        document.getElementById('halaman_awal').style.display="none";
        document.getElementById('halaman_kelembapan').style.display="block";}
    function kelembapan_back(){
        document.getElementById('halaman_awal').style.display="block";
        document.getElementById('halaman_kelembapan').style.display="none";}

    // Berat Page
    function halaman_berat(){
        document.getElementById('halaman_awal').style.display="none";
        document.getElementById('halaman_berat').style.display="block";}
    function berat_back(){
        document.getElementById('halaman_awal').style.display="block";
        document.getElementById('halaman_berat').style.display="none";}


