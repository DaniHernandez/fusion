<?php
/* @var $this PublicidadesController */
/* @var $model Publicidades */

$this->breadcrumbs=array(
	'Publicidades'=>array('index'),
	$model->idPublicidad,
);

$this->menu=array(
	array('label'=>'List Publicidades', 'url'=>array('index')),
	array('label'=>'Create Publicidades', 'url'=>array('create')),
	array('label'=>'Update Publicidades', 'url'=>array('update', 'id'=>$model->idPublicidad)),
	array('label'=>'Delete Publicidades', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idPublicidad),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Publicidades', 'url'=>array('admin')),
);
?>

<h1>View Publicidades #<?php echo $model->idPublicidad; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idPublicidad',
		'url',
		'descripcion',
		'vistas',
	),
)); ?>
