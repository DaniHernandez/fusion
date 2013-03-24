<?php
/* @var $this ArticulosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Todos Los Articulos',
); 

$this->menu=array(
	array('label'=>'Nuevo articulo', 'url'=>array('create')),
	array('label'=>'Administrar articulos', 'url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'afterAjaxUpdate'=>'function(id,data) {            
                        $("span[id^=\'rating-\'] > input").rating({\'readOnly\':true});
                    }',	
)); ?>
