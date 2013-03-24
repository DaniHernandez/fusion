<?php
/* @var $this SeccionesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Secciones',
);

$this->menu=array(
    array('label'=>'Nueva Seccion', 'url'=>array('/secciones/create')),
    array('label'=>'Administrar Secciones', 'url'=>array('/secciones/admin')),
);

Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/assets/js/jqaccordion.js');
$secciones= Secciones::model()->findAll();
$articulos;
?>

<?php 
if(count($secciones) > 0){
	foreach ($secciones as $seccion) { ?>
		<div class="cabecera">
			<h3><?php echo $seccion->nombre ?></h3>
		</div>
		<div class="contenido">
			<?php $articulos= Articulos::model()->findAll(array(
				'order' => 'rating DESC', 
				'condition'=>'idSeccion=:idSec', 
				'params'=>array(
					':idSec'=>$seccion->idSeccion
					), 
				'limit'=>'5'
				)
			);
			$primera=1;
			if(count($articulos) > 0){
				foreach ($articulos as $articulo){ 
					if($primera === 1){ $primera=0; ?>
						<div class="articulo primero">
				<?php } else{?>
						<div class="articulo">
				<?php }?>
							<?php echo CHtml::link('<img src="'.Yii::app()->request->baseUrl.'/images/articulos/'.$articulo->idArticulo.'/'.$articulo->url.'" alt="'.$articulo->titulo.'"/>', array('articulos/view', 'id'=>$articulo->idArticulo)); ?>
							<div class="descripcion">
								<p class="descripcion-contenido"><?php echo $articulo->titulo ?></p>
							</div>
						</div>									
			<?php }
			}else { ?>
				<div class="sinarticulo">
					<p>Aun no se han creado articulos bajo esta seccion</p>
				</div>
			<?php } ?>
		</div>
<?php }
}else { ?>
	<div class="cabecera centrada">
		<h3>Aun no se han creado secciones</h3>
	</div>
<?php 
} ?>