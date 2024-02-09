<?php

/**
 * This is the model class for table "files_polls".
 *
 * The followings are the available columns in table 'files_polls':
 * @property integer $id
 * @property string $file
 * @property integer $warranty_id
 * @property string $created
 */
class FilesPolls extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'files_polls';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name ,file, warranty_id', 'required'),
			array('warranty_id', 'numerical', 'integerOnly'=>true),
			array('file', 'file', 
                            'allowEmpty'=>true, 
                            'types'=>'jpg, gif, png', 
                            'on'=>'insert',//scenario
                            'except'=>'update',                            
                        ),                       
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, file, warranty_id, created', 'safe', 'on'=>'search'),
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
                        'name'=>'Nombre del la encuesta',
			'file' => 'Archivo',
			'warranty_id' => 'Garantia',
			'created' => 'Creado',
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
		$criteria->compare('file',$this->file,true);
		$criteria->compare('warranty_id',$this->warranty_id);
		$criteria->compare('created',$this->created,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'sort'=>array('defaultOrder'=>'id DESC') //tambien se puede ordenar desde aqui
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return FilesPolls the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
