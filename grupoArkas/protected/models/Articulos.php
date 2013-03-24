<?php

/**
 * This is the model class for table "articulos".
 *
 * The followings are the available columns in table 'articulos':
 * @property integer $idArticulo
 * @property integer $idSeccion
 * @property string $titulo
 * @property string $contenido
 * @property string $url
 * @property string $visitas
 * @property string $fechaHora
 * @property string $rating
 * @property string $votos
 *
 * The followings are the available model relations:
 * @property Secciones $idSeccion0
 * @property Comentarios[] $comentarios
 * @property Imagenes[] $imagenes
 */
class Articulos extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Articulos the static model class
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
		return 'articulos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idSeccion, titulo, contenido, fechaHora', 'required'),
			array('idSeccion', 'numerical', 'integerOnly'=>true),
			array('titulo, url', 'length', 'max'=>50),
			array('visitas, rating, votos', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idArticulo, idSeccion, titulo, contenido, visitas, fechaHora, rating, votos', 'safe', 'on'=>'search'),
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
			'idSeccion0' => array(self::BELONGS_TO, 'Secciones', 'idSeccion'),
			'comentarios' => array(self::HAS_MANY, 'Comentarios', 'idArticulo'),
			'imagenes' => array(self::HAS_MANY, 'Imagenes', 'idArticulo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idArticulo' => 'Id Articulo',
			'idSeccion' => 'Id Seccion',
			'titulo' => 'Titulo',
			'contenido' => 'Contenido',
			'url' => 'Url',
			'visitas' => 'Visitas',
			'fechaHora' => 'Fecha Hora',
			'rating' => 'Rating',
			'votos' => 'Votos',
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

		$criteria->compare('idArticulo',$this->idArticulo);
		$criteria->compare('idSeccion',$this->idSeccion);
		$criteria->compare('titulo',$this->titulo,true);
		$criteria->compare('contenido',$this->contenido,true);
		$criteria->compare('visitas',$this->visitas,true);
		$criteria->compare('fechaHora',$this->fechaHora,true);
		$criteria->compare('rating',$this->rating,true);
		$criteria->compare('votos',$this->votos,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function afterSave( ) 
	{
	    $this->addImages( );
	    parent::afterSave( );
	}
	 
	protected function addImages( ) 
	{
	    //If we have pending images
	    if( Yii::app( )->user->hasState( 'images' ) ) {
	        $userImages = Yii::app( )->user->getState( 'images' );
	        //Resolve the final path for our images
	        $path = Yii::app( )->getBasePath( )."/../images/articulos/".$this->id."/";
	        //Create the folder and give permissions if it doesnt exists
	        if( !is_dir( $path ) ) {
	            mkdir( $path );
	            chmod( $path, 0777 );
	        }
	 
	        //Now lets create the corresponding models and move the files
	        foreach( $userImages as $image ) {
	            if( is_file( $image["path"] ) ) {
	                if( rename( $image["path"], $path.$image["filename"] ) ) {
	                    chmod( $path.$image["filename"], 0777 );
	                    $img = new Imagenes;
	                    $img->size = $image["size"];
	                    $img->mime = $image["mime"];
	                    $img->name = $image["name"];
	                    $img->source = "/images/uploads/{$this->id}/".$image["filename"];
	                    $img->somemodel_id = $this->id;
	                    if( !$img->save( ) ) {
	                        //Its always good to log something
	                        Yii::log( "Could not save Image:\n".CVarDumper::dumpAsString( 
	                            $img->getErrors( ) ), CLogger::LEVEL_ERROR );
	                        //this exception will rollback the transaction
	                        throw new Exception( 'Could not save Image');
	                    }
	                }
	            } else {
	                //You can also throw an execption here to rollback the transaction
	                Yii::log( $image["path"]." is not a file", CLogger::LEVEL_WARNING );
	            }
	        }
	        //Clear the user's session
	        Yii::app( )->user->setState( 'images', null );
	    }
	}	
}