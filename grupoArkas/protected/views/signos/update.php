<?php
/* @var $this SignosController */
/* @var $model Signos */

$this->breadcrumbs=array(
	'Signoses'=>array('index'),
	$model->idSigno=>array('view','id'=>$model->idSigno),
	'Update',
);

$this->menu=array(
	array('label'=>'List Signos', 'url'=>array('index')),
	array('label'=>'Create Signos', 'url'=>array('create')),
	array('label'=>'View Signos', 'url'=>array('view', 'id'=>$model->idSigno)),
	array('label'=>'Manage Signos', 'url'=>array('admin')),
);
?>

<h1>Update Signos <?php echo $model->idSigno; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>