<?php
/* @var $this ArticulosController */
/* @var $model Articulos */

$this->breadcrumbs=array(
	'Articulos'=>array('index'),
	'Nuevo...',
);

$this->menu=array(
	array('label'=>'Ver todos los articulos', 'url'=>array('index')),
	array('label'=>'Administrar articulos', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
