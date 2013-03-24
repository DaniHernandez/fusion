<?php

/**
 * This is the model class for table "comentarios".
 *
 * The followings are the available columns in table 'comentarios':
 * @property integer $idComentario
 * @property integer $idArticulo
 * @property string $usuario
 * @property string $contenido
 * @property string $votosPositivos
 * @property string $votosNegativos
 * @property string $fechaHora
 * @property string $email
 *
 * The followings are the available model relations:
 * @property Articulos $idArticulo0
 */
class Comentarios extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Comentarios the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'comentarios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idArticulo, usuario, contenido, fechaHora', 'required'),
			array('idArticulo', 'numerical', 'integerOnly'=>true),
			array('usuario', 'length', 'max'=>50),
			array('contenido', 'length', 'max'=>250),
			array('votosPositivos, votosNegativos', 'length', 'max'=>10),
			array('email', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idComentario, idArticulo, usuario, contenido, votosPositivos, votosNegativos, fechaHora, email', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'idArticulo0' => array(self::BELONGS_TO, 'Articulos', 'idArticulo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idComentario' => 'Id Comentario',
			'idArticulo' => 'Id Articulo',
			'usuario' => 'Usuario',
			'contenido' => 'Contenido',
			'votosPositivos' => 'Votos Positivos',
			'votosNegativos' => 'Votos Negativos',
			'fechaHora' => 'Fecha Hora',
			'email' => 'Email (opcional)',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idComentario',$this->idComentario);
		$criteria->compare('idArticulo',$this->idArticulo);
		$criteria->compare('usuario',$this->usuario,true);
		$criteria->compare('contenido',$this->contenido,true);
		$criteria->compare('votosPositivos',$this->votosPositivos,true);
		$criteria->compare('votosNegativos',$this->votosNegativos,true);
		$criteria->compare('fechaHora',$this->fechaHora,true);
		$criteria->compare('email',$this->email,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}