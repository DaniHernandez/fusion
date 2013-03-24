<?php
/* @var $this ArticulosController */
/* @var $data Articulos */
$rate= ($data->votos==0) ? 0 : (int)($data->rating / $data->votos);
?>

<div class="row-fluid well">
	<div class="span3">
		<?php echo CHtml::image(Yii::app()->request->baseUrl."/images/articulos/".$data->idArticulo."/".$data->url, $data->titulo)?>
	</div>
	<div class="span9">
		<div class="row-fluid">
			<div class="span9">
				<h3><?php echo $data->titulo ?></h3>
			</div>
			<?php $this->widget('CStarRating', array(
				    'id' => 'rating-'. $data->idArticulo,		    
				    'name'=> 'rating-'.$data->idArticulo,
				    'value'=> $rate,
				    'readOnly'=>true,
				    'htmlOptions'=>array('class'=>'span3 rating',),
			));?>
		</div>
		<div class="row-fluid">
			<div class="span12">
				<div class="row-fluid">
					<div class="span9">
						<h6>Publicado el <?php echo date('d/m/Y - H:i', strtotime($data->fechaHora))?></h6>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
						<p>
							<?php echo substr($data->contenido, 0, 500)."..."; ?>
							<?php echo CHtml::link('[Leer mas]',array('/articulos/view','id'=>$data->idArticulo)); ?>	
						</p>
					</div>
				</div>
			</div>
		</div>			
	</div>
</div>