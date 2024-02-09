<?php

/**
 * This is the model class for table "customers".
 *
 * The followings are the available columns in table 'customers':
 * @property integer $id
 * @property integer $nit
 * @property string $address_fiscal
 * @property integer $city_id
 * @property integer $country_id
 * @property integer $phone
 * @property integer $email
 *
 * The followings are the available model relations:
 * @property Warranties[] $warranties
 */
class Customers extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'customers';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nit, address_fiscal, city_id, country_id, phone, email', 'required'),
			array('nit,warrenty_id, city_id, country_id, phone, email', 'numerical', 'integerOnly'=>true),
                       // array('address_fiscal', 'match' ,'pattern'=> '/^[A-Za-z0-9_]+$/u','message'=> 'Username can contain only [a-zA-Z0-9_].'),

			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, warrenty_id,nit, address_fiscal, city_id, country_id, phone, email', 'safe', 'on'=>'search'),
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
			'city' => array(self::BELONGS_TO, 'Cities', 'city_id'),
                        'country' => array(self::BELONGS_TO, 'Countries', 'country_id'),
                        'warranties' => array(self::HAS_MANY, 'Warranties', 'customer_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nit' => 'Documento de identificación del cliente',
			'warrenty_id' => 'RMA',
			'name' => 'Nombre del Cliente',
			'address_fiscal' => 'Direccion Fiscal',
			'city_id' => 'Ciudad',
			'country_id' => 'País',
			'phone' => 'Teléfono',
			'email' => 'Correo',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('warrenty_id',$this->warrenty_id);
		$criteria->compare('nit',$this->nit);
		$criteria->compare('address_fiscal',$this->address_fiscal,true);
		$criteria->compare('city_id',$this->city_id);
		$criteria->compare('country_id',$this->country_id);
		$criteria->compare('phone',$this->phone);
		$criteria->compare('email',$this->email);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Customers the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
