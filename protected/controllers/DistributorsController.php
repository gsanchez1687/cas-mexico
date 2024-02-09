<?php

class DistributorsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			//'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','updateActive'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
    
		$model=new Distributors;
                $User = new Users;		

		if(isset($_POST['Distributors']))
		{
			$model->attributes=$_POST['Distributors'];
                        $model->user_id = Yii::app()->user->id;/*El ID de quien agrego el CAS*/
                        $model->country_id = 29;  
                        
			if($model->save()){
                                
                                $contraseñaAleatoria = $this->generar();
                                $sha1 = sha1($contraseñaAleatoria);
                                $this->enviar($model->name,$contraseñaAleatoria,$model->email);
                                
                                
                                $User->username = $_POST['Users']['username'];
                                $User->password = $sha1;
                                $User->name = $model->name;
                                $User->phone_local = $model->phone_local;
                                $User->phone_personal = $model->phone_personal;
                                $User->email = $model->email;
                                $User->address = $model->address;
                                $User->distributor_id = $model->id;
                                $User->rol_id = 5;
                                $User->status = 0;
                                $User->save();
                
                                Yii::app()->user->setFlash('success',Yii::app()->params['msjsuccess']);                                
				$this->redirect(array('view','id'=>$model->id));
                        }
		}

		$this->render('create',array('model'=>$model,'User'=>$User));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Distributors']))
		{
			$model->attributes=$_POST['Distributors'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Distributors');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Distributors('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Distributors']))
			$model->attributes=$_GET['Distributors'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Distributors the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Distributors::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Distributors $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='distributors-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        public function actionUpdateActive($it = NULL, $s = NULL) {
       
        $model = $this->loadModel($it);
        if ($s == 1) {
            $model->active = 1;          
        } elseif ($s == 0) {
            $model->active = 0;           
        }
        if ($model->validate()) {
           $model->save();
        }
    }
    
        public function enviar($username = NULL,$password = NULL, $email = NULL) {

        $mailer = Yii::createComponent('application.extensions.mailer.phpmailer', true);
        $mailer->AddAddress('gsanchez1687@gmail.com');
        $mailer->AddAddress('ccavas@thefactoryhka.com');
        $mailer->AddAddress($email);
        $mailer->From = 'contactanos@thefactory.com';
        $mailer->CharSet = 'UTF-8';
        $mailer->FromName = 'Centro Autorizado de Servicio';
        $mailer->WordWrap = 50;
        $mailer->IsHTML(true);
        $mailer->Subject = "Acceso al CAS";
        $mailer->Body = '     
                                <style>
                                 .comentario{width: 100%;word-wrap: break-word;} .container{padding-right:10px;padding-left:10px;margin-right:auto;margin-left:auto}#header,body{margin:0;padding:0}@media (min-width:768px){.container{width:100%}}@media (min-width:992px){.container{width:100%}}@media (min-width:1200px){.container{width:1000px}}body{color:#555;font:400 10pt Arial,Helvetica,sans-serif;background:#F5F5F5}#header{padding-top: 15px;border-top:0 solid #C9E0ED}#page{margin-top:0;margin-bottom:5px;background:#fff;border:0 solid #C9E0ED}#content{padding:20px}.centrado{display:block;margin-left:auto;margin-right:auto}hr{color:#f5f5f5}
                                </style>
                                <body>
                                    <div class="container" id="page">
                                        <div  id="header">
                                            <p><a  href="' . Yii::app()->params["web"] . '" target="_blank"><img class="centrado"  alt="The Factory HKA" src="http://thefactoryhka.com/cas/images/internacional.jpg" style="height:123px; width:287px" /></a></p>
                                        </div>
                                      
                                        <div id="content">
                                            <p><b>Centro de Servicio Autorizado le da la bienvenida</b></p>
                                            <p>Estos son sus datos de acceso al CAS<p>
                                            <p><b>Usuario:</b> '.$username.'</p>
                                            <p><b>Contraseña:</b> '.$password.'</p>
                                            <p><b>Link:</b><a href="http://thefactoryhka.com/cas/">http://thefactoryhka.com/cas/</a></p>
                                            <br />
                                            <p><b>NO RESPONDER ESTE EMAIL</b></p>
                                            <p><b>Atentamente</b></p>
                                            <p><b>The Factory HKA C.A.</b></p>

                                            <p>
                                                <a href="https://twitter.com/EquipoFiscal" target="_blank"><img alt="twitter" src="http://thefactoryhka.com/bo/images/twitter_min.png" style="height:64px; width:64px" /></a>
                                                <a href="https://www.facebook.com/impresora.fiscal" target="_blank"><img alt="twitter" src="http://thefactoryhka.com/bo/images/facebook_min.png" style="height:64px; width:64px" /></a>
                                            </p>        
                                            <p><b>J-31217119-7</b></p>
                                        </div>
                                    </div>
                                </body>
                                ';
        $mailer->IsSMTP();
        $mailer->SMTPAuth = true;
        $mailer->Username = "contact@thefactoryhka.com";
        //$mailer->Password = "Contacto@Tfhka";
        $mailer->Mailer = "smtp-relay.gmail.com";
        $mailer->Host = "ssl://82.98.131.162";
        //$mailer->Port = 465;
        $mailer->SMTPAuth = false;
        $mailer->send();
        return $mailer;
    }
    
    public function generar() {
        $pass = "";
        //Definimos toda la serie de caracteres que queremos incluir en nuestras contraseñas
        $patron = "abcdefghijklmnopqrstuvwxyz";

        $longitud = strlen($patron); //obtenemos la longitud del patron
        $i = 0;

        while ($i < 8) { //obtenemos una cadena de 8 caracteres del patron, obtener un caracter al azar
            $valor = substr($patron, rand(0, $longitud - 1), 1);
            $pass.=$valor; //incluirlo en pass
            $i++;
        }

        return $pass; //una vez termina que retorne el resultado
    }
}
