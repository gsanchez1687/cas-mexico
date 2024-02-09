<?php

/**
 * This is the model class for table "branches".
 *
 * The followings are the available columns in table 'branches':
 * @property integer $id
 * @property integer $cas_id
 * @property integer $country_id
 * @property string $name
 * @property string $address
 * @property string $phone_local
 * @property string $phone_personal
 * @property string $email
 * @property string $representative
 * @property string $record_fiscal
 * @property integer $category_id
 * @property integer $active
 * @property string $created
 * @property string $modified
 *
 * The followings are the available model relations:
 * @property Countries $country
 * @property Cas $cas
 * @property Users[] $users
 */
class Branches extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'branches';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, cas_id, name, address, phone_local, phone_personal, email, representative, record_fiscal, category_id', 'required'),
			array('id, cas_id, country_id, category_id, active', 'numerical', 'integerOnly'=>true),
			array('name, address, phone_local, phone_personal, email, representative, record_fiscal', 'length', 'max'=>45),
			array('created, modified', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, cas_id, country_id, name, address, phone_local, phone_personal, email, representative, record_fiscal, category_id, active, created, modified', 'safe', 'on'=>'search'),
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
			'country' => array(self::BELONGS_TO, 'Countries', 'country_id'),
			'cas' => array(self::BELONGS_TO, 'Cas', 'cas_id'),
			'users' => array(self::HAS_MANY, 'Users', 'branche_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'cas_id' => 'Cas',
			'country_id' => 'Country',
			'name' => 'Name',
			'address' => 'Address',
			'phone_local' => 'Phone Local',
			'phone_personal' => 'Phone Personal',
			'email' => 'Email',
			'representative' => 'Representative',
			'record_fiscal' => 'Record Fiscal',
			'category_id' => 'Category',
			'active' => 'Active',
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
		$criteria->compare('cas_id',$this->cas_id);
		$criteria->compare('country_id',$this->country_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('phone_local',$this->phone_local,true);
		$criteria->compare('phone_personal',$this->phone_personal,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('representative',$this->representative,true);
		$criteria->compare('record_fiscal',$this->record_fiscal,true);
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('active',$this->active);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('modified',$this->modified,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Branches the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
