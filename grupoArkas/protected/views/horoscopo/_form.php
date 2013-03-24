<?php
/* @var $this HoroscopoController */
/* @var $model Horoscopo */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'horoscopo-form',
	'enableAjaxValidation'=>false,
)); 

$list = CHtml::listData(Signos::model()->findAll(),'idSigno', 'nombre');
?>

	<p class="note">Los campos <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idSigno'); ?>
		<?php echo $form->dropDownList($model, 'idSigno', $list, array('empty' => 'Selecciona un signo')); ?>
		<?php echo $form->error($model,'idSigno'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textArea($model,'descripcion',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'descripcion'); ?>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->