<?php
/* @var $this HoroscopoController */
/* @var $model Horoscopo */

$this->breadcrumbs=array(
	'Horoscopos'=>array('index'),
	$model->idHoroscopo=>array('view','id'=>$model->idHoroscopo),
	'Update',
);

$this->menu=array(
	array('label'=>'List Horoscopo', 'url'=>array('index')),
	array('label'=>'Create Horoscopo', 'url'=>array('create')),
	array('label'=>'View Horoscopo', 'url'=>array('view', 'id'=>$model->idHoroscopo)),
	array('label'=>'Manage Horoscopo', 'url'=>array('admin')),
);
?>

<h1>Update Horoscopo <?php echo $model->idHoroscopo; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>