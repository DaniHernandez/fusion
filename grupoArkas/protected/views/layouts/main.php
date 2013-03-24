<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href= "css/styles.css" />

	<?php Yii::app()->bootstrap->register(); ?>

	<link rel="stylesheet" href="http://blueimp.github.com/Bootstrap-Image-Gallery/css/bootstrap-image-gallery.min.css">
	<!-- Shim to make HTML5 elements usable in older Internet Explorer versions -->
	<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>

<body>

	<!-- <div id="header">
		<div id="logo">
			<img src= <?php echo Yii::app()->request->baseUrl."/images/banner.png"?> alt="Arkas Group" />
		</div>
	</div>  header -->

	<?php 
	$secciones= Secciones::model()->findAll();
	$seccionesArr= array(array('label'=>'Ver Todas', 'url'=>array('/secciones/index')),'---', array('label'=>'Secciones'));
	foreach ($secciones as $seccion) {
		$seccionesArr[]=array('label'=>$seccion->nombre, 'url'=>array('/secciones/view', 'id'=>$seccion->idSeccion));
	}
	$this->widget('bootstrap.widgets.TbNavbar',array(
	'type'=>'inverse',
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
				array('label'=>'Inicio', 'url'=>array('/site/index')),
				array('label'=>'Secciones', 'url'=>array('/secciones/index'), 'items'=>$seccionesArr),
				array('label'=>'Horoscopo', 'url'=>array('/horoscopo/index')),
				array('label'=>'Contacto', 'url'=>array('/site/contact')),
				array('label'=>'Administrar', 'url'=>array('/site/index'), 'visible'=>!Yii::app()->user->isGuest, 'items'=>$this->menu)
				),
			),
        '<form class="navbar-search pull-right" action="">
    		<input type="text" class="search-query span2" placeholder="Buscar...">   			
    	</form>',
		),
	)); ?>

<div class="container-fluid clear-top">
	<div class="row-fluid">
		<div class="span9" id="page">
			<?php if(isset($this->breadcrumbs)):?>
				<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
					'links'=>$this->breadcrumbs,
					'homeLink' => CHtml::link('Inicio', Yii::app()->homeUrl),
				)); ?><!-- breadcrumbs -->
			<?php endif?>

			<?php echo $content; ?>

			<!-- modal-gallery is the modal dialog used for the image gallery -->
			<div id="modal-gallery" class="modal modal-gallery hide fade">
			    <div class="modal-header">
			        <a class="close" data-dismiss="modal">&times;</a>
			        <h3 class="modal-title"></h3>
			    </div>
			    <div class="modal-body"><div class="modal-image"></div></div>
			    <div class="modal-footer">
			        <a class="btn modal-download" target="_blank">
			            <i class="icon-download"></i>
			            <span>Download</span>
			        </a>
			        <a class="btn btn-success modal-play modal-slideshow" data-slideshow="5000">
			            <i class="icon-play icon-white"></i>
			            <span>Slideshow</span>
			        </a>
			        <a class="btn btn-info modal-prev">
			            <i class="icon-arrow-left icon-white"></i>
			            <span>Previous</span>
			        </a>
			        <a class="btn btn-primary modal-next">
			            <span>Next</span>
			            <i class="icon-arrow-right icon-white"></i>
			        </a>
			    </div>
			</div>
			<div class="row-fluid">
				<div id="footer" class="span12 text-center">
					<?php 
					if(Yii::app()->user->isGuest){
						$this->widget('bootstrap.widgets.TbButton', array(
						    'label'=>'¿Eres Administrador?',
						    'type'=>'primary',
						    'size'=>'mini',
						    'url'=> array('/site/login'),			   
						));
					}else{
						$this->widget('bootstrap.widgets.TbButton', array(
						    'label'=>'¿Cerrar Sesion?',
						    'type'=>'danger',
						    'size'=>'mini',
						    'url'=> array('/site/logout'),
						));						
					}
					?><br/><br/>
					<p> 
						Copyright &copy; <?php echo date('Y');?> 
						<?php echo CHtml::link('Fusion Desarrollos', 'http://www.fusiondesarrollos.com.ar')?> 
						- Todos los derechos reservados - 
						<?php echo Yii::powered(); ?>
					</p>
				</div>
			</div>
		</div>
		<div class="span3">
			<?php $publicidades= Publicidades::model()->findAll();
		  		$cant= count($publicidades);
			?>
			<div  id="vcarousel-container">
				<ul id="vertical-carousel" class="vcarousel">
					<?php if($cant >= 0 && $cant < 6){
						for ($i=0; $i < (64 - $cant); $i++) { ?>
					        <li>
		                        <img src= <?php echo Yii::app()->request->baseUrl."/images/llamanos.png"?> alt="llamanos" />
		                    </li>
					<?php }
					} ?>
				</ul>
			</div>
		</div>
	</div>
</div><!-- page -->

<?php 
	  Yii::app()->clientScript->registerCoreScript('jquery');
	  Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/assets/js/jquery.mousewheel.min.js');
	  Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/assets/js/jquery.carouFredSel-6.2.0.js');
	  Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/assets/js/jscarouselFred.js');
?>
<script src="http://blueimp.github.com/Bootstrap-Image-Gallery/js/bootstrap-image-gallery.min.js"></script>
</body>
</html>
