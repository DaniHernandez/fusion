<?php

/**
 * This is the model class for table "publicidades".
 *
 * The followings are the available columns in table 'publicidades':
 * @property integer $idPublicidad
 * @property string $url
 * @property string $descripcion
 * @property string $vistas
 */
class Publicidades extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Publicidades the static model class
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
		return 'publicidades';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('url', 'required'),
			array('url', 'length', 'max'=>50),
			array('descripcion', 'length', 'max'=>140),
			array('vistas', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idPublicidad, url, descripcion, vistas', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idPublicidad' => 'Id Publicidad',
			'url' => 'Url',
			'descripcion' => 'Descripcion',
			'vistas' => 'Vistas',
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

		$criteria->compare('idPublicidad',$this->idPublicidad);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('vistas',$this->vistas,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}