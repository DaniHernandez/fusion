<?php
/* @var $this SignosController */
/* @var $data Signos */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idSigno')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idSigno), array('view', 'id'=>$data->idSigno)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('url')); ?>:</b>
	<?php echo CHtml::encode($data->url); ?>
	<br />


</div>