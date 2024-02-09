<?php

/**
 * This is the model class for table "cas".
 *
 * The followings are the available columns in table 'cas':
 * @property integer $id
 * @property integer $user_id
 * @property string $name
 * @property string $address
 * @property string $phone_local
 * @property string $phone_personal
 * @property string $email
 * @property string $representative
 * @property integer $country_id
 * @property integer $state_id
 * @property integer $city_id
 * @property string $record_fiscal
 * @property integer $category_id
 * @property integer $active
 * @property string $created
 * @property string $modified
 *
 * The followings are the available model relations:
 * @property Branches[] $branches
 * @property Countries $country
 * @property Users $user
 * @property States $state
 * @property Cities $city
 * @property Categories $category
 * @property Users[] $users
 * @property Warranties[] $warranties
 */
class Cas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, address, phone_local, phone_personal, email, representative, state_id, city_id,  record_fiscal, category_id', 'required'),
			array('country_id, category_id, active', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>100),
			array('phone_local, phone_personal, email, representative, record_fiscal', 'length', 'max'=>45),
			array('modified','default','value'=>new CDbExpression('NOW()'),'setOnEmpty'=>false,'on'=>'update'),
                        array('created,modified','default','value'=>new CDbExpression('NOW()'),'setOnEmpty'=>false,'on'=>'insert'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, address, phone_local, phone_personal, email, representative, country_id, record_fiscal, category_id, active, created, modified', 'safe', 'on'=>'search'),
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
			'branches' => array(self::HAS_MANY, 'Branches', 'cas_id'),
                        'country' => array(self::BELONGS_TO, 'Countries', 'country_id'),
                        'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
                        'state' => array(self::BELONGS_TO, 'States', 'state_id'),
                        'city' => array(self::BELONGS_TO, 'Cities', 'city_id'),
                        'category' => array(self::BELONGS_TO, 'Categories', 'category_id'),
                        'requests' => array(self::HAS_MANY, 'Requests', 'cas_id'),
                        'users' => array(self::HAS_MANY, 'Users', 'cas_id'),
                        'warranties' => array(self::HAS_MANY, 'Warranties', 'cas_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
                        'user_id' => 'User',
                        'name' => 'Nombre del cas',
                        'address' => 'Dirreción',
                        'phone_local' => 'Teléfono local',
                        'phone_personal' => 'Teléfono personal',
                        'email' => 'Correo',
                        'representative' => 'Representante',
                        'country_id' => 'Pais',
                        'state_id' => 'Estado',
                        'city_id' => 'Ciudad',
                        'record_fiscal' => 'Registro fiscal',
                        'category_id' => 'Categoria',
                        'active' => 'Activo',
                        'created' => 'Created',
                        'modified' => 'Modified',
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
                $criteria->compare('user_id',$this->user_id);
                $criteria->compare('name',$this->name,true);
                $criteria->compare('address',$this->address,true);
                $criteria->compare('phone_local',$this->phone_local,true);
                $criteria->compare('phone_personal',$this->phone_personal,true);
                $criteria->compare('email',$this->email,true);
                $criteria->compare('representative',$this->representative,true);
                $criteria->compare('country_id',$this->country_id);
                $criteria->compare('state_id',$this->state_id);
                $criteria->compare('city_id',$this->city_id);
                $criteria->compare('record_fiscal',$this->record_fiscal,true);
                $criteria->compare('category_id',$this->category_id);
                $criteria->compare('active',$this->active);
                $criteria->compare('created',$this->created,true);
                $criteria->compare('modified',$this->modified,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'sort'=>array('defaultOrder'=>'id DESC') //tambien se puede ordenar desde aqui
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Cas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
