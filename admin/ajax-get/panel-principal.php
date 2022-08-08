<?php
error_reporting(0);
include("../class/allClass.php");

$id_area = filter_input(INPUT_POST, 'id_area', FILTER_SANITIZE_NUMBER_INT);


use nsroot\root;
use nsfunciones\funciones;
use nsalmacen\almacen;

$infofotos      = new almacen();
$infoAlmacen    = new root();
$fn             = new funciones();

//Esta es información para usuarios administradores
$solicitudes    = $infoAlmacen->obtener_solicitudes($id_area);
$csolicitudes   = $fn->cuentarray($solicitudes);

$stock          = $infoAlmacen->obtener_materiales_por_agotarse($id_area);
$cstock         = $fn->cuentarray($stock);

$prestamos      = $infoAlmacen->obtener_materiales_prestados($id_area);
$cprestamos     = $fn->cuentarray($prestamos);

$transfers      = $infoAlmacen->obtener_transferencias_en_curso($id_area);
$ctransfers     = $fn->cuentarray($transfers);

$areas          = $infofotos-> obtener_areas();
$careas         = $fn -> cuentarray($areas);

//Consulta de graficas
$top6           = $infoAlmacen -> top6_mas_solicitados($id_area);
$activos        = $infoAlmacen -> productos_activos($id_area);
$gatosdelmes    = $infoAlmacen -> gastos_del_mes($id_area);
$grafia_anio    = $infoAlmacen -> grafica_gasto_año($id_area);
$cgrafia_anio   = $fn          -> cuentarray($grafia_anio);

$gasto = 0;
for($i = 0;$i < count($gatosdelmes); $i++){
    $gasto = $gasto + $gatosdelmes['total'][$i];
}

