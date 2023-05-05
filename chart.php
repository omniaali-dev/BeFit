<?php
include 'config.php';
// session_start();
$id= $_SESSION['id'];
$current_date=date("Y-m-d" );
$sql="SELECT total_calories FROM healthdata WHERE healthdata.id='$id'";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
 $total_calories=$row['total_calories'];
 $f_total_calories=floatval(str_replace(',','.',str_replace('.', '', $total_calories)));

$sql="SELECT food.date,food.id,COALESCE(SUM(food_calories),0) AS total_food FROM food WHERE DATE(food.date)='$current_date' AND food.id='$id';";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
 $f_total_intake=floatval($row['total_food']);
 if($f_total_intake < 1000){ 
     $f_total_intake=$f_total_intake/ (10**3); //add decimel point before number if it is less than 1000 
     $f_total_intake = round($f_total_intake,3); //round number to 3 decimal digits 
     $remain = ($f_total_calories) - ($f_total_intake);
 
     ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        <style></style>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>

        <div class="chart" style=" min-width: 310px;
  max-width: 800px;
  height: 300px;
" id="container">
        </div>

    </body>

    </html>
    <script>
        Highcharts.chart('container', {
            chart: {


            },
            title: {
                text: ''
            },
            subtitle: {

                text: `<div style='font-size: 30px; '><?php echo $remain ;?></div><p  style="font-size:16px;">Calories Remaining</p>`,
                align: "center",
                verticalAlign: "middle",
                style: {
                    "textAlign": "center"
                },
                x: 0,
                y: -2,
                useHTML: true
            },
            series: [{
                type: 'pie',
                enableMouseTracking: false,
                innerSize: '80%',
                dataLabels: {
                    enabled: false
                },
                colors: ['rgba(255, 124, 4, 1)'],
                data: [{
                    y: <?php echo $f_total_intake ?>
                }, {
                    y: <?php echo $remain?>,
                    color: '#e3e3e3'
                }]
            }]
        });
    </script>
    <?php }
}}
