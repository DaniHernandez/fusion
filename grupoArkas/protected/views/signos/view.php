<?php
/* @var $this SignosController */
/* @var $model Signos */

$this->breadcrumbs=array(
	'Signoses'=>array('index'),
	$model->idSigno,
);

$this->menu=array(
	array('label'=>'List Signos', 'url'=>array('index')),
	array('label'=>'Create Signos', 'url'=>array('create')),
	array('label'=>'Update Signos', 'url'=>array('update', 'id'=>$model->idSigno)),
	array('label'=>'Delete Signos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idSigno),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Signos', 'url'=>array('admin')),
);
?>

<h1>View Signos #<?php echo $model->idSigno; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idSigno',
		'nombre',
		'url',
	),
)); ?>
