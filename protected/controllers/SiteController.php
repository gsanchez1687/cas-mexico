<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
        
        public function notificacion(){
            
                $criteria = new CDbCriteria;
                $criteria->alias = 'Request';   
                $criteria->select = 'count(Request.status) status';
                $criteria->condition = 'Request.status  = 0';              
                $requests = Requests::model()->findAll($criteria);             
                
                if (isset($requests)) {                    
                     $respuesta['alert'] = $requests;
                     $respuesta['valido'] = 1;
                    
                }else {
                    
                     $respuesta['valido'] = 0;
                }
                print CJSON::encode($respuesta);
        }


        public function actionIndex()
	{
                $criteria = new CDbCriteria;
                $criteria->alias = 'Request';   
                $criteria->select = 'count(Request.status) status';
                $criteria->condition = 'Request.status  = 0';              
                $requests = Requests::model()->findAll($criteria);             
                foreach ($requests as $request):
                 $vector1 =    $request['status'];
                endforeach;
               
               
		$this->render('index',array('vector1'=>$vector1));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		Yii::app()->theme = 'externo';
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()){
                                $this->log('Login','1');                       
                                     $this->redirect(Yii::app()->baseUrl.'/warranties/admin');                              				
                        }
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
                $this->log('Login','2');
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
        
        public function actionRecoverypass() {
            
        Yii::app()->theme = 'externo';
        $model = new RecoveryPass;

        if (isset($_POST['RecoveryPass'])) {
          
            $model->email = $_POST['RecoveryPass']['email'];           
            $criteria = new CDbCriteria;
            $criteria->select = 't.username, t.email, t.password';
            $criteria->condition = 't.email = "'.$model->email.'"';        
            $usuario = Users::model()->find($criteria);  
            
            if (isset($usuario)) { 
              
                  $contraseñaAleatoria = $this->generar();
                  $sha1 = sha1($contraseñaAleatoria);     
                  
                if($this->enviar($usuario->username, $usuario->email, $contraseñaAleatoria)){
                    $connection = Yii::app()->db;
                    $sql = "UPDATE users SET password = '".$sha1."' WHERE email =  '".$model->email."'";
                    $command=$connection->createCommand($sql);
                    $command->execute();
                    Yii::app()->user->setFlash('success', "Se ha enviaro un correo con sus datos");
                    $this->redirect(Yii::app()->baseUrl.'/site/login');
                    
                }
            }else {
                 Yii::app()->user->setFlash('success', "Intente ingresar un correo válido");
                   $this->redirect(Yii::app()->baseUrl.'/site/login');
            }        
        }

        $this->render('recoverypass', array('model' => $model));
    }
    
       public function enviar($username = NULL, $email = null, $contraseñaAleatoria = NULL) {    
        
        $mailer = Yii::createComponent('application.extensions.mailer.phpmailer', true);
        $mailer->AddAddress('gsanchez@thefactoryhka.com');
        $mailer->AddAddress($email);
        $mailer->From = 'contactanos@thefactory.com';
        $mailer->CharSet = 'UTF-8';
        $mailer->FromName = 'Centro de Servicio Autorizado - Recuperacion de Contraseña';
        $mailer->WordWrap = 50;
        $mailer->IsHTML(true);
        $mailer->Subject = "Centro de Servicio Autorizado - Recuperacion de Contraseña";
        $mailer->Body = '<style>
                                .comentario{width: 100%;word-wrap: break-word;} .container{padding-right:10px;padding-left:10px;margin-right:auto;margin-left:auto}#header,body{margin:0;padding:0}@media (min-width:768px){.container{width:100%}}@media (min-width:992px){.container{width:100%}}@media (min-width:1200px){.container{width:1000px}}body{color:#555;font:400 10pt Arial,Helvetica,sans-serif;background:#F5F5F5}#header{padding-top: 15px;border-top:0 solid #C9E0ED}#page{margin-top:0;margin-bottom:5px;background:#fff;border:0 solid #C9E0ED}#content{padding:20px}.centrado{display:block;margin-left:auto;margin-right:auto}hr{color:#f5f5f5}
                        </style>
                        <body>
                                <div class="container" id="page">
                                    <div  id="header">
                                        <p><a  href="http://thefactoryhka.com/ve" target="_blank"><img class="centrado"  alt="The Factory HKA" src="http://thefactoryhka.com/ve/images/logo.png" style="height:123px; width:287px" /></a></p>
                                    </div>

                                    <div id="content">                                      
                                        <p><b>Usuario: '.$username.'</b></p>                                        
                                        <p><b>correo: '.$email.'</b></p>                                        
                                        <p><b>Contraseña: '.$contraseñaAleatoria.'</b></p>                                                                               
                                        <br /><br />
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
                        </body>';                        
        $mailer->IsSMTP();
        $mailer->SMTPAuth = true;
        $mailer->Username = "contact@thefactoryhka.com";
        $mailer->Password = "Contacto@Tfhka";
        $mailer->Mailer = "smtp";
        $mailer->Host = "ssl://82.98.131.162";
        $mailer->Port = 465;
        $mailer->SMTPAuth = true;
        $mailer->send();
        return $mailer;
    }

    
    
        public function log($modulo = NULL, $valor = NULL) {
        
        require_once("geolocalizacion/geoiploc.php"); 
        require_once("mobile/Mobile_Detect.php"); 
        
        $detect = new Mobile_Detect;
        $deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'Tablet' : 'Phone') : 'Computer');      
            
        switch ($valor):
            case "1":  $a = "Ha iniciado sesion el usuario: ".Yii::app()->user->getState('username'); break;
            case "2":  $a = "Ha cerrado sesion el usuario: ".Yii::app()->user->getState('username'); break;
        endswitch;
        
        $ip = $_SERVER["REMOTE_ADDR"]; 

        $log = new Logs();
        $log->user_id = Yii::app()->user->id;
        $log->modulo= $modulo;
        $log->activity = $a;
        $log->country = getCountryFromIP($ip, " NamE");
        $log->ip = $ip;
        $log->date = date("Y-m-d H:i:s");
        $log->device = htmlentities($_SERVER['HTTP_USER_AGENT'])." - ".$deviceType;           
        $log->save();      
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