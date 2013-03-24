<?php
/* @var $this ComentariosController */
/* @var $data Comentarios */
$email=' ';
if(strlen($data->email) > 0){
	$email=' ('.$data->email.') ';
}
?>

<div class="contenido-comentario">
	<div class="votos">
<?php 
	if(!isset(Yii::app()->request->cookies['comentario_votado'.$data->idComentario])){ ?>
		<?php echo CHtml::link('<span class="voto-mas"><h6>'.(int) $data->votosPositivos.'</h6></span>',array('/comentarios/votar',
			                                         'id'=>$data->idComentario,
			                                         'positivo'=>1)); ?>			
					
		<?php echo CHtml::link('<span class="voto-menos"><h6>'.(int) $data->votosNegativos.'</h6></span>',array('/comentarios/votar',
			                                         'id'=>$data->idComentario,
			                                         'positivo'=>0)); ?>	
<?php 
	} else{
?>
		<span class="voto-mas">
			<h6><?php echo (int) $data->votosPositivos?></h6>
		</span>				
		<span class="voto-menos">
			<h6><?php echo (int) $data->votosNegativos?></h6>
		</span>
<?php 
	}
?>
	</div>
	<h6><?php echo date('d/m/Y - H:i', strtotime($data->fechaHora)) ?></h6>
	<h4><?php echo $data->usuario.$email.'dijo:' ?></h4>
	<hr/>
	<p>
		<?php echo $data->contenido ?>
	</p>
</div>