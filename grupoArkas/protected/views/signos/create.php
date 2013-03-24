<?php
/* @var $this SignosController */
/* @var $model Signos */

$this->breadcrumbs=array(
	'Signoses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Signos', 'url'=>array('index')),
	array('label'=>'Manage Signos', 'url'=>array('admin')),
);
?>

<h1>Create Signos</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>