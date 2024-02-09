<?php

/**
 * This is the model class for table "warranties".
 *
 * The followings are the available columns in table 'warranties':
 * @property integer $id
 * @property string $code
 * @property integer $customer_id
 * @property integer $cas_id
 * @property integer $device_id
 * @property integer $disposition_id
 * @property integer $reason_return_id
 * @property string $name
 * @property string $date_customer_complaint
 * @property string $claim_date_cas
 * @property string $hour_service
 * @property integer $technical_id
 *
 * The followings are the available model relations:
 * @property Users $technical
 * @property Devices $device
 * @property Customers $customer
 * @property Cas $cas
 * @property Dispositions $disposition
 * @property ReasonReturns $reasonReturn
 */
class Warranties extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'warranties';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('customer_id, cas_id, name, date_customer_complaint', 'required'),
			array('customer_id, cas_id, device_id, disposition_id, reason_return_id, technical_id', 'numerical', 'integerOnly' => true),
			array('code', 'length', 'max' => 40),
			array('observation', 'length', 'max' => 200),
			array('name', 'length', 'max' => 50),
			array('created', 'default', 'value' => new CDbExpression('NOW()'), 'setOnEmpty' => false, 'on' => 'insert'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('statu_id, id, code, customer_id, cas_id, device_id, disposition_id, reason_return_id, name, date_customer_complaint, claim_date_cas, hour_service, technical_id', 'safe', 'on' => 'search'),
			//                        array('statu_id, id, code, customer_id, cas_id, device_id, disposition_id, reason_return_id, name, date_customer_complaint, claim_date_cas, hour_service, technical_id', 'safe', 'on'=>'cas'),
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
			'accessorieWarranties' => array(self::HAS_MANY, 'AccessorieWarranties', 'warranty_id'),
			'failuresWarranties' => array(self::HAS_MANY, 'FailuresWarranties', 'warranty_id'),
			'filesPolls' => array(self::HAS_MANY, 'FilesPolls', 'warranty_id'),
			'filesWarranties' => array(self::HAS_MANY, 'FilesWarranties', 'warranty_id'),
			'requests' => array(self::HAS_MANY, 'Requests', 'warranty_id'),
			'customer' => array(self::BELONGS_TO, 'Customers', 'customer_id'),
			'cas' => array(self::BELONGS_TO, 'Users', 'cas_id'),
			'disposition' => array(self::BELONGS_TO, 'Dispositions', 'disposition_id'),
			'reasonReturn' => array(self::BELONGS_TO, 'ReasonReturns', 'reason_return_id'),
			'technical' => array(self::BELONGS_TO, 'Users', 'technical_id'),
			'device' => array(self::BELONGS_TO, 'Devices', 'device_id'),
			'statu' => array(self::BELONGS_TO, 'Status', 'statu_id'),
			'warrantiesDevices' => array(self::HAS_MANY, 'WarrantiesDevices', 'warranty_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'code' => 'Código de asignación RMA',
			'customer_id' => 'Cliente',
			'cas_id' => 'CAS',
			'device_id' => 'Equipo',
			'file' => 'Registro fotográfico del equipo',
			'product_open' => 'Estado de la etiqueta de seguridad',
			'disposition_id' => 'Disposición del equipo',
			'reason_return_id' => 'Razón del retorno',
			'specification' => 'Especificación de la falla',
			'name' => 'Nombre',
			'date_customer_complaint' => 'Fecha de reclamo del  cliente',
			'claim_date_cas' => 'Fecha del reclamo CAS',
			'hour_service' => 'Horas de servicio',
			'technical_id' => 'Representante de servicio técnico',
			'observation' => 'Descripción de fallas y repuestos',
			'statu_id' => 'Estado del RMA',
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

		$criteria = new CDbCriteria;

		$criteria->compare('t.id', $this->id);
		$criteria->compare('t.code', trim($this->code));
		$criteria->compare('customer.name', $this->customer_id);
		$criteria->compare('cas.name', trim($this->cas_id));
		$criteria->compare('device.name', trim($this->device_id));
		$criteria->compare('t.file', $this->file);
		$criteria->compare('t.product_open', $this->product_open);
		$criteria->compare('t.disposition_id', $this->disposition_id);
		$criteria->compare('t.reason_return_id', $this->reason_return_id);
		$criteria->compare('t.specification', $this->specification);
		$criteria->compare('t.name', $this->name, true);
		$criteria->compare('t.date_customer_complaint', $this->date_customer_complaint, true);
		$criteria->compare('t.claim_date_cas', $this->claim_date_cas, true);
		$criteria->compare('t.hour_service', $this->hour_service, true);
		$criteria->compare('t.technical_id', $this->technical_id);
		$criteria->compare('t.observation', $this->observation);
		$criteria->compare('statu.id', trim($this->statu_id));

		$criteria->with = array('customer', 'cas', 'device', 'statu');

		if (Yii::app()->user->getState('rolId') == '3' or  Yii::app()->user->getState('rolId') == '4'  or  Yii::app()->user->getState('rolId') == '6') {
			$criteria->condition = "t.cas_id = " . Yii::app()->user->getState('cas_id');
		}

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
			'sort' => array('defaultOrder' => 't.id DESC') //tambien se puede ordenar desde aqui
		));
	}
	//	public function cas()
	//	{
	//		// @todo Please modify the following code to remove attributes that should not be searched.
	//
	//		$criteria=new CDbCriteria;
	//		$criteria->compare('t.id',$this->id);
	//		$criteria->compare('t.code',trim($this->code));
	//		$criteria->compare('customer.name',$this->customer_id);
	//		$criteria->compare('cas.name',trim($this->cas_id));
	//		$criteria->compare('device.name',trim($this->device_id));
	//		$criteria->compare('t.file',$this->file);		
	//		$criteria->compare('t.product_open',$this->product_open);
	//		$criteria->compare('t.disposition_id',$this->disposition_id);
	//		$criteria->compare('t.reason_return_id',$this->reason_return_id);
	//		$criteria->compare('t.specification',$this->specification);
	//		$criteria->compare('t.name',$this->name,true);
	//		$criteria->compare('t.date_customer_complaint',$this->date_customer_complaint,true);
	//		$criteria->compare('t.claim_date_cas',$this->claim_date_cas,true);
	//		$criteria->compare('t.hour_service',$this->hour_service,true);
	//		$criteria->compare('t.technical_id',$this->technical_id);
	//                $criteria->compare('t.observation',$this->observation);
	//		$criteria->compare('statu.id',$this->statu_id);
	//                
	//                $criteria->with = array('customer','cas','device','statu');
	//                $criteria->addCondition("t.cas_id = ".Yii::app()->user->getState('cas_id'));
	//                
	//		return new CActiveDataProvider($this, array(
	//			'criteria'=>$criteria,
	//                        'sort'=>array('defaultOrder'=>'t.id DESC') //tambien se puede ordenar desde aqui
	//		));
	//	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Warranties the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	//        public function isnull($valor = NULL, $texto = NULL){
	//            
	//            if(isset($valor)){                
	//                return $valor;
	//            }else if($valor == '' || $valor == NULL) {
	//                $texto = '<span class="label label-warning">Pendiente por asignar RMA <i class="fa fa-eye"></i></span>';
	//                return $texto;
	//            }            
	//        }
}
