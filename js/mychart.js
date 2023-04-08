
// Load google charts
google.charts.load('current', { 'packages': ['corechart'] });
google.charts.setOnLoadCallback(drawChart);
google.charts.setOnLoadCallback(drawChart2);
google.charts.setOnLoadCallback(drawChart3);
google.charts.setOnLoadCallback(drawChart4);
google.charts.setOnLoadCallback(drawChart5);


// chart 1
// Draw the chart and set the chart values
function drawChart() {

    let chart_capaian_sek = 0;
    let chart_sisa_sek = 0;
    $.ajax({
        async: false,
        url: 'get_chart.php',
        dataType: 'json',
        error: function (data) {
            alert("ajax error");
            console.log(data);
            $('.result').html(data.responseText);
        },
        success: function (data) {
            // alert('success ajax');

            if (data.cap_rata_sek > 100) {
                chart_capaian_sek = 100;
            } else {
                chart_capaian_sek = parseInt(data.cap_rata_sek);
            }

            chart_sisa_sek = parseInt(100 - chart_capaian_sek);

            // alert(chart_capaian_sek);
            // alert(chart_sisa_sek);

        }
    });


    var data = google.visualization.arrayToDataTable([
        ['kinerja', 'nilai'],
        ['capaian', chart_capaian_sek],
        ['sisa', chart_sisa_sek],

    ]);

    // Optional; add a title and set the width and height of the chart
    var options = {
        'title': 'Pengelolaan Admisnistrasi Perkantoran',
        is3D: true,
        pieHole: 0.4
    };

    // Display the chart inside the <div> element with id="piechart"
    var chart = new google.visualization.PieChart(document.getElementById('piechart1'));
    chart.draw(data, options);
}

// chart 2
function drawChart2() {

    let chart_capaian_pro = 0;
    let chart_sisa_pro = 0;
    $.ajax({
        async: false,
        url: 'get_chart.php',
        dataType: 'json',
        error: function (data) {
            alert("ajax error");
            console.log(data);
            $('.result').html(data.responseText);
        },
        success: function (data) {
            // alert('success ajax');

            if (data.cap_rata_pro > 100) {
                chart_capaian_pro = 100;
            } else {
                chart_capaian_pro = parseInt(data.cap_rata_pro);
            }

            chart_sisa_pro = parseInt(100 - chart_capaian_pro);

            // alert(chart_capaian_pro);
            // alert(chart_sisa_pro);

        }
    });

    var data = google.visualization.arrayToDataTable([
        ['kinerja', 'nilai'],
        ['capaian', chart_capaian_pro],
        ['sisa', chart_sisa_pro],

    ]);

    // Optional; add a title and set the width and height of the chart
    var options = {
        'title': 'Perencanaan Pembangunan Iklim dan Promosi Penanaman Modal',
        is3D: true,
        pieHole: 0.4

    };

    // Display the chart inside the <div> element with id="piechart"
    var chart = new google.visualization.PieChart(document.getElementById('piechart2'));
    chart.draw(data, options);
}

// chart 3

function drawChart3() {

    let chart_capaian_dal = 0;
    let chart_sisa_dal = 0;
    $.ajax({
        async: false,
        url: 'get_chart.php',
        dataType: 'json',
        error: function (data) {
            alert("ajax error");
            console.log(data);
            $('.result').html(data.responseText);
        },
        success: function (data) {
            // alert('success ajax');

            if (data.cap_rata_dal > 100) {
                chart_capaian_dal = 100;
            } else {
                chart_capaian_dal = parseInt(data.cap_rata_dal);
            }

            chart_sisa_dal = parseInt(100 - chart_capaian_dal);

            // alert(chart_capaian_dal);
            // alert(chart_sisa_dal);

        }
    });

    var data = google.visualization.arrayToDataTable([
        ['kinerja', 'nilai'],
        ['capaian', chart_capaian_dal],
        ['sisa', chart_sisa_dal],

    ]);

    // Optional; add a title and set the width and height of the chart
    var options = {
        'title': 'Perencanaan Pembangunan Iklim dan Promosi Penanaman Modal',
        is3D: true,
        pieHole: 0.4
    };

    // Display the chart inside the <div> element with id="piechart"
    var chart = new google.visualization.PieChart(document.getElementById('piechart3'));
    chart.draw(data, options);
}

// chart 4
function drawChart4() {

    let chart_capaian_adu = 0;
    let chart_sisa_adu = 0;
    $.ajax({
        async: false,
        url: 'get_chart.php',
        dataType: 'json',
        error: function (data) {
            alert("ajax error");
            console.log(data);
            $('.result').html(data.responseText);
        },
        success: function (data) {
            // alert('success ajax');

            if (data.cap_rata_adu > 100) {
                chart_capaian_adu = 100;
            } else {
                chart_capaian_adu = parseInt(data.cap_rata_adu);
            }

            chart_sisa_adu = parseInt(100 - chart_capaian_adu);

            // alert(chart_capaian_adu);
            // alert(chart_sisa_adu);

        }
    });

    var data = google.visualization.arrayToDataTable([
        ['kinerja', 'nilai'],
        ['capaian', chart_capaian_adu],
        ['sisa', chart_sisa_adu],

    ]);

    // Optional; add a title and set the width and height of the chart
    var options = {
        'title': 'Pengaduan Kebijakan dan Laporan Layanan',
        is3D: true,
        pieHole: 0.4
    };

    // Display the chart inside the <div> element with id="piechart"
    var chart = new google.visualization.PieChart(document.getElementById('piechart4'));
    chart.draw(data, options);
}

// chart5
function drawChart5() {

    let chart_capaian_izi = 0;
    let chart_sisa_izi = 0;
    $.ajax({
        async: false,
        url: 'get_chart.php',
        dataType: 'json',
        error: function (data) {
            alert("ajax error");
            console.log(data);
            $('.result').html(data.responseText);
        },
        success: function (data) {
            // alert('success ajax');

            if (data.cap_rata_izi > 100) {
                chart_capaian_izi = 100;
            } else {
                chart_capaian_izi = parseInt(data.cap_rata_izi);
            }

            chart_sisa_izi = parseInt(100 - chart_capaian_izi);

            // alert(chart_capaian_izi);
            // alert(chart_sisa_izi);

        }
    });

    var data = google.visualization.arrayToDataTable([
        ['kinerja', 'nilai'],
        ['capaian', chart_capaian_izi],
        ['sisa', chart_sisa_izi],

    ]);

    // Optional; add a title and set the width and height of the chart
    var options = {
        'title': 'Pelayanan Perizinan dan Non Perizinan',
        is3D: true,
        pieHole: 0.4
    };

    // Display the chart inside the <div> element with id="piechart"
    var chart = new google.visualization.PieChart(document.getElementById('piechart5'));
    chart.draw(data, options);
}