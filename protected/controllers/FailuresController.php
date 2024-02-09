<?php

class FailuresController extends Controller
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
				'actions'=>array('create','update','Importfailures'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
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
                $model=new Failures;

                // Uncomment the following line if AJAX validation is needed
                // $this->performAjaxValidation($model);

                if(isset($_POST['Failures']))
                {
                    $model->attributes=$_POST['Failures'];
                    if($model->save()){
                        $this->redirect(array('view','id'=>$model->id));
                        Yii::app()->user->setFlash('success','Se ha guardado la falla'); 
                    }
                }

                $this->render('create',array(
                    'model'=>$model,
                ));
            }


        public function actionImportfailures()
	{
		$model=new Failures;
                $transaction=$model->dbConnection->beginTransaction();
                try
                {   
                    if(isset($_POST['Failures'])){
			$model->attributes=$_POST['Failures'];
			$fname = $_FILES['Failures']['name']; 
                             $chk_ext = explode(".",$fname['file']);
                             if(strtolower(end($chk_ext)) == "csv"){
                                $filename = $_FILES['Failures']['tmp_name'];
                                $handle = fopen($filename['file'], "r");
                                while ($data = fgetcsv($handle,200,",")) {
                                                $numero = count($handle);
                                                $model = new Failures();                                       
                                                $model->brand_id = $_POST['Failures']['brand_id'];                                 
                                                $model->model_id = $_POST['Failures']['model_id'];
                                                $model->description_failure = $data[0];                                   
                                                $model->solution = $data[1];                                   
                                                $model->replacement = $data[2];                                   
                                                $model->description_replacement = $data[3];                                                                                 
                                                $model->active = $_POST['Failures']['active'];      
                                                $model->save();                           
                                       }                            
                                    fclose($handle);
                                    Yii::app()->user->setFlash('success','Se ha importado '.$this->cantidad().' registros');  				
                            }
                    }
                   $transaction->commit();
                }
                catch(Exception $e)
                {
                   $transaction->rollback();
                }

		

		

		$this->render('importfailures',array('model'=>$model));
	}
        
        public function cantidad(){    
           $filename = $_FILES['Failures']['tmp_name'];
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

		if(isset($_POST['Failures']))
		{
			$model->attributes=$_POST['Failures'];
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
		$dataProvider=new CActiveDataProvider('Failures');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Failures('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Failures']))
			$model->attributes=$_GET['Failures'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Failures the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Failures::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Failures $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='failures-form')
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
}
