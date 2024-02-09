<?php

class WarrantiesController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

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
            array(
                'allow',  // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array(
                'allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('aprobarrma', 'create', 'update', 'serial', 'nit', 'upload', 'saveclient', 'editclient', 'editrma', 'saverma', 'exportPdf', 'Actualizar', 'enviar', 'warrantiestatus', 'polls', 'cerrarrma', 'cas'),
                'users' => array('@'),
            ),
            array(
                'allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('@'),
            ),
            array(
                'deny',  // deny all users
                'users' => array('*'),
            ),
        );
    }



    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $criteria = new CDbCriteria;
        $criteria->alias = 'FailuresWarranties';
        $criteria->join = "INNER JOIN failures Failure ON (Failure.id = FailuresWarranties.failure_id )";
        $criteria->condition = 'FailuresWarranties.warranty_id = ' . $id;
        $FailuresWarranties = FailuresWarranties::model()->findAll($criteria);

        $criteria2 = new CDbCriteria;
        $criteria2->condition = 't.category = 1 AND t.warranty_id = ' . $id;
        $FilesWarranties = FilesWarranties::model()->findAll($criteria2);

        $criteria3 = new CDbCriteria;
        $criteria3->condition = 't.warranty_id = ' . $id;
        $FilesPolls = FilesPolls::model()->findAll($criteria3);

        $criteria4 = new CDbCriteria;
        $criteria4->condition = 't.category = 2 AND t.warranty_id = ' . $id;
        $FilesWarrantiesimagen = FilesWarranties::model()->findAll($criteria4);

        foreach ($FilesPolls as $FilesPoll) :
            $file_polls =  $FilesPoll['file'];
        endforeach;

        foreach ($FilesWarranties as $FilesWarrantie) :
            $file_warrentiers =  $FilesWarrantie['file'];
        endforeach;

        foreach ($FilesWarrantiesimagen as $FilesWarrantiesimage) :
            $registro_fotografico =  $FilesWarrantiesimage['file'];
        endforeach;

        $this->render('view', array(
            'model' => $this->loadModel($id),
            'FailuresWarranties' => @$FailuresWarranties,
            'file_warrentiers' => @$file_warrentiers,
            'file_polls' => @$file_polls,
            'registro_fotografico' => $FilesWarrantiesimagen,
        ));
    }

    public function actionexportpdf($id)
    {

        $mPDF1 = Yii::app()->ePdf->mpdf();
        Yii::app()->theme = "pdf";
        $criteria = new CDbCriteria;
        $criteria->alias = 'FailuresWarranties';
        $criteria->join = "INNER JOIN failures Failure ON (Failure.id = FailuresWarranties.failure_id )";
        $criteria->condition = 'FailuresWarranties.warranty_id = ' . $id;
        $FailuresWarranties = FailuresWarranties::model()->findAll($criteria);

        $model = $this->loadModel($id);
        $header = '<table class="demo2">               
                        <thead>
                        <tr>
                                <th>FECHA</th>
                                <th>PÁGINA</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                                 <td>' . $model->date_customer_complaint . '</td>
                                 <td>1</td>
                        </tr>
                        </tbody>
                    </table>
                    <table class="demo2">
                    <thead>
                        <tr>
                            <th style="text-align: center" >Código del RMA</th>                
                        </tr>
                    </thead>
                        <tr>
                            <td  style="text-align: center"><b>' . $model->code . '</b></td>
                        </tr>
                    </table>';
        $mPDF1->SetHTMLHeader($header);

        $mPDF1->WriteHTML($this->render(
            'exportpdf',
            array(
                'model' => $model,
                'FailuresWarranties' => $FailuresWarranties
            ),
            true
        ));
        $mPDF1->Output();
    }

    public function actionPolls($id = NULL)
    {

        $mPDF1 = Yii::app()->ePdf->mpdf();
        Yii::app()->theme = "pdf";


        $model = $this->loadModel($id);
        $header = '<table class="demo2">               
                        <thead>
                        <tr>
                                <th>FECHA</th>
                                <th>PÁGINA</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                                 <td>' . $model->date_customer_complaint . '</td>
                                 <td>1</td>
                        </tr>
                        </tbody>
                    </table>
                    <table class="demo2">
                    <thead>
                        <tr>
                            <th style="text-align: center" >Código del RMA</th>                
                        </tr>
                    </thead>
                        <tr>
                            <td  style="text-align: center"><b>' . $model->code . '</b></td>
                        </tr>
                    </table>
                    ';
        $mPDF1->SetHTMLHeader($header);

        $mPDF1->WriteHTML($this->render('polls', array('model' => $model,), true));
        $mPDF1->Output();
    }

    public function autoincremento()
    {

        $criterio = new CDbCriteria();
        $criterio->select = "max(t.code) code";
        $cas = Warranties::model()->findAll($criterio);
        foreach ($cas as $ca) {
            $var = $ca['code'];
        }
        $a = substr($var, strrpos($var, '-') + 5);
        $b = $a + 1;

        $serial = $b;
        $digitos = 4;
        $i = strlen($serial);
        $string = '';
        while ($i < $digitos) {
            $string .= '0';
            $i++;
        }
        $serial_final = $string . $serial;
        return $serial_final;
    }

    public function Codigo()
    {

        $rma = 'RMA';
        $pais = Yii::app()->params['pais'];
        $hoy = date("Y");
        $b = $this->autoincremento();
        $codigo = $rma . "-" . $pais . "-" . $hoy . $b;
        return $codigo;
    }

    public function warrantiestatus($id = NULL)
    {

        $criterio = new CDbCriteria();
        $criterio->select = "t.statu_id";
        $criterio->condition = "t.id =" . $id;
        $WarrantiesStatus = Warranties::model()->findAll($criterio);

        foreach ($WarrantiesStatus as $WarrantiesStatu) :
            $a = $WarrantiesStatu['statu_id'];
        endforeach;

        return $a;
    }

    public function cas()
    {

        $criterio = new CDbCriteria();
        $criterio->join = "INNER JOIN cas AS Cas ON (t.cas_id = Cas.id)";
        $criterio->condition = "t.rol_id = 3 AND t.cas_id=" . Yii::app()->user->getState('cas_id');
        $casUser = Users::model()->findAll($criterio);

        foreach ($casUser as $cas) :
            $casName = $cas['name'];
        endforeach;

        return $casName;
    }


    public function loadcodigo($id = NULL)
    {

        $criteria = new CDbCriteria;
        $criteria->alias = 'Warranty';
        $criteria->condition = 'Warranty.id  = ' . $id;
        $criteria->select = "code";

        $var = Warranties::model()->findAll($criteria);
        foreach ($var as $a) :
            $b = $a['code'];
        endforeach;
        return $b;
    }

    public function actionCas()
    {
        unset(Yii::app()->request->cookies['contador']);
        $model = new Warranties('cas');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Warranties']))
            $model->attributes = $_GET['Warranties'];

        $this->render('cas', array(
            'model' => $model,
        ));
    }

    /*esta funcion busca en la tabla Accessories Warranties /*/
    public function loadModelAccessorieWarranties($id)
    {
        $model =  AccessorieWarranties::model()->find('t.warranty_id = ' . $id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function loadModel($id)
    {
        $model = Warranties::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function loadModelcustomer($id)
    {
        $model =  Customers::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function customerid($var = NULL)
    {
        $criterio = new CDbCriteria();
        $criterio->condition = "t.nit = " . $var;
        $result = Customers::model()->findAll($criterio);

        foreach ($result as $resul) :
            $nit = $resul['id'];
        endforeach;

        return $nit;
    }

    public function deviceid($var = NULL)
    {
        $criterio = new CDbCriteria();
        $criterio->condition = "t.name = '$var' ";
        $result = Devices::model()->findAll($criterio);

        foreach ($result as $resul) :
            $id = $resul['id'];
        endforeach;

        return $id;
    }
    public function Customernit($id = NULL)
    {
        $criterio = new CDbCriteria();
        $criterio->alias = 'Customer';
        $criterio->select = 'Customer.nit';
        $criterio->join = 'INNER JOIN warranties Warranty ON (Customer.id = Warranty.customer_id)';
        $criterio->condition = "Warranty.id = " . $id;
        $results = Customers::model()->findAll($criterio);
        foreach ($results as $result) :
            $b = $result['nit'];
        endforeach;
        return $b;
    }
    public function loadAccessories($id = NULL)
    {
        $criterio = new CDbCriteria();
        $criterio->select = "Accessory.id,Accessory.name";
        $criterio->join = "INNER JOIN accessories AS Accessory ON (t.accessorie_id = Accessory.id ) ";
        $criterio->condition = "t.warranty_id = " . $id;
        $result = AccessorieWarranties::model()->find($criterio);

        return $result;
    }
    public function loaddevice($id = NULL)
    {

        $criteria = new CDbCriteria;
        $criteria->alias = 'Warranty';
        $criteria->join = "INNER JOIN devices as Device ON (Warranty.device_id = Device.id)";
        $criteria->condition = 'Warranty.id  = ' . $id;
        $criteria->select = "Device.name";
        $var = Warranties::model()->findAll($criteria);
        foreach ($var as $a) :
            $b = $a['name'];
        endforeach;
        return $b;
    }
    public function loadDisposicion($id = NULL)
    {

        $criteria = new CDbCriteria;
        $criteria->alias = 'Warranty';
        $criteria->condition = 'Warranty.id  = ' . $id;
        $criteria->select = "Warranty.disposition_id";
        $var = Warranties::model()->findAll($criteria);
        foreach ($var as $a) :
            $b = $a['disposition_id'];
        endforeach;
        return $b;
    }
    public function loadAccessoriewarranties($id = NULL)
    {

        $criteria = new CDbCriteria;
        $criteria->alias = 'Accessoriewarranties';
        $criteria->select = "Accessory.name, Accessory.id";
        $criteria->join = "INNER JOIN warranties Warranty ON (Accessoriewarranties.warranty_id = Warranty.id) INNER JOIN accessories Accessory ON (Accessoriewarranties.accessorie_id = Accessory.id)";
        $criteria->condition = 'Warranty.id  = ' . $id;
        $var = AccessorieWarranties::model()->findAll($criteria);
        $xx = array();
        foreach ($var as $a) :
            $xx[$a['id']] = $a['id'];
        endforeach;
        return $xx;
    }

    public function loadFilesWarranties($id = NULL)
    {

        $criteria = new CDbCriteria;
        $criteria->alias = 'FilesWarranty';
        $criteria->select = "FilesWarranty.file";
        $criteria->condition = 'FilesWarranty.warranty_id = ' . $id . ' and FilesWarranty.category = 2';
        $var = FilesWarranties::model()->findAll($criteria);
        return $var;
    }
    public function loadFilures($iddevice = NULL)
    {

        $consulta = Devices::model()->find('name = "' . $iddevice . '"');
        $Failures = Failures::model()->findAll('model_id = "' . $consulta['model_id'] . '" and active = "1"');
        foreach ($Failures as $Failure) :
            $xx =  $Failure['model_id'];
        endforeach;

        return $xx;
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        Yii::app()->request->cookies['contador'] = new CHttpCookie('contador', 0);
        $model = new Warranties;
        $modelCustomers = new Customers();
        $modelDevices = new Devices();
        $modelDispositions = new Dispositions();
        $modelReasonReturns = new ReasonReturns();
        $modelAccessories = new Accessories();
        unset(Yii::app()->request->cookies['cookie_name0']);
        unset(Yii::app()->request->cookies['cookie_name1']);
        $codigoRMA =  $this->Codigo();

        if (isset($_POST['Warranties'])) {
            $model->attributes = $_POST['Warranties'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('create', array(
            'model' => $model,
            'modelCustomers' => $modelCustomers,
            'modelDevices' => $modelDevices,
            'modelDispositions' => $modelDispositions,
            'modelReasonReturns' => $modelReasonReturns,
            'codigoRMA' => $codigoRMA,
            'modelAccessories' => $modelAccessories,
        ));
    }
    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);
        $modelCustomers = new Customers();
        $Customernit = $this->Customernit($id);
        $modelDispositions = new Dispositions();
        $disposicion_id = $this->loadDisposicion($id);
        $modelAccessories = new Accessories();
        $loadAccessoriewarranties = $this->loadAccessoriewarranties($id);
        $iddevice =  $this->loaddevice($id);
        $modelDevices = new Devices();
        $loadFilesWarranties = $this->loadFilesWarranties($id);
        $model_id = $this->loadFilures($iddevice);

        /*METER UN CGridView Failure en Warranties y filtrado*/
        $modelFailures = new Failures('search');
        $_SESSION["prueba"] = array();
        $modelFailures->unsetAttributes();  // clear any default values
        if (isset($_GET['Failures'])) {
            $modelFailures->attributes = $_GET['Failures'];
        }
        $modelFailures->model_id = $model_id; /*filtro*/
        /*fin */


        if (isset($_POST['Warranties'])) {
            $model->attributes = $_POST['Warranties'];
            if ($model->save()) {
                $this->redirect(array('view', 'id' => $model->id));
            }
        }
        $this->render('update', array(
            'model' => $model,
            'modelCustomers' => $modelCustomers,
            'Customernit' => $Customernit,
            'modelDevices' => $modelDevices,
            'modelDispositions' => $modelDispositions,
            'disposicion_id' => $disposicion_id,
            'loadFilesWarranties' => $loadFilesWarranties,
            //                                     'codigoRMA' => $codigoRMA,
            'modelAccessories' => $modelAccessories,
            'loadAccessoriewarranties' => $loadAccessoriewarranties,
            'iddevice' => $iddevice,
            'modelFailures' => $modelFailures,
            //                                     'codigo'=>$codigo,
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
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $dataProvider = new CActiveDataProvider('Warranties');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {

        unset(Yii::app()->request->cookies['contador']);
        $model = new Warranties('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Warranties']))
            $model->attributes = $_GET['Warranties'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }


    public function actionCerrarRma($id = NULL)
    {

        $modelFilesPolls = new FilesPolls();
        $modelFilesWarranties = new FilesWarranties();
        $model = $this->loadModel($id);

        $criteria = new CDbCriteria;
        $criteria->condition = 't.file IS NOT NULL AND t.warranty_id = ' . $id;
        $FilesPolls = FilesPolls::model()->findAll($criteria);
        $cerrado = '';
        if ($FilesPolls == NULL) {
            $cerrado = 0;
        } else {
            $cerrado = 1;
        }

        $criteria = new CDbCriteria;
        $criteria->condition = 't.file IS NOT NULL AND t.warranty_id = ' . $id;
        $FilesWarranties = FilesWarranties::model()->findAll($criteria);
        $cerrado2 = '';
        if ($FilesWarranties == NULL) {
            $cerrado2 = 0;
        } else {
            $cerrado2 = 1;
        }

        if (isset($_POST['FilesWarranties'])) {
            $modelFilesWarranties->attributes = $_POST['FilesWarranties'];
            $file = CUploadedFile::getInstance($modelFilesWarranties, "file");
            $extension = end(explode(".", $file->name));
            $name = $modelFilesWarranties->name;
            $name = str_replace("_", " ", $name);
            $file->saveAs(Yii::getPathOfAlias("webroot") . "/uploads/RMA/" . $name . "." . $extension);

            $modelFilesWarranties->file = $name . "." . $extension;
            $modelFilesWarranties->category = 1;
            $modelFilesWarranties->warranty_id = $id;
            $modelFilesWarranties->created = date("Y-m-d H:i:s");
            $modelFilesWarranties->save();
        }

        if (isset($_POST['Warranties'])) {
            $model->attributes = $_POST['Warranties'];
            $model->statu_id = $_POST['Warranties']['statu_id'];
            if ($model->save())
                $this->redirect(array('/Warranties/admin'));
        }


        if (isset($_POST['FilesPolls'])) {
            $modelFilesPolls->attributes = $_POST['FilesPolls'];
            $file = CUploadedFile::getInstance($modelFilesPolls, "file");
            $extension = end(explode(".", $file->name));
            $name = $modelFilesPolls->name;
            $name = str_replace("_", " ", $name);
            $file->saveAs(Yii::getPathOfAlias("webroot") . "/uploads/encuestas/" . $name . "." . $extension);

            $modelFilesPolls->file = $name . "." . $extension;
            $modelFilesPolls->warranty_id = $id;
            $modelFilesPolls->created =  date("Y-m-d H:i:s");
            $modelFilesPolls->save();
        }

        $this->render('cerrar', array('modelFilesPolls' => $modelFilesPolls, 'model' => $model, 'cerrado' => $cerrado, 'modelFilesWarranties' => $modelFilesWarranties, 'cerrado2' => $cerrado2));
    }


    /**
     * Performs the AJAX validation.
     * @param Warranties $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'warranties-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function wd($serial = NULL)
    {

        $sql = 'SELECT Warranty.code FROM warranties_devices t
                    INNER JOIN devices as Device ON (Device.id = t.device_id) 
                    INNER JOIN warranties  Warranty ON (Warranty.id = t.warranty_id) 
                    WHERE Device.name = "' . $serial . '"';
        $list = Yii::app()->db->createCommand($sql)->queryAll();

        $rs = array();
        foreach ($list as $item) {
            $rs[] = $item['code'];
        }
        return $rs;
    }

    public function warrantystatu($serial = NULL)
    {

        $sql = 'SELECT Warranty.statu_id FROM warranties_devices t
                    INNER JOIN devices as Device ON (Device.id = t.device_id) 
                    INNER JOIN warranties  Warranty ON (Warranty.id = t.warranty_id) 
                    WHERE Device.name = "' . $serial . '"';
        $list = Yii::app()->db->createCommand($sql)->queryAll();

        $rs = array();
        foreach ($list as $item) {
            $rs[] = $item['statu_id'];
        }
        return $rs;
    }
    public function wdid($serial = NULL)
    {

        $sql = 'SELECT Warranty.id FROM warranties_devices t
                    INNER JOIN devices as Device ON (Device.id = t.device_id) 
                    INNER JOIN warranties  Warranty ON (Warranty.id = t.warranty_id) 
                    WHERE Device.name = "' . $serial . '"';
        $list = Yii::app()->db->createCommand($sql)->queryAll();

        $rs = array();
        foreach ($list as $item) {
            $rs[] = $item['id'];
        }
        return $rs;
    }


    public function actionSerial($serial = NULL)
    {

        try {

            $serial = $_POST['serial'];
            $consulta = Devices::model()->find('name = "' . $serial . '"');
            $Failures = Failures::model()->findAll('model_id = "' . $consulta['model_id'] . '" and active = "1"');
            $code = $this->wd($serial);
            $codeid = $this->wdid($serial);
            $status = $this->warrantystatu($serial);

            if (isset($consulta)) {
                $respuesta['datos'] = $consulta;
                $respuesta['code'] = $code;
                $respuesta['id'] = $codeid;
                $respuesta['fallas'] = $Failures;
                $respuesta['statu_id'] = $status;
                $respuesta['valido'] = 1;
            } else {
                $respuesta['valido'] = 0;
            }

            print CJSON::encode($respuesta);
        } catch (Exception $e) {
            $respuesta['valido'] = 0;
            print CJSON::encode($respuesta);
        }
    }

    public function actionUpload()
    {

        $filename = $_FILES['Warranties']['name']['file'];
        $folder = 'uploads/registro_fotografico/';
        $move =  move_uploaded_file($_FILES['Warranties']['tmp_name']['file'], "$folder/$filename");
        $fileName = $_FILES['Warranties']['name']['file'];

        if (!empty($move)) {
            Yii::app()->request->cookies['cookie_name' . Yii::app()->request->cookies['contador']] = new CHttpCookie('cookie_name' . Yii::app()->request->cookies['contador'], $fileName);
        }

        Yii::app()->request->cookies['contador'] = new CHttpCookie('contador', 1);
    }

    public function actionNit($nit = NULL)
    {

        try {
            $nit = $_POST['nit'];
            $consulta = Customers::model()->find('nit = ' . $nit);
            if ($consulta) {
                $respuesta['datos'] = $consulta;
                $respuesta['valido'] = 1;
            } else {
                $respuesta['valido'] = 0;
            }

            print CJSON::encode($respuesta);
        } catch (Exception $e) {

            $respuesta['valido'] = 0;
            print CJSON::encode($respuesta);
        }
    }


    public function actionSaveclient($nit = NULL, $Customers_name = NULL, $Customers_address_fiscal = NULL, $Customers_city_id = NULL, $Customers_phone = NULL, $Customers_email = NULL)
    {

        try {
            $model = new Customers();
            $Customers_name = $_POST['Customers_name'];
            $nit = $_POST['nit'];
            $Customers_address_fiscal = $_POST['Customers_address_fiscal'];
            $Customers_city_id = $_POST['Customers_city_id'];
            $country = 146;
            $Customers_phone = $_POST['Customers_phone'];
            $Customers_email = $_POST['Customers_email'];
            $command = Yii::app()->db->createCommand();
            $command->insert('customers', array('nit' => $nit, 'name' => $Customers_name, 'address_fiscal' => $Customers_address_fiscal, 'city_id' => $Customers_city_id, 'country_id' => $country, 'phone' => $Customers_phone, 'email' => $Customers_email));

            if ($command) {
                $this->log('Registro Cliente CAS', '3');
                $respuesta['valido'] = 1;
            } else {
                $respuesta['valido'] = 0;
            }

            print CJSON::encode($respuesta);
        } catch (Exception $e) {
            $this->log('Registro Cliente CAS', '4');
            $respuesta['valido'] = 0;
            print CJSON::encode($respuesta);
        }
    }
    public function actionEditclient($id = NULL, $nit = NULL, $Customers_name = NULL, $Customers_address_fiscal = NULL, $Customers_city_id = NULL, $Customers_phone = NULL, $Customers_email = NULL)
    {

        //            try{    
        $id = $_POST['Customers_id'];
        $model = Customers::model()->findByPk($id);
        $nit = $_POST['nit'];
        $Customers_name = $_POST['Customers_name'];
        $Customers_address_fiscal = $_POST['Customers_address_fiscal'];
        $Customers_city_id = $_POST['Customers_city_id'];
        $country = 146;
        $Customers_phone = $_POST['Customers_phone'];
        $Customers_email = $_POST['Customers_email'];


        $model->nit = $nit;
        $model->name = $Customers_name;
        $model->address_fiscal = $Customers_address_fiscal;
        $model->city = $Customers_city_id;
        $model->country = $country;
        $model->phone = $Customers_phone;
        $model->email = $Customers_email;

        $command = Yii::app()->db->createCommand();
        $command =  $model->update('customers', array('nit' => $nit, 'name' => $Customers_name, 'address_fiscal' => $Customers_address_fiscal, 'city_id' => $Customers_city_id, 'country_id' => $country, 'phone' => $Customers_phone, 'email' => $Customers_email));

        if ($command) {
            $this->log('se ha actualizado la informacion Cliente', '3');
            $respuesta['valido'] = 1;
        } else {
            $respuesta['valido'] = 0;
        }

        print CJSON::encode($respuesta);

        //            }  catch (Exception $e){
        //                 $this->log('Registro Cliente CAS','4');
        //                 $respuesta['valido'] = 0;
        //                 print CJSON::encode($respuesta);
        //                
        //            }
    }

    public function actionEditrma($Customers_nit = NULL, $model_id = NULL, $Devices_name = NULL, $Warranties_date_customer_complaint = NULL, $Dispositions_name = NULL, $JSONAccessorios = NULL, $Warranties_specification = NULL, $Warranties_observation = NULL, $statu_id = NULL)
    {

        $model_id = $_POST['model_id']; /* model_id es el ID de Warranties */
        $modelWarranties = $this->loadModel($model_id);
        $Warranties_code = $_POST['Warranties_code'];
        $Warranties_observation = $_POST['Warranties_observation'];
        $JSONAccessorios = json_decode($_POST['JSONAccessorios']);
        $Dispositions_name = $_POST['Dispositions_name'];

        $modelWarranties->code = $Warranties_code;
        $modelWarranties->disposition_id = $Dispositions_name;
        $modelWarranties->reason_return_id = 2;
        $modelWarranties->claim_date_cas = date("Y-m-d");
        $modelWarranties->technical_id = Yii::app()->user->getState('cas_id');
        $modelWarranties->hour_service = 1;
        $modelWarranties->statu_id  = $_POST['statu_id'];
        $modelWarranties->observation  = $Warranties_observation;


        if ($modelWarranties->save()) {
            if (isset($JSONAccessorios)) {
                $modelAccessorieWarranties = new AccessorieWarranties();

                $sql = 'Select count(AW.warranty_id) cantidad from accessorie_warranties AW WHERE AW.warranty_id = ' . $modelWarranties->id;
                $list = Yii::app()->db->createCommand($sql)->queryAll();
                foreach ($list as $item) {
                    $xx = $item['cantidad'];
                }
                for ($i = 1; $i <= $xx; $i++) {
                    $this->loadModelAccessorieWarranties($modelWarranties->id)->delete();
                }

                $JSONAccessorio = array();
                $i = 0;
                foreach ($JSONAccessorios as $JSONAccessorio[$i]) :
                    $modelAccessorieWarranties->warranty_id = $modelWarranties->id;
                    $modelAccessorieWarranties->accessorie_id = $JSONAccessorio[$i];
                    $modelAccessorieWarranties->save();
                    $modelAccessorieWarranties = new AccessorieWarranties();
                    $i = $i + 1;
                endforeach;
            }

            $modelWarrantiesDevices = new WarrantiesDevices();
            $modelWarrantiesDevices->warranty_id = $modelWarranties->id;
            $modelWarrantiesDevices->device_id = $modelWarranties->device_id;
            $modelWarrantiesDevices->save();

            $modelDevices = Devices::model()->findByPk($modelWarranties->device_id);
            $modelDevices->status = 1;
            $modelDevices->update();
            $respuesta['valido'] = 1;
        } else {
            $respuesta['valido'] = 0;
        }
        print CJSON::encode($respuesta);
    }

    public function actionSaverma($Devices_name = NULL, $Customers_nit = NULL, $Warranties_date_customer_complaint = NULL, $Dispositions_name = NULL, $JSONAccessorios = NULL, $Warranties_specification = NULL, $JSONFallas = NULL, $JSONStock = NULL)
    {

        $modelFailuresWarranties = new FailuresWarranties();
        $modelWarrantiesDevices = new WarrantiesDevices();
        $modelRequests = new Requests();
        $modelWarranties =  new Warranties();
        $modelAccessorieWarranties = new AccessorieWarranties();
        $modelFilesWarranties = new FilesWarranties();

        $Warranties_code = $_POST['Warranties_code'];
        $Customers_nit = $this->customerid($_POST['Customers_nit']);
        $cas_id =  Yii::app()->user->getState('cas_id');
        $Devices_name = $this->deviceid($_POST['Devices_name']);
        $Dispositions_name = $_POST['Dispositions_name'];
        $Warranties_date_customer_complaint = $_POST['Warranties_date_customer_complaint'];
        $fallas = json_decode($_POST['JSONFallas']);
        $JSONStocks = json_decode($_POST['JSONStock']);
        $JSONAccessorios = json_decode($_POST['JSONAccessorios']);

        $modelWarranties->code = $Warranties_code;
        $modelWarranties->name  = Yii::app()->user->getState('cas_id');
        $modelWarranties->customer_id  = $Customers_nit;
        $modelWarranties->cas_id =  $cas_id;
        $modelWarranties->device_id  = $Devices_name;
        $modelWarranties->disposition_id  =  $Dispositions_name;
        $modelWarranties->reason_return_id = 2;
        $modelWarranties->specification = $Warranties_specification;
        $modelWarranties->date_customer_complaint = $Warranties_date_customer_complaint;
        $modelWarranties->claim_date_cas = date("Y-m-d");
        $modelWarranties->hour_service = 1;
        $modelWarranties->technical_id = Yii::app()->user->getState('cas_id');
        $modelWarranties->observation = $_POST['Warranties_observation'];
        $modelWarranties->statu_id  = 1; /*estatus en revision*/

        if ($modelWarranties->save()) {
            for ($i = 0; $i <= 1; $i++) {
                $modelFilesWarranties->name = $modelWarranties->code;
                $modelFilesWarranties->file = Yii::app()->request->cookies['cookie_name' . $i];
                $modelFilesWarranties->category = 2;
                $modelFilesWarranties->warranty_id = $modelWarranties->id;
                $modelFilesWarranties->created = date("Y-m-d H:i:s");
                $modelFilesWarranties->save();
                $modelFilesWarranties = new FilesWarranties();
            }
            /* 1. ESTO ES PARA GUARDAR EN LA  TABLA DE WARRENTIERS_DEVICE Y LLEVAR EL CONTROL 
                 * DE CADA RMA CREADO CON CUAL EQUIPO Y TENER UN CONTROL SOBRE ESTOS
                 */
            $modelWarrantiesDevices->warranty_id = $modelWarranties->id;
            $modelWarrantiesDevices->device_id = $modelWarranties->device_id;
            $modelWarrantiesDevices->save();

            $modelDevices = Devices::model()->findByPk($modelWarranties->device_id);
            $modelDevices->status = 1;
            $modelDevices->update();
            /**FIN DEL 1***/

            if (isset($JSONStocks)) {
                $JSONStock = array();
                $j = 0;
                foreach ($JSONStocks as $JSONStock[$j]) :
                    $modelRequests->failure_id = $JSONStock[$j];
                    $modelRequests->warranty_id = $modelWarranties->id;
                    $modelRequests->cas_id = Yii::app()->user->getState('cas_id');
                    $modelRequests->transport_id = 6;
                    $modelRequests->status = 0;
                    if ($modelRequests->save()) {
                        if ($this->enviar($JSONStock[$j], $modelWarranties->code)) {
                            $respuesta['savereparacion'] = 1;
                        } else {
                            $respuesta['savereparacion'] = 0;
                        }
                    }
                    $modelRequests = new Requests();
                    $j = $j + 1;
                endforeach;
            }

            if (isset($fallas)) {
                $falla = array();
                $i = 0;
                foreach ($fallas as $falla[$i]) :
                    $modelFailuresWarranties->failure_id = $falla[$i];
                    $modelFailuresWarranties->warranty_id = $modelWarranties->id;
                    $modelFailuresWarranties->save();
                    $modelFailuresWarranties = new FailuresWarranties();
                    $i = $i + 1;
                endforeach;
            }
            if (isset($JSONAccessorios)) {
                $JSONAccessorio = array();
                $i = 0;
                foreach ($JSONAccessorios as $JSONAccessorio[$i]) :
                    $modelAccessorieWarranties->warranty_id = $modelWarranties->id;
                    $modelAccessorieWarranties->accessorie_id = $JSONAccessorio[$i];
                    $modelAccessorieWarranties->save();
                    $modelAccessorieWarranties = new AccessorieWarranties();
                    $i = $i + 1;
                endforeach;
            }
            $respuesta['valido'] = 1;
        } else {
            $respuesta['valido'] = 0;
        }
        unset(Yii::app()->request->cookies['cookie_name0']);
        unset(Yii::app()->request->cookies['cookie_name1']);
        print CJSON::encode($respuesta);
    }

    public function log($modulo = NULL, $valor = NULL)
    {

        require_once("geolocalizacion/geoiploc.php");
        require_once("mobile/Mobile_Detect.php");

        $detect = new Mobile_Detect;
        $deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'Tablet' : 'Phone') : 'Computer');

        switch ($valor):
            case "1":
                $a = "Se ha registrado un RMA por " . Yii::app()->user->getState('username');
                break;
            case "2":
                $a = "Ha ocurrido un error grave al guardar los datos";
                break;
            case "3":
                $a = "Se ha registrado un nuevo cliente por el usuario : " . Yii::app()->user->getState('username');
                break;
            case "4":
                $a = "Error al guardar nuevo cliente en el CAS ";
                break;
        endswitch;

        $ip = $_SERVER["REMOTE_ADDR"];

        $log = new Logs();
        $log->user_id = Yii::app()->user->id;
        $log->modulo = $modulo;
        $log->activity = $a;
        $log->country = getCountryFromIP($ip, " NamE");
        $log->ip = $ip;
        $log->date = date("Y-m-d H:i:s");
        $log->device = htmlentities($_SERVER['HTTP_USER_AGENT']) . " - " . $deviceType;
        $log->save();
    }


    public function enviar($id = NULL, $code = NULL)
    {

        $sql = 'SELECT Model.name,Failure.replacement, Failure.description_replacement  FROM failures Failure '
            . 'INNER JOIN models Model ON (Model.id = Failure.model_id )'
            . ' Where Failure.id =  ' . $id . '';
        $list = Yii::app()->db->createCommand($sql)->queryAll();
        $rs = array();
        foreach ($list as $item) {
            $rs[] = $item['name'];
            $rs[] = $item['replacement'];
            $rs[] = $item['description_replacement'];
        }

        $criteria = new CDbCriteria;
        $criteria->condition = 't.id = ' . Yii::app()->user->getState('cas_id');
        $usersCas = Cas::model()->findAll($criteria);
        $xx = array();
        foreach ($usersCas as $usersCa) :
            @$xx[] = $usersCa['name'];
            @$xx[] = $usersCa['representative'];
        endforeach;

        $mailer = Yii::createComponent('application.extensions.mailer.phpmailer', true);
        $mailer->AddAddress('gsanchez@thefactoryhka.com');
        $mailer->AddAddress('ccavas@thefactoryhka.com');
        $mailer->From = 'contactanos@thefactory.com';
        $mailer->CharSet = 'UTF-8';
        $mailer->FromName = 'Centro Autorizado de Servicio  - Solicitud de Partes y Piezas';
        $mailer->WordWrap = 50;
        $mailer->IsHTML(true);
        $mailer->Subject = "Centro de Servicio Autorizado - Solicitud de Partes y Piezas";
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
                                           <p>Saludos, Señores The Factory HKA Bolivia:</p>
                                           <p>El presente es para hacer solicitud formal de las partes y/o piezas de repuestos necesarias para proceder a la reparación por Garantía con número de ' . $code . '</p>
                                           <p><b>Código del RMA:</b> ' . $code . '</p>                                           
                                            <p><b>Modelo del equipo:</b> ' . $rs[0] . '</p>
                                            <p><b>Parte y piezas que ha solicitado:</b> ' . $rs[1] . ' </p>                                          
                                            <p><b>Descripción de la piezas que ha solicitado:</b> ' . $rs[2] . ' </p>                                          
                                            <br />
                                            <p><b>Nombre del CAS:</b> ' . @$xx[0] . '</p>
                                            <p><b>Representante:</b> ' . @$xx[1] . '</p>
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
}
