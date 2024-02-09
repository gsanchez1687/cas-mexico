<?php
/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $name
 * @property string $lastname
 * @property string $email
 * @property string $phone_local
 * @property string $phone_personal
 * @property integer $rol_id
 * @property integer $cas_id
 * @property integer $distributor_id
 * @property integer $branche_id
 * @property string $address
 * @property integer $status
 * @property string $last_login
 * @property string $created
 * @property string $modified
 *
 * The followings are the available model relations:
 * @property Cas[] $cases
 * @property Distributors[] $distributors
 * @property Logs[] $logs
 * @property Roles $rol
 * @property Cas $cas
 * @property Branches $branche
 * @property Distributors $distributor
 * @property UsersRolesItems[] $usersRolesItems
 * @property Warranties[] $warranties
 */
class Users extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}
        
        public function validatePassword($password) {
           return $this->hashPassword($password) === $this->password;
        }
        
        public function hashPassword($password) {
          return sha1($password);
        }
        
        protected function generateSalt($cost = 10) {
        if (!is_numeric($cost) || $cost < 4 || $cost > 31) {
            throw new CException(Yii::t('Cost parameter must be between 4 and 31.'));
        }
        // Get some pseudo-random data from mt_rand().
        $rand = '';
        for ($i = 0; $i < 8; ++$i)
            $rand.=pack('S', mt_rand(0, 0xffff));
        // Add the microtime for a little more entropy.
        $rand.=microtime();
        // Mix the bits cryptographically.
        $rand = sha1($rand, true);
        // Form the prefix that specifies hash algorithm type and cost parameter.
        $salt = '$2a$' . str_pad((int) $cost, 2, '0', STR_PAD_RIGHT) . '$';
        // Append the random salt string in the required base64 format.
        $salt.=strtr(substr(base64_encode($rand), 0, 22), array('+' => '.'));
        return $salt;
       }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, name,lastname, email,rol_id,phone_local, phone_personal, rol_id', 'required'),
			array('rol_id, cas_id, status, phone_personal, phone_local, branche_id, status, distributor_id', 'numerical', 'integerOnly'=>true),
			array('username', 'length', 'max'=>15),
			array('password, name, email', 'length', 'max'=>100),
                        array('email', 'email'),
                        array('file', 'file','types'=>'jpg, jpeg, png, gif','maxSize'=>1024*1024*3,'tooLarge'=>'El archivo no puede exceder los 3MB.','allowEmpty'=>true), 
			array('lastname,password, phone_local, phone_personal', 'length', 'max'=>50),
			array('address, created, modified', 'safe'),
                        array('modified','default','value'=>new CDbExpression('NOW()'),'setOnEmpty'=>false,'on'=>'update'),
                        array('created,modified','default','value'=>new CDbExpression('NOW()'),'setOnEmpty'=>false,'on'=>'insert'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, password, name, lastname, email, phone_local, phone_personal, rol_id, cas_id,  branche_id, address, status, created, modified', 'safe', 'on'=>'search'),
			array('id, username, password, name, lastname, email, phone_local, phone_personal, rol_id, cas_id,  branche_id, address, status, created, modified', 'safe', 'on'=>'technician'),
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
                        'cases' => array(self::HAS_MANY, 'Cas', 'user_id'),
                        'distributors' => array(self::HAS_MANY, 'Distributors', 'user_id'),
                        'logs' => array(self::HAS_MANY, 'Logs', 'user_id'),
                        'rol' => array(self::BELONGS_TO, 'Roles', 'rol_id'),
                        'cas' => array(self::BELONGS_TO, 'Cas', 'cas_id'),
                        'branche' => array(self::BELONGS_TO, 'Branches', 'branche_id'),
                        'distributor' => array(self::BELONGS_TO, 'Distributors', 'distributor_id'),
                        'usersRolesItems' => array(self::HAS_MANY, 'UsersRolesItems', 'user_id'),
                        'warranties' => array(self::HAS_MANY, 'Warranties', 'technical_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Nombre de Usuario',
			'password' => 'Contraseña',
			'name' => 'Nombres',
			'lastname' => 'Apellidos',
			'email' => 'Correo',
			'file' => 'Imagen de perfil',
			'phone_local' => 'Teléfono Local',
			'phone_personal' => 'Teléfono Personal',
			'rol_id' => 'Rol',
			'cas_id' => 'Cas',
			'distributor_id' => 'Distribuidor',
			'address' => 'Dirección',
			'status' => 'Estado',
                        'last_login' => 'Ultimo login',
			'created' => 'Creado',
			'modified' => 'Modificado',
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
                    $criteria->compare('t.username',$this->username,true);
                    $criteria->compare('t.password',$this->password,true);
                    $criteria->compare('t.name',$this->name,true);
                    $criteria->compare('t.lastname',$this->lastname,true);
                    $criteria->compare('t.email',$this->email,true);
                    $criteria->compare('t.file',$this->file,true);
                    $criteria->compare('t.phone_local',$this->phone_local,true);
                    $criteria->compare('t.phone_personal',$this->phone_personal,true);
                    $criteria->compare('t.rol_id',$this->rol_id);
                    $criteria->compare('t.cas_id',$this->cas_id);
                    $criteria->compare('t.distributor_id',$this->distributor_id);
                    $criteria->compare('t.branche_id',$this->branche_id);
                    $criteria->compare('t.address',$this->address,true);
                    $criteria->compare('t.status',$this->status);
                    $criteria->compare('t.last_login',$this->last_login,true);
                    $criteria->compare('t.created',$this->created,true);
                    $criteria->compare('t.modified',$this->modified,true);
                
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'sort'=>array('defaultOrder'=>'t.id DESC') //tambien se puede ordenar desde aqui
		));
	}
        
        public function technician() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;
        $criteria->compare('t.id', $this->id);
        $criteria->compare('t.username', $this->username, true);
        $criteria->compare('t.password', $this->password, true);
        $criteria->compare('t.name', $this->name, true);
        $criteria->compare('t.lastname', $this->lastname, true);
        $criteria->compare('t.email', $this->email, true);
        $criteria->compare('t.file', $this->file, true);
        $criteria->compare('t.phone_local', $this->phone_local, true);
        $criteria->compare('t.phone_personal', $this->phone_personal, true);
        $criteria->compare('t.rol_id', $this->rol_id);
        $criteria->compare('t.cas_id', $this->cas_id);
        $criteria->compare('t.distributor_id', $this->distributor_id);
        $criteria->compare('t.branche_id', $this->branche_id);
        $criteria->compare('t.address', $this->address, true);
        $criteria->compare('t.status', $this->status);
        $criteria->compare('t.last_login', $this->last_login, true);
        $criteria->compare('t.created', $this->created, true);
        $criteria->compare('t.modified', $this->modified, true);

        $criteria->compare('t.cas_id', Yii::app()->user->getState('cas_id'));

        $criteria->with = array('rol');
        
        $criteria->condition = "t.cas_id = ".Yii::app()->user->getState('id');

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort' => array('defaultOrder' => 't.id DESC') //tambien se puede ordenar desde aqui
        ));
    }

    /**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        

}
