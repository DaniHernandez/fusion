<?php
/* @var $this HoroscopoController */
/* @var $data Horoscopo */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idHoroscopo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idHoroscopo), array('view', 'id'=>$data->idHoroscopo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idSigno')); ?>:</b>
	<?php echo CHtml::encode($data->idSigno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />


</div>