<?php

/**
 * This is the model class for table "devices".
 *
 * The followings are the available columns in table 'devices':
 * @property integer $id
 * @property integer $distributor_id
 * @property integer $country_id
 * @property integer $category_id
 * @property integer $brand_id
 * @property string $name
 * @property string $sale_date
 * @property string $bill_sale
 * @property integer $active
 * @property string $created
 * @property string $modified
 *
 * The followings are the available model relations:
 * @property Distributors $distributor
 * @property Countries $country
 * @property Categories $category
 * @property Brands $brand
 * @property Warranties[] $warranties
 */
class Devices extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'devices';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('distributor_id, country_id, category_id, brand_id, model_id, active', 'numerical', 'integerOnly'=>true),
			array('name, bill_sale, created, modified', 'length', 'max'=>45),
                      //  array('file', 'file', 'types'=>'pdf','maxSize' => 1024 * 1024 * 20 ,'tooLarge' => 'El archivo era más grande que 20MB. Por favor, sube un archivo más pequeño.'),
			array('sale_date', 'safe'),
                        array('modified','default','value'=>new CDbExpression('NOW()'),'setOnEmpty'=>false,'on'=>'update'),
                        array('created,modified','default','value'=>new CDbExpression('NOW()'),'setOnEmpty'=>false,'on'=>'insert'),
			array('id, distributor_id, country_id, category_id, brand_id, name, sale_date, bill_sale, active, created, modified', 'safe', 'on'=>'search'),
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
                        'model' => array(self::BELONGS_TO, 'Models', 'model_id'),
			'distributor' => array(self::BELONGS_TO, 'Distributors', 'distributor_id'),			
			'country' => array(self::BELONGS_TO, 'Countries', 'country_id'),
			'category' => array(self::BELONGS_TO, 'Categories', 'category_id'),
			'brand' => array(self::BELONGS_TO, 'Brands', 'brand_id'),
			'warranties' => array(self::HAS_MANY, 'Warranties', 'device_id'),
                        'warrantiesDevices' => array(self::HAS_MANY, 'WarrantiesDevices', 'device_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'distributor_id' => 'Le pertenece al distribuidor',
			'country_id' => 'Pais',
			'category_id' => 'Categoria del rquipo',
			'brand_id' => 'Marca del equipo',
			'model_id' => 'Modelo del equipo',
			'name' => 'Serial del equipo',
			'sale_date' => 'Fecha de venta del equipo',
			'bill_sale' => 'Factura de venta del equipo',
			'active' => 'Activo',
			'status' => 'Estado',
			'created' => 'Creado',
			'modified' => 'Modificado',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('t.id',$this->id);
		$criteria->compare('t.distributor_id',$this->distributor_id);
		$criteria->compare('t.country_id',$this->country_id);
		$criteria->compare('t.category_id',$this->category_id);
		$criteria->compare('t.brand_id',$this->brand_id);
		$criteria->compare('t.model_id',$this->model_id,true);
		$criteria->compare('t.name',$this->name,true);
		$criteria->compare('t.sale_date',$this->sale_date,true);
		$criteria->compare('t.bill_sale',$this->bill_sale,true);		
		$criteria->compare('t.active',$this->active);
		$criteria->compare('t.status',$this->status);
		$criteria->compare('t.created',$this->created,true);
		$criteria->compare('t.modified',$this->modified,true);
                
              //  $criteria->with = array('distributor'=>array('with'=>'user'));

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'sort'=>array('defaultOrder'=>'t.id DESC') //tambien se puede ordenar desde aqui
		));
	}
        
        public function searchMyDevice()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('t.id',$this->id);
		$criteria->compare('t.distributor_id',$this->distributor_id);
		$criteria->compare('t.country_id',$this->country_id);
		$criteria->compare('t.category_id',$this->category_id);
		$criteria->compare('t.brand_id',$this->brand_id);
		$criteria->compare('t.model_id',$this->model_id,true);
		$criteria->compare('t.name',$this->name,true);
		$criteria->compare('t.sale_date',$this->sale_date,true);
		$criteria->compare('t.bill_sale',$this->bill_sale,true);
		//$criteria->compare('t.file',$this->bill_sale,true);
		$criteria->compare('t.active',$this->active);
		$criteria->compare('t.created',$this->created,true);
		$criteria->compare('t.modified',$this->modified,true);
                
                /*FILTRA LOS EQUIPOS POR USUARIO DISTRIBUIDOR*/
                $criteria->compare('t.distributor_id',Yii::app()->user->getState('distributor_id'));

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'sort'=>array('defaultOrder'=>'t.id DESC') //tambien se puede ordenar desde aqui
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Devices the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
