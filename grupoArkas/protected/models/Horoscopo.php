<?php

/**
 * This is the model class for table "horoscopo".
 *
 * The followings are the available columns in table 'horoscopo':
 * @property integer $idHoroscopo
 * @property integer $idSigno
 * @property string $descripcion
 * @property string $fecha
 *
 * The followings are the available model relations:
 * @property Signos $idSigno0
 */
class Horoscopo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Horoscopo the static model class
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
		return 'horoscopo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idSigno', 'required'),
			array('idSigno', 'numerical', 'integerOnly'=>true),
			array('descripcion', 'length', 'max'=>500),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idHoroscopo, idSigno, descripcion, fecha', 'safe', 'on'=>'search'),
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
			'idSigno0' => array(self::BELONGS_TO, 'Signos', 'idSigno'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idHoroscopo' => 'Id Horoscopo',
			'idSigno' => 'Id Signo',
			'descripcion' => 'Descripcion',
			'fecha' => 'Fecha',
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

		$criteria->compare('idHoroscopo',$this->idHoroscopo);
		$criteria->compare('idSigno',$this->idSigno);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('fecha',$this->fecha,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}