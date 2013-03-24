<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error '.$code;
$this->breadcrumbs=array(
	'Error '.$code,
);
?>

<div class="error-request">
	<h2>OH NO!! <br/><br/>Has descubierto un ERROR <?php echo $code; ?></h2>
	<p>Esta es la informacion del problema:</p>
	<p><?php echo CHtml::encode($message); ?></p>
	<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/sad.png', 'SadOmNom'); ?>
</div>