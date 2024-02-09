<?php

/**
 * This is the model class for table "accessorie_warranties".
 *
 * The followings are the available columns in table 'accessorie_warranties':
 * @property integer $id
 * @property integer $accessorie_id
 * @property integer $warranty_id
 *
 * The followings are the available model relations:
 * @property Accessories $accessorie
 * @property Warranties $warranty
 */
class AccessorieWarranties extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'accessorie_warranties';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('accessorie_id, warranty_id', 'required'),
			array('accessorie_id, warranty_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, accessorie_id, warranty_id', 'safe', 'on'=>'search'),
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
			'accessorie' => array(self::BELONGS_TO, 'Accessories', 'accessorie_id'),
			'warranty' => array(self::BELONGS_TO, 'Warranties', 'warranty_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'accessorie_id' => 'Accessorie',
			'warranty_id' => 'Warranty',
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
		$criteria->compare('accessorie_id',$this->accessorie_id);
		$criteria->compare('warranty_id',$this->warranty_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AccessorieWarranties the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
