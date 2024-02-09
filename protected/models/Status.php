<?php

/**
 * This is the model class for table "status".
 *
 * The followings are the available columns in table 'status':
 * @property integer $id
 * @property string $name
 * @property integer $active
 *
 * The followings are the available model relations:
 * @property Warranties[] $warranties
 */
class Status extends CActiveRecord
{
    
    public function tableName()
	{
		return 'status';
	}
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, active', 'required'),
			array('active', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, active', 'safe', 'on'=>'search'),
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
			'warranties' => array(self::HAS_MANY, 'Warranties', 'statu_id'),
		);
	}
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'active' => 'Active',
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
		$criteria->compare('active',$this->active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Status the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public  function estado($statu_id = null, $valor = null){          
            if($statu_id == 1){
                $valor = '<span style="color:#3498db" class="label label_rma ">En revision <i class="fa fa-cog"></i></span>';
            }elseif ($statu_id == 2){
                 $valor = '<span  style="color:#e67e22" class="label_rma ">Por aprobar CAS <i class="fa fa-lock"></i></span>';
            }elseif($statu_id === 3){
                $valor = '<span  style="color:#f1c40f class="label  label_rma ">Por aprobar TFHKA <i class="fa fa-eye"></i></span>';
            }elseif($statu_id == 4){
                  $valor = '<span  style="color:#95a5a6" class="label  label_rma ">Cerrado <i class="fa fa-eye"></i></span>';
            }elseif($statu_id == 5){
                  $valor = '<span  style="color:#2ecc71" class="label  label_rma ">Aprobado TFHKA <i class="fa fa-eye"></i></span>';
            }elseif($statu_id == 6){
                  $valor = '<span  style="color:#e74c3c" class="label  label_rma ">Pendiente pago <i class="fa fa-eye"></i></span>';
            }elseif($statu_id == 7){
                  $valor = '<span  style="color:#95a5a6" class="label  label_rma ">Anulado <i class="fa fa-eye"></i></span>';            
            }elseif($statu_id == 8){
                $valor = '<span style="color:#e67e22" class="label  label_rma">Mejorar Diagnóstico <i class="fa fa-eye"></i></span>';            
            }elseif($statu_id == 9){
                $valor = '<span style="color:#e74c3c" class="label  label_rma">Pendiente pago <i class="fa fa-eye"></i></span>';
            }
            return $valor;            
        }
}
