<?php

/**
 * This is the model class for table "files_warranties".
 *
 * The followings are the available columns in table 'files_warranties':
 * @property integer $id
 * @property string $name
 * @property string $file
 * @property integer $warranty_id
 * @property string $created
 *
 * The followings are the available model relations:
 * @property Warranties $warranty
 */
class FilesWarranties extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'files_warranties';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('warranty_id', 'required'),
			array('warranty_id,category', 'numerical', 'integerOnly'=>true),
                      //  array('file', 'file','allowEmpty'=>true,'types'=>'jpg, gif, png'),                          
			array('name, file', 'length', 'max'=>100),		
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, file, category, warranty_id, created', 'safe', 'on'=>'search'),
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
			'name' => 'Nombre del RMA',
			'file' => 'Subir Imagen del RMA',
			'category' => 'categoria',
			'warranty_id' => 'Warranty',
			'created' => 'Created',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('file',$this->file,true);
		$criteria->compare('category',$this->category,true);
		$criteria->compare('warranty_id',$this->warranty_id);
		$criteria->compare('created',$this->created,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return FilesWarranties the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
