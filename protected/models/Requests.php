<?php

/**
 * This is the model class for table "requests".
 *
 * The followings are the available columns in table 'requests':
 * @property integer $id
 * @property integer $failure_id
 * @property integer $warranty_id
 * @property integer $status
 * @property string $tracking
 * @property string $comments
 * @property string $date_initial
 * @property string $date_final
 *
 * The followings are the available model relations:
 * @property Failures $failure
 * @property Warranties $warranty
 */
class Requests extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'requests';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('failure_id, warranty_id, cas_id', 'required'),
			array('failure_id, warranty_id, status, transport_id', 'numerical', 'integerOnly'=>true),
			array('tracking', 'length', 'max'=>100),
			array('comments', 'safe'),
                        array('date_final','default','value'=>new CDbExpression('NOW()'),'setOnEmpty'=>false,'on'=>'update'),
                        array('date_initial,date_final','default','value'=>new CDbExpression('NOW()'),'setOnEmpty'=>false,'on'=>'insert'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, failure_id, warranty_id, status, tracking, transport_id,  comments, date_initial, date_final', 'safe', 'on'=>'search'),
			array('id, failure_id, warranty_id, status, tracking, transport_id,  comments, date_initial, date_final', 'safe', 'on'=>'cas'),
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
                        'failure' => array(self::BELONGS_TO, 'Failures', 'failure_id'),
                        'warranty' => array(self::BELONGS_TO, 'Warranties', 'warranty_id'),
                        'cas' => array(self::BELONGS_TO, 'Cas', 'cas_id'),
                        'transport' => array(self::BELONGS_TO, 'Transports', 'transport_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'failure_id' => 'Pieza',
			'warranty_id' => 'Código de Garantía',
                        'cas_id' => 'CAS',
			'status' => 'Piezas Aprobadas',
			'tracking' => 'Tracking',
			'transport_id' => 'Transporte',
			'comments' => 'Comentarios',
			'date_initial' => 'Fecha inicial',
			'date_final' => 'Fecha final',
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
		$criteria->compare('failure.replacement',$this->failure_id);
		$criteria->compare('warranty.code',trim($this->warranty_id));
		$criteria->compare('t.cas_id',$this->cas_id);
		$criteria->compare('t.status',$this->status);
		$criteria->compare('t.tracking',$this->tracking,true);
		$criteria->compare('t.transport_id',$this->transport_id);
		$criteria->compare('t.comments',$this->comments,true);
		$criteria->compare('t.date_initial',$this->date_initial,true);
		$criteria->compare('t.date_final',$this->date_final,true);                
            
                $criteria->with = array('warranty','failure');
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'sort'=>array('defaultOrder'=>'t.id DESC') //tambien se puede ordenar desde aqui
		));
	}
	public function cas()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('t.id',$this->id);
		$criteria->compare('failure.replacement',trim($this->failure_id));
		$criteria->compare('warranty.code',trim($this->warranty_id));
		$criteria->compare('t.cas_id',trim($this->cas_id));
		$criteria->compare('t.status',$this->status);
		$criteria->compare('t.tracking',$this->tracking,true);
		$criteria->compare('t.transport_id',$this->transport_id);
		$criteria->compare('t.comments',$this->comments,true);
		$criteria->compare('t.date_initial',$this->date_initial,true);
		$criteria->compare('t.date_final',$this->date_final,true);
                
                $criteria->with = array('warranty','failure');
                $criteria->addCondition("t.cas_id = ".Yii::app()->user->getState('cas_id'));

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'sort'=>array('defaultOrder'=>'t.id DESC') //tambien se puede ordenar desde aqui
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Requests the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        
        public function pieza($status = Null, $valor = Null){
            
            if($status == 1){                
                $valor = '<span class="pieza label_rma label label-success">Pieza aprobada <i class="fa fa-check-square-o"></i></span>';                
            }else {
                $valor = '<span class="label_rma label label-warning">Pieza no aprobado <i class="fa fa-minus-square"></i></span>';               
            }            
            return $valor;
        }
}
