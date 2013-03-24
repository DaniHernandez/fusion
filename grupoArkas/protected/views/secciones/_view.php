<?php
/* @var $this SeccionesController */
/* @var $data Secciones */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idSeccion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idSeccion), array('view', 'id'=>$data->idSeccion)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />


</div>