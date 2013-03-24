<?php
/* @var $this ArticulosController */
/* @var $model Articulos */

	Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl.'/css/prettyPhoto.css', 'screen');
	Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/assets/js/jquery.prettyPhoto.js');	
	Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/assets/js/prettyPhoto.js');
	
	$this->breadcrumbs=array(
	Secciones::model()->findByPk($model->idSeccion)->nombre=>array('secciones/view','id'=>$model->idSeccion),
	$model->titulo,); 

	$this->menu=array(
	    array('label'=>'Editar esta articulo', 'url'=>array('update', 'id'=>$model->idArticulo)),
	    array('label'=>'Borrar esta articulo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idArticulo),'confirm'=>'¿Esta seguro que desea borrar este articulo?')),
	    array('label'=>'Administrar articulos', 'url'=>array('admin')),
	);	
	$imagenes=Imagenes::model()->findAll(array(
				'condition'=>'idArticulo=:idArt', 
				'params'=>array(
					':idArt'=>$model->idArticulo
					)
				));
	$votado= isset(Yii::app()->request->cookies['esta_votado'.$model->idArticulo]);
	$rate= ($model->votos==0) ? 0 : (int)($model->rating / $model->votos);
?>

<div class="cabecera">
	<h3><?php echo $model->titulo ?></h3>
	<h6>publicado el <?php echo date('d/m/Y - H:i', strtotime($model->fechaHora))?></h6>
	<div class="rating-articulo">
		<?php $this->widget('CStarRating', array(
			    'id' => 'rating-'. $model->idArticulo,		    
			    'name'=> 'rating-'.$model->idArticulo,
			    'value'=>$rate,
			    'readOnly'=> $votado,
			    'allowEmpty'=> $votado,
			    'callback'=>'function(){
				            $.ajax({
				                type: "GET",
				                url: "'.Yii::app()->createUrl('articulos/updateRating').'",
				                data: "id='.$model->idArticulo.'&rating=" + $(this).val(),

				                success: function(msg){},
				                error: function(xhr){
				                	alert("Ups! hubo un error en la votacion, vuelve a intentarlo mas tarde")
				               		}
				             })
							$(this).rating(\'readOnly\')}',
		));?>
	</div>			
</div>
<div class="contenido-articulo">
	<?php echo CHtml::link('<img src="'.Yii::app()->request->baseUrl.'/images/articulos/'.$model->idArticulo.'/'.$model->url.'" alt="'.$model->titulo.'"/>', Yii::app()->request->baseUrl.'/images/articulos/'.$model->idArticulo.'/'.$model->url, array('rel'=>'prettyPhoto[pp_gal]')); ?>
	<p><?php echo $model->contenido ?></p>
</div>

<?php 
if(count($imagenes) > 0) {?>
	<div class="hcarousel" id="hcarousel-container">
		<ul id="horizontal-carousel">
			<?php 
			foreach ($imagenes as $imagen) {
			?>
				<li>
					<?php echo CHtml::link('<img src="'.Yii::app()->request->baseUrl.'/images/articulos/'.$model->idArticulo.'/'.$imagen->url.'" alt="'.$imagen->titulo.'"/>', Yii::app()->request->baseUrl.'/images/articulos/'.$model->idArticulo.'/'.$imagen->url, array('rel'=>'prettyPhoto[pp_gal]', 'title'=>$imagen->descripcion)); ?>										
				</li>	
			<?php 
			} ?>																			
		</ul>
	</div>
<?php 
} ?>

<div class='comentarios'>
	<h2>Comentarios</h2>
	<?php 
	$dataProvider=new CActiveDataProvider('Comentarios', array(
	    'criteria'=>array(
	        'condition'=>'idArticulo='.$model->idArticulo,
	        'order'=>'fechaHora DESC',
	    ),
	    'pagination'=>array(
	        'pageSize'=>5,
	    ),
	));
	?>	
	<?php 
	$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'/comentarios/_view',
	'emptyText'=>'Hey, parece que nadie ha comentado este articulo... Se el primero!',
	'summaryText'=>'Estas viendo {end} de {count} comentarios',	
	)); 
	?>
</div>
<div class="contenedor-formulario">
	<h2>¿Y vos que opinas de esto?</h2>
	<?php 
		$this->renderPartial('/comentarios/_form',array('model'=>$comentario));
	?>
</div>