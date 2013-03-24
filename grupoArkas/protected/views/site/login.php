<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/** @var BootActiveForm $form */

$this->pageTitle=Yii::app()->name . ' - Iniciar Sesion';
$this->breadcrumbs=array(
	'Iniciar Sesion',
);
?>

<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12">
			<div class="row-fluid">
				<div class="span12 text-center">							
				<h3>Hola Administrador!</h3>
				<p>Ingresa tus datos en este formulario para iniciar sesion:</p>
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
					'htmlOptions'=>array('class'=>'span4 offset4 well')
				)); ?>

				<?php echo $form->textFieldRow($model, 'username', array('hint'=>'Pssst... prueba con ( <i>admin / admin</i> )', 'class'=>'span12')); ?>
				<?php echo $form->passwordFieldRow($model, 'password', array('class'=>'span12')); ?>
				<?php echo $form->checkboxRow($model, 'rememberMe'); ?>
				<div class="row-fluid">
					<div class="span12">
						<?php $this->widget('bootstrap.widgets.TbButton', array(
												'buttonType'=>'submit', 
												'type'=>'primary', 'block'=>true,
												'label'=>'Ingresar', 
												'icon'=>'user white',

						)); ?>
					</div>
				</div>
				<?php $this->endWidget(); ?>
			</div>
		</div>
	</div>
</div>
