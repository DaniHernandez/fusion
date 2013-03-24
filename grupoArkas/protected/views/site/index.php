
<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
$articulos= Articulos::model()->findAll((array('order' => 'rating DESC', 'limit'=>'8')));

$this->menu=array(
					array('label'=>'Articulos', 'url'=>array('/articulos/index'), 'items'=>array(
						array('label'=>'Nuevo...', 'url'=>array(
																'/articulos/create')),
						array('label'=>'Administrar', 'url'=>array(
																	'/articulos/admin')))),
					array('label'=>'Publicidad', 'url'=>array('/publicidades/index'),'items'=>array(
						array('label'=>'Nueva...', 'url'=>array(
																'/publicidades/create')),
						array('label'=>'Administrar', 'url'=>array(
																	'/publicidades/admin')))),
					array('label'=>'Encuestas', 'url'=>array('/poll/index'),'items'=>array(
						array('label'=>'Nuevo...', 'url'=>array(
																'/poll/create')),
						array('label'=>'Administrar', 'url'=>array(
																	'/poll/admin')))),
					array('label'=>'Mi Perfil', 'url'=>'#','items'=>array(
						array('label'=>'Modificar Perfil', 'url'=>array(
																		'/usuarios/update')),
						array('label'=>'Administrar', 'url'=>array(
																	'/usuarios/admin'))))
);

?>

<?php if(count($articulos) > 0){?>
		<h2>Lo Mas Recientes</h2>
<?php	foreach ($articulos as $articulo) {
			$this->renderPartial('/articulos/_view',$articulo);
			}
  } else { ?>                                                                      
	<div class="cabecera centrada"><h3>Aun no se han publicado articulos</h3></div>
<?php } ?>
