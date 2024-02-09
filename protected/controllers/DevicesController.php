<?php

class DevicesController extends Controller
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
		//	'postOnly + delete', // we only allow deletion via POST request
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
				'actions'=>array('index','view','mydevice'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','importcsv'),
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
            
                include("geolocalizacion/geoiploc.php");
                include("mobile/Mobile_Detect.php");
                $detect = new Mobile_Detect;
                $deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'Tablet' : 'Phone') : 'Computer');
                $ip = $_SERVER["REMOTE_ADDR"];
        
		$model=new Devices;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Devices']))
		{
			$model->attributes=$_POST['Devices'];   
                        $distributor_id = Distributors::model()->findAll(array('select' => "t.id",'condition' => "t.user_id = ".Yii::app()->user->id));
                            foreach ($distributor_id as $distributor){
                                 $model->distributor_id = $distributor['id'];
                            }                       
                        $model->country_id = Yii::app()->params['Bolivia'];
			if($model->save()){
                                $log = new Logs();
                                $log->user_id = Yii::app()->user->id;
                                $log->modulo = "Devices";
                                $log->activity = "Creado por : " .Yii::app()->user->username . " / ". Yii::app()->user->name . " " .Yii::app()->user->lastname . " / ID " . $model->id;
                                $log->country = getCountryFromIP($ip, " NamE");
                                $log->ip = $_SERVER['REMOTE_ADDR'];
                                $log->date = date("Y-m-d H:i:s");
                                $log->device = htmlentities($_SERVER['HTTP_USER_AGENT']) . " - " . $deviceType;
                                $log->save();
                                Yii::app()->user->setFlash('success',Yii::app()->params['msjsuccess']);                              
				$this->redirect(array('view','id'=>$model->id));
                        }
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

		if(isset($_POST['Devices']))
		{
			$model->attributes=$_POST['Devices'];
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
		$dataProvider=new CActiveDataProvider('Devices');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Devices('search');
		$model->unsetAttributes();
		if(isset($_GET['Devices']))
			$model->attributes=$_GET['Devices'];

		$this->render('admin',array('model'=>$model));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Devices the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Devices::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Devices $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='devices-form')
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
        
        public function actionImportcsv(){    
            
             $model = new Devices();            
             //$dis_id = Users::model()->find('id ='.Yii::app()->user->id);            
             $transaction=$model->dbConnection->beginTransaction();
             try
                {                      
                        if(isset($_POST['Devices'])){
                            $model->attributes=$_POST['Devices'];                    
                            $fname = $_FILES['Devices']['name']; 
                            $chk_ext = explode(".",$fname['file']);
                             if(strtolower(end($chk_ext)) == "csv"){
                                $filename = $_FILES['Devices']['tmp_name'];
                                $handle = fopen($filename['file'], "r");
                                while ($data = fgetcsv($handle,6,",")){
                                                $numero = count($handle);
                                                $model2 = new Devices();                                    
                                                $model2->distributor_id =  $_POST['Devices']['distributor_id'];     /*$dis_id["distributor_id"];*/
                                                $model2->country_id = 29;
                                                $model2->category_id = 1;
                                                $model2->brand_id = $_POST['Devices']['brand_id'];                                 
                                                $model2->model_id = $_POST['Devices']['model_id'];
                                                $model2->name = $data[0];                                   
                                                $model2->sale_date = $_POST['Devices']['sale_date'];
                                                $model2->bill_sale = $_POST['Devices']['bill_sale'];
                                                $model2->active = 1;      
                                                $model2->save();                           
                                       }                            
                                    fclose($handle);
                                    Yii::app()->user->setFlash('success','Se ha importado '.$this->cantidad().' registros');  
                              }
                         }
                   $transaction->commit();
                }/*TRY*/
                catch(Exception $e)
                {
                   $transaction->rollback();
                }
                $this->render('importcsv',array('model'=>$model));
        }
        
        public function cantidad(){    
           $filename = $_FILES['Devices']['tmp_name'];
           $archivo = fopen($filename['file'], "r");
            $num_lineas = 0;
            while (!feof ($archivo)) {                
                if ($linea = fgets($archivo)){                  
                   $num_lineas++;
                }
            }
            fclose ($archivo);           
            return $num_lineas;
        }


        public  function actionMydevice(){
            
            $model = new Devices('searchMyDevice');
            
            $this->render('mydevice',array('model'=>$model));
            
            
        }
}
