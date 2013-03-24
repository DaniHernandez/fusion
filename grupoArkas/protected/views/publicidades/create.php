<?php
/* @var $this PublicidadesController */
/* @var $model Publicidades */

$this->breadcrumbs=array(
	'Publicidades'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Publicidades', 'url'=>array('index')),
	array('label'=>'Manage Publicidades', 'url'=>array('admin')),
);
?>

<h1>Create Publicidades</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>