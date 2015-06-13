
<?php  include './clases/coneccion.php';
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>RESULTADOS EN LINEA</title>

        <script type="text/javascript" src="./jquery.min.js"></script>
        <style type="text/css">
${demo.css}
        </style>
        <link href="./css/estilos.css" rel="stylesheet" type="text/css">
        <script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'ELECCIONES ASAMBLEA LEGISLATIVA'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'skyblue'
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'RESULTADOS ASAMBLEA LEGISLATIVA',
            data: [
            <?php  $db = new conect_Mysql();
            $sql= "SELECT * FROM diputado WHERE clicks";
              $que = $db->execute($sql);
              while ($row= $db-> fetch_row($que)){ ?>
                ['<?php echo $row['nombre'] ?>',  <?php echo $row['clicks'] ?>],
              <?php  } ?>
              ]
        }]
    });
});


        </script>
    </head>
    <body>

<script src="js/highcharts.js"></script>
<script src="js/modules/exporting.js"></script>

<div id="container" style="min-width: 800px; height: 500px; max-width: 800px; margin: 0 auto"></div>
<center>

    </body>
</html>