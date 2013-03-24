<?php
/* @var $this SeccionesController */
/* @var $model Secciones */

$this->breadcrumbs=array(
	'Secciones'=>array('index'),
	$model->idSeccion=>array('view','id'=>$model->idSeccion),
	'Update',
);

$this->menu=array(
	array('label'=>'List Secciones', 'url'=>array('index')),
	array('label'=>'Create Secciones', 'url'=>array('create')),
	array('label'=>'View Secciones', 'url'=>array('view', 'id'=>$model->idSeccion)),
	array('label'=>'Manage Secciones', 'url'=>array('admin')),
);
?>

<h1>Update Secciones <?php echo $model->idSeccion; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>