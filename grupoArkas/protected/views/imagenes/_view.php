<?php
/* @var $this ImagenesController */
/* @var $data Imagenes */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idImagen')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idImagen), array('view', 'id'=>$data->idImagen)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idArticulo')); ?>:</b>
	<?php echo CHtml::encode($data->idArticulo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('url')); ?>:</b>
	<?php echo CHtml::encode($data->url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titulo')); ?>:</b>
	<?php echo CHtml::encode($data->titulo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />


</div>