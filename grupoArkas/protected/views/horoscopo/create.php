<?php
/* @var $this HoroscopoController */
/* @var $model Horoscopo */

$this->breadcrumbs=array(
	'Horoscopos'=>array('index'),
	'Nuevo...',
);

$this->menu=array(
	array('label'=>'List Horoscopo', 'url'=>array('index')),
	array('label'=>'Manage Horoscopo', 'url'=>array('admin')),
);
?>

<h1>Create Horoscopo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>