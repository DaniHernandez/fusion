<?php
/* @var $this PublicidadesController */
/* @var $data Publicidades */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idPublicidad')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idPublicidad), array('view', 'id'=>$data->idPublicidad)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('url')); ?>:</b>
	<?php echo CHtml::encode($data->url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vistas')); ?>:</b>
	<?php echo CHtml::encode($data->vistas); ?>
	<br />


</div>