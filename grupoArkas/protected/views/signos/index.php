<?php
/* @var $this SignosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Signoses',
);

$this->menu=array(
	array('label'=>'Create Signos', 'url'=>array('create')),
	array('label'=>'Manage Signos', 'url'=>array('admin')),
);
?>

<h1>Signoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
