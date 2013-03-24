<?php

class ArticulosController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','updateRating'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','upload'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$comentario= $this->comentar($id);
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'comentario'=>$comentario,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Articulos;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Articulos']))
		{
			$model->attributes=$_POST['Articulos'];
		    //Save the model to the database
		     if($model->save()){

		     }
		}

		$this->render('create',array(
			'model'=>$model
		));
	}

	/**
	 * 
	 * 
	 */
	protected function comentar($id)
	{
		$model=new Comentarios;

		if(isset($_POST['ajax']) && $_POST['ajax']==='comentarios-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		if(isset($_POST['Comentarios']))
		{
			$model->idArticulo=$id;
			$model->votosPositivos=0;
			$model->votosNegativos=0;
			$model->fechaHora=date('Y-m-d H:i:s', strtotime('now'));
			$model->attributes=$_POST['Comentarios'];
			if($model->save()){
				$this->redirect('#');
			}
		}
		return $model;
	}		

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Articulos']))
		{
			$model->attributes=$_POST['Articulos'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idArticulo));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdateRating($id)
	{
		$coock= 'esta_votado'.$id;
		if(!isset(Yii::app()->request->cookies[$coock])){
			$model=$this->loadModel($id);
			if(isset($_GET['rating']))
			{
				$rate=$_GET['rating'];
				$vot= $model->votos + 1;
				$oldrate=$model->rating;
				$model->rating= ($oldrate + $rate);
				$model->votos= $vot;
				$model->save();
				$cookie = new CHttpCookie($coock, 1);
				$cookie->expire = time()+60*60*2; 
				Yii::app()->request->cookies[$coock] = $cookie;
			}
		}
	}	

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Articulos');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Articulos('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Articulos']))
			$model->attributes=$_GET['Articulos'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Articulos::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'La pagina solicitada, NO EXISTE.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='articulos-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
