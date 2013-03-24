<?php
/* @var $this ArticulosController */
/* @var $model Articulos */

$this->breadcrumbs=array(
	'Articulos'=>array('index'),
	$model->nombre=>array('view','id'=>$model->idArticulo),
	'Editando...'
);

$this->menu=array(
	array('label'=>'Ver todos los articulos', 'url'=>array('index')),
	array('label'=>'Nuevo articulo', 'url'=>array('create')),
	array('label'=>'Ver este articulo', 'url'=>array('view', 'id'=>$model->idArticulo)),
	array('label'=>'Administrar articulos', 'url'=>array('admin')),
);
?>

<h1>Update Articulos <?php echo $model->idArticulo; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>