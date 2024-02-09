<?php

class RequestsController extends Controller
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
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','updateActive','enviar','cas'),
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
		$model=new Requests;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Requests']))
		{
			$model->attributes=$_POST['Requests'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
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

		if(isset($_POST['Requests']))
		{
			$model->attributes=$_POST['Requests'];
			if($model->save()){
                          if($_POST['Requests']['status'] == 1){
                              if($this->enviar($id)){
                                      Yii::app()->user->setFlash('success', "El correo ha sido enviado con exito al destinatario");
                              }else {
                                        Yii::app()->user->setFlash('success', "El correo no se envio al destinatario, Intente nuevamente el procedimiento");
                                    }
                           }
                        $this->redirect(array('admin'));
                        
                        
                        }
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
		$dataProvider=new CActiveDataProvider('Requests');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Requests('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Requests']))
			$model->attributes=$_GET['Requests'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	public function actionCas()
	{
		$model=new Requests('cas');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Requests']))
			$model->attributes=$_GET['Requests'];

		$this->render('cas',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Requests the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Requests::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Requests $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='requests-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
         public function actionUpdateActive($it = NULL, $s = NULL) {
             
            //if(Yii::app()->authRBAC->checkAccess('requests_active')){
                $model = $this->loadModel($it);
                if ($s == 1) {
                    $model->status = 1;
                    if($this->enviar($it)){
                           $respuesta['request'] = 1;                     
                    }else{  
                           $respuesta['request'] = 0;
                         }
                print CJSON::encode($respuesta);  
                } elseif ($s == 0) {
                    $model->status = 0;
                }              
                    $model->save();
                    
               
           // }else{  throw new CHttpException(403, Yii::app()->params['ErrorAccesoDenegado']); }
    }
    
     public function enviar($id = NULL) {
         
        $sql = 'SELECT Request.comments,Request.tracking,Transport.name Transport_name,Cas.email,Warranty.code,Model.name,Failure.replacement 
                FROM `requests` Request 
                INNER JOIN failures Failure ON (Failure.id = Request.failure_id)
                INNER JOIN warranties Warranty ON (Warranty.id = Request.warranty_id)
                INNER JOIN models Model ON (Model.id = Failure.model_id)
                INNER JOIN cas Cas ON (Cas.id = Warranty.cas_id)
                INNER JOIN transports Transport ON (Transport.id = Request.transport_id)
                Where Request.id  = '.$id.'';
        $list = Yii::app()->db->createCommand($sql)->queryAll();
        $rs = array();
        foreach ($list as $item) {           
            $rs[] = $item['name'];
            $rs[] = $item['replacement'];             
            $rs[] = $item['code'];             
            $rs[] = $item['email'];             
            $rs[] = $item['tracking'];  
            $rs[] = $item['comments'];  
            $rs[] = $item['Transport_name'];  
        }
        
        $mailer = Yii::createComponent('application.extensions.mailer.phpmailer', true);
        $mailer->AddAddress($rs[3]);
//        $mailer->AddAddress('ccavas@thefactoryhka.com');
        $mailer->AddAddress('gsanchez1687@gmail.com');
        $mailer->From = 'contactanos@thefactory.com';
        $mailer->CharSet = 'UTF-8';
        $mailer->FromName = 'Centro Autorizado de  Servicio  - Aprobacion de Partes y Piezas';
        $mailer->WordWrap = 50;
        $mailer->IsHTML(true);
        $mailer->Subject = "Centro Autorizado de Servicio - Aprobacion de Partes y Piezas";
        $mailer->Body = '     
                                <style>
                                 .comentario{width: 100%;word-wrap: break-word;} .container{padding-right:10px;padding-left:10px;margin-right:auto;margin-left:auto}#header,body{margin:0;padding:0}@media (min-width:768px){.container{width:100%}}@media (min-width:992px){.container{width:100%}}@media (min-width:1200px){.container{width:1000px}}body{color:#555;font:400 10pt Arial,Helvetica,sans-serif;background:#F5F5F5}#header{padding-top: 15px;border-top:0 solid #C9E0ED}#page{margin-top:0;margin-bottom:5px;background:#fff;border:0 solid #C9E0ED}#content{padding:20px}.centrado{display:block;margin-left:auto;margin-right:auto}hr{color:#f5f5f5}
                                </style>
                                <body>
                                    <div class="container" id="page">
                                        <div  id="header">
                                            <p><a  href="' . Yii::app()->params["web"] . '" target="_blank"><img class="centrado"  alt="The Factory HKA" src="http://thefactoryhka.com/ve/images/logo.png" style="height:123px; width:287px" /></a></p>
                                        </div>
                                      
                                        <div id="content">
                                            <p><b>Saludos Cordiales.</b></p><br />
                                            <p><b>Señores Centro Autorizado de Servicio :</b></p>
                                            <p>Por medio del presente hacemos de su conocimiento que la solicitud de las partes y/o piezas asociadas a la reparación por Garantía con número  '.$rs[2].', ha sido aprobada por The Factory HKA Bolivia y los respuestos despachados bajo las siguientes condiciones:</p>                                          
                                            <p><b>Trasporte: '.$rs[6].'</b></p>
                                            <p><b>Tracking:</b> '.$rs[4].'</p>
                                            <p><b>Modelo del equipo aprobado:</b> '.$rs[0].'</p>
                                            <p><b>Parte y piezas aprobadas:</b> '.$rs[1].' </p>                                            
                                            <p><b>Observaciones:</b></p>
                                            <p><b>'.$rs[5].'</b></p>
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
        
        $mailer->Username = "contacto@thefactory.com.ve";
        //$mailer->Password = "Contacto@Tfhka";
        $mailer->Mailer = "smtp-relay.gmail.com";
        //$mailer->Host = "ssl://82.98.131.162";
        //$mailer->Port = 465;
        $mailer->SMTPAuth = false;
        $mailer->send();
        return $mailer;
    }
}
