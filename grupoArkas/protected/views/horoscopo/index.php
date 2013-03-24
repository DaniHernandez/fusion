<?php
/* @var $this HoroscopoController */
/* @var $dataProvider CActiveDataProvider */

Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl.'/css/baraja.css', 'screen');
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/assets/js/modernizr.custom.js');
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/assets/js/jquery.baraja.js');
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/assets/js/horoscopo.js');

$this->breadcrumbs=array(
	'Horoscopo'=>array('index'),
);

$this->menu=array(
	array('label'=>'Nuevo horoscopo', 'url'=>array('create')),
	array('label'=>'Administrar horoscopos', 'url'=>array('admin')),
);
?>

<div class="topmenu">
	<span id="nav-prev"></span>
	<span id="nav-circle"></span>
	<span id="nav-shell"></span>
	<span id="nav-next"></span>
</div>

<div class="baraja">
	<ul id="baraja-el" class="baraja-container">
		<?php foreach ($data as $horoscopo){ ?>
				<li>
					<img src= <?php echo Yii::app()->request->baseUrl.'/images/signos/'.$horoscopo->idSigno0->url ?> alt= <?php $horoscopo->idSigno0->nombre ?>/>
					<h4><?php echo $horoscopo->idSigno0->nombre ?></h4>
					<p><?php echo $horoscopo->descripcion ?></p>
				</li>
		<?php } ?>
	</ul>
</div>