?>
<div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Hola <?php echo $_SESSION['nombre']; ?>, <span>Bienvenid@ de nuevo al sistema de inventario</span></h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <section id="main-content">
                    <!-- /# row -->
                    <div class="row card">
                        <div class="row">
                            <div class="col-sm-6">
                                <label>¿Necesita ver toda esta información de un area en especifico? Solo seleccione el area en el siguiente listado </label>
                                <select name="id_area" class="form-control" id="id_area" onchange="obtener_info_area(this.value);">
                                    <option value="0" selected>Seleccione un area</option>
                                    <?php for($i = 0; $i < $careas; $i++){ ?>
                                        <option value="<?php echo $areas['id'][$i] ?>" <?php echo $id_area == $areas['id'][$i] ? 'selected' : ''; ?>><?php echo utf8_decode($areas['nombre'][$i]); ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row card">
                        <h4>Top 6 materiales mas solicitados</h4>
                        <div class="col-lg-2">
                            <div class="card p-0">
                                <div class="stat-widget-three home-widget-three">
                                    <div class="stat-icon bg-danger" style="padding: 0;">
                                        <?php $fototop1 = $infofotos -> obtener_fotos_prestamo('upload/materiales/'.$top6['id_producto'][0]); ?>
                                        <img src="<?php echo file_get_contents($fototop1["archivo"][0]) ? $fototop1["archivo"][0] : 'upload/generales/not-found-img.png'; ?>"  class="responsive" style="width: 100px;height: 85px;" />
                                    </div>
                                    <div class="stat-content">
                                        <div class="stat-digit"><?php echo isset($top6['total'][0]) ? $top6['total'][0] : 'Sin información'; ?></div>
                                        <div class="stat-text"><?php echo isset($top6['nombre'][0]) ? $top6['nombre'][0] : 'Sin información'; ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="card p-0">
                                <div class="stat-widget-three home-widget-three">
                                    <div class="stat-icon bg-danger" style="padding: 0;">
                                        <?php $fototop1 = $infofotos -> obtener_fotos_prestamo('upload/materiales/'.$top6['id_producto'][1]); ?>
                                        <img src="<?php echo file_get_contents($fototop1["archivo"][0]) ? $fototop1["archivo"][0] : 'upload/generales/not-found-img.png'; ?>"  class="responsive" style="width: 100px;height: 85px;" />
                                    </div>
                                    <div class="stat-content">
                                        <div class="stat-digit"><?php echo isset($top6['total'][1]) ? $top6['total'][1] : 'Sin información'; ?></div>
                                        <div class="stat-text"><?php echo isset($top6['nombre'][1]) ? $top6['nombre'][1] : 'Sin información'; ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="card p-0">
                                <div class="stat-widget-three home-widget-three">
                                    <div class="stat-icon bg-danger" style="padding: 0;">
                                        <?php $fototop1 = $infofotos -> obtener_fotos_prestamo('upload/materiales/'.$top6['id_producto'][2]); ?>
                                        <img src="<?php echo file_get_contents($fototop1["archivo"][0]) ? $fototop1["archivo"][0] : 'upload/generales/not-found-img.png'; ?>"  class="responsive" style="width: 100px;height: 85px;" />
                                    </div>
                                    <div class="stat-content">
                                        <div class="stat-digit"><?php echo isset($top6['total'][2]) ? $top6['total'][2] : 'Sin información'; ?></div>
                                        <div class="stat-text"><?php echo isset($top6['nombre'][2]) ? $top6['nombre'][2] : 'Sin información'; ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="card p-0">
                                <div class="stat-widget-three home-widget-three">
                                    <div class="stat-icon bg-danger" style="padding: 0;">
                                        <?php $fototop1 = $infofotos -> obtener_fotos_prestamo('upload/materiales/'.$top6['id_producto'][3]); ?>
                                        <img src="<?php echo file_get_contents($fototop1["archivo"][0]) ? $fototop1["archivo"][0] : 'upload/generales/not-found-img.png'; ?>"  class="responsive" style="width: 100px;height: 85px;" />
                                    </div>
                                    <div class="stat-content">
                                        <div class="stat-digit"><?php echo isset($top6['total'][3]) ? $top6['total'][3] : 'Sin información'; ?></div>
                                        <div class="stat-text"><?php echo isset($top6['nombre'][3]) ? $top6['nombre'][3] : 'Sin información'; ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="card p-0">
                                <div class="stat-widget-three home-widget-three">
                                    <div class="stat-icon bg-danger" style="padding: 0;">
                                        <?php $fototop1 = $infofotos -> obtener_fotos_prestamo('upload/materiales/'.$top6['id_producto'][4]); ?>
                                        <img src="<?php echo file_get_contents($fototop1["archivo"][0]) ? $fototop1["archivo"][0] : 'upload/generales/not-found-img.png'; ?>"  class="responsive" style="width: 100px;height: 85px;" />
                                    </div>
                                    <div class="stat-content">
                                        <div class="stat-digit"><?php echo isset($top6['total'][4]) ? $top6['total'][4] : 'Sin información'; ?></div>
                                        <div class="stat-text"><?php echo isset($top6['nombre'][4]) ? $top6['nombre'][4] : 'Sin información'; ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="card p-0">
                                <div class="stat-widget-three home-widget-three">
                                    <div class="stat-icon bg-danger" style="padding: 0;">
                                        <?php $fototop1 = $infofotos -> obtener_fotos_prestamo('upload/materiales/'.$top6['id_producto'][5]); ?>
                                        <img src="<?php echo file_get_contents($fototop1["archivo"][0]) ? $fototop1["archivo"][0] : 'upload/generales/not-found-img.png'; ?>"  class="responsive" style="width: 100px;height: 85px;" />
                                    </div>
                                    <div class="stat-content">
                                        <div class="stat-digit"><?php echo isset($top6['total'][5]) ? $top6['total'][5] : 'Sin información'; ?></div>
                                        <div class="stat-text"><?php echo isset($top6['nombre'][5]) ? $top6['nombre'][5] : 'Sin información'; ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row card">
                        <div class="col-lg-8">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="stat-widget-one">
                                        <div class="stat-icon dib"><i class="ti-money color-success border-success"></i>
                                        </div>
                                        <div class="stat-content dib">
                                            <div class="stat-text">Total gasto del mes</div>
                                            <div class="stat-digit">$<?php echo number_format($gasto,2,'.',','); ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-lg-3">
                                <div class="card">
                                    <div class="stat-widget-one">
                                        <div class="stat-icon dib"><i class="ti-user color-primary border-primary"></i>
                                        </div>
                                        <div class="stat-content dib">
                                            <div class="stat-text">New Customer</div>
                                            <div class="stat-digit">961</div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="stat-widget-one">
                                        <div class="stat-icon dib"><i class="ti-layout-grid2 color-pink border-pink"></i>
                                        </div>
                                        <div class="stat-content dib">
                                            <div class="stat-text">Materiales activos</div>
                                            <div class="stat-digit"><?php echo $activos['disponibles'][0] ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-lg-3">
                                <div class="card">
                                    <div class="stat-widget-one">
                                        <div class="stat-icon dib"><i class="ti-link color-danger border-danger"></i></div>
                                        <div class="stat-content dib">
                                            <div class="stat-text">Referral</div>
                                            <div class="stat-digit">2,781</div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-title">
                                        <h4>Grafica de gastos mensuales</h4>

                                    </div>
                                    <div class="card-body">
                                        <figure class="highcharts-figure">
                                            <div id="container"></div>
                                            <p class="highcharts-description">
                                                Esta grafica muestra los gastos totales que se hicieron por mes, no desgloza en que materiales pero todo Material
                                                que entro por factura sera graficado en este apartado.
                                            </p>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="col-lg-12">
                                <div class="card" style="height: 66.5rem;">
                                    <div class="card-body">
                                        <div class="year-calendar"></div>
                                    </div>
                                </div>
                                <!-- /# card -->
                            </div>
                        </div>
                    </div>
                    <div class="main-content">
                        <?php if($_SESSION['nivel'] == 1 || $_SESSION['nivel'] == 99){ ?>
                        <div class="row ">
                            <div class="col-sm-12 card">
                                <h3 class="text-center">Listado de solicitudes</h3>
                                <div class="card-body">
                                    <div class="table-responsive" id="content"> 
                                        <table class="table student-data-table m-t-20" id="tabla1">
                                            <thead>
                                                <tr>
                                                    <th> # </th>
                                                    <th> Solicitante </th>
                                                    <th> Fecha de solicitud </th>
                                                    <th> Hora de solicitud </th>
                                                    <th> Clave de solicitud </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php for($i = 0,$a=0; $i < $csolicitudes; $i++){ $a = $a+1; ?>
                                                <tr onclick="universalLoad(this)" data-postload="0" data-returnpage="pr-inicio" data-form="" data-page="salida-prestamo-edit" data-carpeta="ajax-edit" data-load="contenedor" data-valores="" data-id="<?php echo $solicitudes['clave_solicitud'][$i]; ?>">
                                                    <td class="btn-info"><?php echo $a; ?></td>
                                                    <td class="btn-info"><?php echo $solicitudes['nombre'][$i]; ?></td>
                                                    <td class="btn-info"><?php echo $solicitudes['fecha'][$i]; ?></td>
                                                    <td class="btn-info"><?php echo $solicitudes['hora'][$i]; ?></td>
                                                    <td class="btn-info"><?php echo $solicitudes['clave_solicitud'][$i]; ?></td>
                                                </tr>
                                            <?php } ?>    
                                            </tbody>    
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 card">
                                <h3 class="text-center">Listado de materiales por agotarse o agotados</h3>
                                <div class="card-body">
                                    <div class="table-responsive" id="content">
                                        <table class="table student-data-table m-t-20" id="tabla2">
                                            <thead>
                                                <tr>
                                                    <th> # </th>
                                                    <th> Producto/Material </th>
                                                    <th> Cantidad </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php for($i = 0,$a=0; $i < $cstock; $i++){ $a = $a+1; ?>
                                                <tr>
                                                    <td class="btn-danger"><?php echo $a; ?></td>
                                                    <td class="btn-danger"><?php echo $stock['nombre'][$i]; ?></td>
                                                    <td class="btn-danger"><?php echo $stock['cantidad'][$i]; ?></td>
                                                </tr>
                                            <?php } ?>    
                                            </tbody>    
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-sm-12 card">
                                <h3 class="text-center">Lista de materiales prestados</h3>
                                <div class="card-body">
                                    <div class="table-responsive" id="content">
                                        <table class="table student-data-table m-t-20" id="tabla3">
                                            <thead>
                                                <tr>
                                                    <th> Solicitante </th>
                                                    <th> Material </th>
                                                    <th> Fecha/Hora </th>
                                                    <th> Clave </th>
                                                    <th> Cantidad </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php for($i = 0,$a=0; $i < $cprestamos; $i++){ ?>
                                                <tr>
                                                    <td class="btn-warning"><?php echo $prestamos['usuario'][$i]; ?></td>
                                                    <td class="btn-warning"><?php echo $prestamos['nombre'][$i]; ?></td>
                                                    <td class="btn-warning"><?php echo $prestamos['fecha'][$i].'-/-'.$prestamos['hora'][$i]; ?></td>
                                                    <td class="btn-warning"><?php echo $prestamos['clave_solicitud'][$i]; ?></td>
                                                    <td class="btn-warning"><?php echo $prestamos['cantidad_prestada'][$i]; ?></td>
                                                </tr>
                                            <?php } ?>    
                                            </tbody>    
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 card">
                                <h3 class="text-center">Transferencias en curso</h3>
                                <div class="card-body">
                                    <div class="table-responsive" id="content">
                                        <table class="table student-data-table m-t-20" id="tabla4">
                                            <thead>
                                                <tr>
                                                    <th> # </th>
                                                    <th> Origen </th>
                                                    <th> Destino </th>
                                                    <th> Clave de envio </th>
                                                    <th> Reporte </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php for($i = 0,$a=0; $i < $ctransfers; $i++){ $a = $a+1;  ?>
                                                <tr>
                                                    <td class="btn-success"><?php echo $a; ?></td>
                                                    <td class="btn-success"><?php echo $transfers['campus_origen'][$i]; ?></td>
                                                    <td class="btn-success"><?php echo $transfers['campus_destino'][$i]; ?></td>
                                                    <td class="btn-success"><?php echo $transfers['codigo_transfer'][$i]; ?></td>
                                                    <td class="text-center btn-success"><i class="btn btn-danger fas fa-file-pdf" onclick="generarreporte('<?php echo $transfers['codigo_transfer'][$i]; ?>');"></i></td>
                                                </tr>
                                            <?php } ?>    
                                            </tbody>    
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <?php if($_SESSION['area'] == 4){ ?>
                        <div class="row ">
                            <div class="col-sm-12 card">
                                <h3 class="text-center">Envios asignado</h3>
                                <div class="card-body">
                                    <div class="table-responsive" id="content">
                                        <table class="table student-data-table m-t-20" id="tabla1">
                                            <thead>
                                                <tr>
                                                    <th> # </th>
                                                    <th> Origen </th>
                                                    <th> Destino </th>
                                                    <th> Clave de envio </th>
                                                    <th> Reporte </th>
                                                    <th> Iniciar viaje </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php for($i = 0,$a=0; $i < $cmisenvios; $i++){ $a = $a+1; ?>
                                                <tr>
                                                    <td class="btn-primary"><?php echo $a; ?></td>
                                                    <td class="btn-primary"><?php echo $misenvios['campus_origen'][$i]; ?></td>
                                                    <td class="btn-primary"><?php echo $misenvios['campus_destino'][$i]; ?></td>
                                                    <td class="btn-primary"><?php echo $misenvios['codigo_transfer'][$i]; ?></td>
                                                    <td class="text-center btn-primary"><i class="btn btn-danger fas fa-file-pdf" onclick="generarreporte('<?php echo $misenvios['codigo_transfer'][$i]; ?>');"></i></td>
                                                    <td class="btn-primary"><input type="button" id="validacion" class="btn btn-info" value="iniciar viaje" onclick="validarviaje('<?php echo $misenvios['codigo_transfer'][$i]; ?>');"></td>
                                                </tr>
                                            <?php } ?>    
                                            </tbody>    
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 card">
                                <h3 class="text-center">Envios Finalizados</h3>
                                <div class="card-body">
                                    <div class="table-responsive" id="content">
                                        <table class="table student-data-table m-t-20" id="tabla2">
                                            <thead>
                                                <tr>
                                                    <th> # </th>
                                                    <th> Origen </th>
                                                    <th> Destino </th>
                                                    <th> Clave de envio </th>
                                                    <th> Reporte </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php for($i = 0,$a=0; $i < $cmisenviosfin; $i++){ $a = $a+1; ?>
                                                <tr>
                                                    <td class="btn-success"><?php echo $a; ?></td>
                                                    <td class="btn-success"><?php echo $misenviosfin['campus_origen'][$i]; ?></td>
                                                    <td class="btn-success"><?php echo $misenviosfin['campus_destino'][$i]; ?></td>
                                                    <td class="btn-success"><?php echo $misenviosfin['codigo_transfer'][$i]; ?></td>
                                                    <td class="text-center btn-success"><i class="btn btn-danger fas fa-file-pdf" onclick="generarreporte('<?php echo $misenvios['codigo_transfer'][$i]; ?>');"></i></td>
                                                </tr>
                                            <?php } ?>    
                                            </tbody>    
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="row">
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!-- scripts para graficas -->
	<script>
		Highcharts.chart('container', {
			chart: {
				zoomType: 'xy'
			},
			title: {
				text: 'Grafica de gastos mensuales'
			},
			subtitle: {
				text: 'Area: <?php echo $_SESSION['area']; ?>'
			},
			xAxis: [{
                categories: [<?php for($g = 0; $g < $cgrafia_anio; $g++){ ?>"<?php echo $grafia_anio['Mes'][$g] ?>",<?php } ?>],
				crosshair: true
			}],
			yAxis: [{ // Primary yAxis
				labels: {
                    format: '{value}',
                    style: {
                        color: Highcharts.getOptions().colors[1]
                    }
				},
				title: {
                    text: 'Gasto',
                    style: {
                        color: Highcharts.getOptions().colors[1]
                    }
				}
			}],
			tooltip: {
				shared: true
			},
			legend: {
				layout: 'vertical',
				align: 'left',
				x: 120,
				verticalAlign: 'top',
				y: 100,
				floating: true,
				backgroundColor:
				Highcharts.defaultOptions.legend.backgroundColor || // theme
				'rgba(255,255,255,0.25)'
			},
			series: [{
				name: 'Total',
				type: 'column',
				tooltip: {
					valueSuffix: '$'
				},
				data: [<?php for($g = 0; $g < $cgrafia_anio; $g++){ ?>Number(<?php echo number_format($grafia_anio['total'][$g],2,'.',''); ?>),<?php } ?>]
			}]
		});
	</script>
    <script>
        function obtener_info_area(value){
            var id = value;
            $.ajax({
                type: 'POST',
                url: 'ajax-get/panel-principal',
                data: {id_area: id},
                success: function(response){
                    $('#contenedor').html(response);
                }
            })
        }
    </script>