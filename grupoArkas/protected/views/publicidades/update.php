<?php
/* @var $this PublicidadesController */
/* @var $model Publicidades */

$this->breadcrumbs=array(
	'Publicidades'=>array('index'),
	$model->idPublicidad=>array('view','id'=>$model->idPublicidad),
	'Update',
);

$this->menu=array(
	array('label'=>'List Publicidades', 'url'=>array('index')),
	array('label'=>'Create Publicidades', 'url'=>array('create')),
	array('label'=>'View Publicidades', 'url'=>array('view', 'id'=>$model->idPublicidad)),
	array('label'=>'Manage Publicidades', 'url'=>array('admin')),
);
?>

<h1>Update Publicidades <?php echo $model->idPublicidad; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>