<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */
$this->pageTitle=Yii::app()->name . ' - Contactenos';
$this->breadcrumbs=array(
	'Contactenos',
);
?>

<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12">
			<?php if(Yii::app()->user->hasFlash('contact')): ?>
				<div class="alert alert-success">
					<h4>Mensaje Enviado!</h4>
					<?php echo Yii::app()->user->getFlash('contact'); ?>
				</div>
			<?php else: ?>
			<div class="row-fluid">
				<div class="span12 text-center">							
				<h3>¿Preguntas o Sugerencias?</h3>
				<p>Si tienes alguna consulta o sugerencia, llena el siguiente formulario, nos pondremos en contacto contigo cuanto antes.</p>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12 text-center">
					<?php $this->widget('bootstrap.widgets.TbLabel', array(
					    'type'=>'warning',
					    'label'=>'Recuerda :',
					)); ?> los campos con <span class="required">*</span> no pueden quedar en blanco.				
				</div>
			</div>
			<div class="row-fluid">
				<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
				    'id'=>'login-form',
				    'enableClientValidation'=>true,
					'clientOptions'=>array(
						'validateOnSubmit'=>true,
					),
					'htmlOptions'=>array('class'=>'span6 offset3 well')
				)); ?>
				<?php echo $form->errorSummary($model,'Encontramos algunos errores:', 'Corrigelos y vuelve a intentarlo...'); ?>
				<?php echo $form->textFieldRow($model, 'name', array('class'=>'span12', )); ?>
				<?php echo $form->textFieldRow($model, 'email', array('class'=>'span12', )); ?>
				<?php echo $form->textFieldRow($model, 'subject', array('class'=>'span12', )); ?>
				<?php echo $form->textAreaRow($model, 'body', array('class'=>'span12', 'rows'=>5)); ?>
				<?php if(CCaptcha::checkRequirements()): ?>
				<?php echo $form->textFieldRow($model, 'verifyCode', array('class'=>'span12',)); ?>
				<div class="row-fluid">
					<div class="span4">
						<?php $this->widget('CCaptcha', array('clickableImage'=>'true', 'buttonLabel'=>'')); ?>
					</div>
					<div class="span8">
						<p class="hint">Ingresa las letras que aparecen en la imagen.<br/> 
						No se distingue entre MAYUSCULAS o minisculas.</p>
					</div>
				</div>
				<?php endif; ?>
				<div class="row-fluid">
					<div class="span12">
						<?php $this->widget('bootstrap.widgets.TbButton', array(
												'buttonType'=>'submit', 
												'type'=>'primary', 'block'=>true,
												'label'=>'Enviar', 
												'icon'=>'envelope white',						
						)); 
						?>
					</div>
				</div>				
				<?php $this->endWidget(); ?>
			</div>
			<?php endif; ?>
		</div>
	</div>
</div>