<?php

$koneksi    = mysqli_connect("localhost", "root", "", "db_pelimask");
$jumlahmasker  = mysqli_query($koneksi, "SELECT jumlah_masker FROM t_sampah order by id_sampah asc");
$mingguke       = mysqli_query($koneksi, "SELECT minggu_ke FROM t_sampah order by id_sampah asc");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Grafik Lingkaran</title>
    <script src="js/chart.js"></script>
    <style type="text/css">
            .container {
                width: 50%;
                margin: 15px auto;
            }
    </style>
  </head>
  <body>

    <div class="container">
        <canvas id="piechart" width="100%" height="100"></canvas>
    </div>

  </body>
</html>

<script  type="text/javascript">
  var ctx = document.getElementById("piechart").getContext("2d");
  var data = {
            labels: [<?php while ($p = mysqli_fetch_array($mingguke)) { echo '"' . $p['minggu_ke'] . '",';}?>],
            datasets: [
            {
              label: "Jumlah Masker Per-Minggu",
              data: [<?php while ($p = mysqli_fetch_array($jumlahmasker)) { echo '"' . $p['jumlah_masker'] . '",';}?>],
              backgroundColor: [
                '#29B0D0',
                '#2A516E',
                '#F07124',
                '#CBE0E3',
                '#979193'
              ]
            }
            ]
            };

  var myPieChart = new Chart(ctx, {
                  type: 'doughnut',
                  data: data,
                  options: {
                    responsive: true
                }
              });

</script>