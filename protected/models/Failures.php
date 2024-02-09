<?php

/**
 * This is the model class for table "failures".
 *
 * The followings are the available columns in table 'failures':
 * @property integer $id
 * @property integer $brand_id
 * @property integer $model_id
 * @property string $description_failure
 * @property string $solution
 * @property string $replacement
 * @property string $description_replacement
 * @property integer $active
 *
 * The followings are the available model relations:
 * @property Models $model
 * @property Brands $brand
 */
class Failures extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'failures';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('brand_id, model_id, active', 'numerical', 'integerOnly'=>true),
			array('solution, replacement', 'length', 'max'=>300),
			array('description_failure, description_replacement', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, brand_id, model_id, description_failure, solution, replacement, description_replacement, active', 'safe', 'on'=>'search'),
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
			'brand' => array(self::BELONGS_TO, 'Brands', 'brand_id'),   
                        'failuresWarranties' => array(self::HAS_MANY, 'FailuresWarranties', 'failure_id'),
                        'requests' => array(self::HAS_MANY, 'Requests', 'failure_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'brand_id' => 'Marca',
			'model_id' => 'Modelo',
			'description_failure' => 'Descripción de la falla',
			'solution' => 'Solución',
			'replacement' => 'Reemplazo',
			'description_replacement' => 'Descripción del reemplazo',
			'active' => 'Activo',
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
		$criteria->compare('t.brand_id',$this->brand_id);
		$criteria->compare('t.model_id',$this->model_id);
		$criteria->compare('t.description_failure',$this->description_failure,true);
		$criteria->compare('t.solution',$this->solution,true);
		$criteria->compare('t.replacement',$this->replacement,true);
		$criteria->compare('t.description_replacement',$this->description_replacement,true);
		$criteria->compare('t.active',$this->active);
                
                $criteria->with = array('brand','model');

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'sort'=>array('defaultOrder'=>'t.id DESC') //tambien se puede ordenar desde aqui
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Failures the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
