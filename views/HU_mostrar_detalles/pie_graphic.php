<?php
$ganador_consulta = $con->query(
    "SELECT * FROM opcion WHERE cantidad_votos = (
        SELECT MAX(cantidad_votos) FROM opcion 
        where votacion_id = $id) and votacion_id = $id");
?>

<style type="text/css">
.highcharts-figure,
.highcharts-data-table table {
    min-width: 320px;
    max-width: 800px;
    margin: 1em auto;
}

.highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #ebebeb;
    margin: 10px auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
}

.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}

.highcharts-data-table th {
    font-weight: 600;
    padding: 0.5em;
}

.highcharts-data-table td,
.highcharts-data-table th,
.highcharts-data-table caption {
    padding: 0.5em;
}

.highcharts-data-table thead tr,
.highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
}

.highcharts-data-table tr:hover {
    background: #f1f7ff;
}

input[type="number"] {
    min-width: 50px;
}

		</style>
<script src="code/highcharts.js"></script>
<script src="code/modules/exporting.js"></script>
<script src="code/modules/export-data.js"></script>
<script src="code/modules/accessibility.js"></script>


<figure class="highcharts-figure">
    <div id="container"></div>
    <?php 
    if (mysqli_num_rows($ganador_consulta) == 1) {
        $fila = mysqli_fetch_array($ganador_consulta);
        $nombre_ganador = $fila['nombre'];
        ?>
        <p class="highcharts-description">La opción ganadora es: <strong><?php echo($nombre_ganador) ?></strong>.</p>
    <?php
    } else {
        $nombre_ganador = 'Empate';
        ?>
        <p class="highcharts-description">Se produjo un empate.</p>
    <?php } ?>
    
</figure>



		<script type="text/javascript">
Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Resultados:'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
            }
        }
    },
    series: [{
        name: 'Votos',
        colorByPoint: true,
        data: 
        [<?php foreach($opciones as $row): ?>{
            name: '<?= $row['nombre'] ?>',
            y: <?= $row['cantidad_votos'] ?>
        }, <?php endforeach; ?>]
    }]
});
		</script>
