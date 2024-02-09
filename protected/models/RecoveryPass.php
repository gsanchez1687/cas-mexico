<?php
class RecoveryPass extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
         
      


        public function tableName()
	{
		return 'users';
	}
      

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email', 'required'),			
			array('email', 'length', 'max'=>100),		
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array();
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(						
			'email' => 'Correo',			
		);
	}

	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        

}
