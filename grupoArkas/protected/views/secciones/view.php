<?php
/* @var $this SeccionesController */
/* @var $model Secciones */

$this->breadcrumbs=array(
	'Secciones'=>array('index'),
	$model->nombre,
    );

$this->menu=array(
    array('label'=>'Editar esta seccion', 'url'=>array('update', 'id'=>$model->idSeccion)),
    array('label'=>'Borrar esta seccion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idSeccion),'confirm'=>'¿Esta seguro que desea borrar la seccion '.$model->nombre.'?')),
    array('label'=>'Administrar Secciones', 'url'=>array('admin')),
);
/*$articulos= Articulos::model()->findAll((array('order' => 'fechaHora DESC', 'condition'=>'idSeccion=:idSec', 'params'=>array(':idSec'=>$model->idSeccion))));*/
$dataProvider=new CActiveDataProvider('Articulos', array(
    'criteria'=>array(
        'condition'=>'idSeccion='.$model->idSeccion,
        'order'=>'fechaHora DESC',
    ),
    'pagination'=>array(
        'pageSize'=>10,
    ),
));
?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'/articulos/_view',
    'emptyText'=>'Hey, parece que todavia no se han publicado articulos en esta seccion...',
    'summaryText'=>'Estas viendo {end} de {count} articulos',    
	'afterAjaxUpdate'=>'function(id,data) {            
                        $("span[id^=\'rating-\'] > input").rating({\'readOnly\':true});
                    }',
)); ?>


