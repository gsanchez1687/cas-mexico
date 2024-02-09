<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',	
        'name'=>'.::Centro Autorizado de Servicio::.',
        'theme'=>'classic',
        'sourceLanguage' => 'es',   
        'defaultController' => 'site/login',	
        'language' => 'es',
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
                  'importcsv'=>array(
                                    'path'=>'importCsv/', // path to folder for saving csv file and file with import params
                ),		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'16871752',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),		
	),

	// application components
	'components'=>array(

                
                'ePdf' => array(
                        'class'         => 'ext.yii-pdf.EYiiPdf',
                        'params'        => array(
                            'mpdf'     => array(
                                'librarySourcePath' => 'application.vendor.mpdf.*',
                                'constants'         => array(
                                    '_MPDF_TEMP_PATH' => Yii::getPathOfAlias('application.runtime'),
                                ),
                                'class'=>'mpdf', // the literal class filename to be loaded from the vendors folder
                                'defaultParams'     => array( // More info: http://mpdf1.com/manual/index.php?tid=184
                                    'mode'              => '', //  This parameter specifies the mode of the new document.
                                    'format'            => 'A4', // format A4, A5, ...
                                    'default_font_size' => 0, // Sets the default document font size in points (pt)
                                    'default_font'      => '', // Sets the default font-family for the new document.
                                    'mgl'               => 15, // margin_left. Sets the page margins for the new document.
                                    'mgr'               => 15, // margin_right
                                    'mgt'               => 16, // margin_top
                                    'mgb'               => 8, // margin_bottom
                                    'mgh'               => 9, // margin_header
                                    'mgf'               => 8, // margin_footer
                                    'orientation'       => 'P', // landscape or portrait orientation
                                )
                            ),
                'HTML2PDF' => array(
                                'librarySourcePath' => 'application.vendor.html2pdf.*',
                                'classFile'         => 'html2pdf.class.php', // For adding to Yii::$classMap
                                /*'defaultParams'     => array( // More info: http://wiki.spipu.net/doku.php?id=html2pdf:en:v4:accueil
                                    'orientation' => 'P', // landscape or portrait orientation
                                    'format'      => 'A4', // format A4, A5, ...
                                    'language'    => 'en', // language: fr, en, it ...
                                    'unicode'     => true, // TRUE means clustering the input text IS unicode (default = true)
                                    'encoding'    => 'UTF-8', // charset encoding; Default is UTF-8
                                    'marges'      => array(5, 5, 5, 8), // margins by default, in order (left, top, right, bottom)
                                )*/
                            )
                        ),
                    ),
            
                'authRBAC' => array(
                        'class' => 'AuthRBAC',
                 ),
            
                'widgetFactory' => array(
                'widgets' => array('CGridView' => array('itemsCssClass' => 'table table-bordered table-striped table-hover table-gridview table-condensed table-gridview','pagerCssClass' => 'gridview-pagination'),'htmlOptions' => array('class' => 'container-grid-view')),                
                ),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
                                'class' => 'application.components.MyCUrlManager',
                                'urlFormat'=>'path',
                                'showScriptName' => false,                        
                                            'rules'=>array(                                   
                                            '<controller:\d+>/<id:[a-zA-Z0-9-]+>'=>'<controller>/<action>',  
                                            '<controller:\w+>/<action:\w+>/<id:\d+>' =>'<controller>/<action>',
                                            '<controller:\w+>/<action:\w+>/<id:>' =>'<controller>/<action>', 
                                            '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                                            ),
                                    ),
		

		// database settings are configured in database.php
		'db'=>require(dirname(__FILE__).'/database.php'),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
//                                        'class'=>'ext.yii-debug-toolbar.YiiDebugToolbarRoute',
//                                       'ipFilters'=>array('127.0.0.1','192.168.1.215'),
				),
				// uncomment the following to show log messages on web pages
				
//				array(
//					'class'=>'CWebLogRoute',
//				),
				
			),
		),

	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
                'Bolivia'=>'146',
                'Pais'=>'Mexico',
                'titulo'=>'CAS THKA Mexico',
                'web'=>'http://www.thefactoryhka.com/cas/',
		// this is used in contact page
               'adminEmail'=>'webmaster@example.com',
               /* Gridview */
               'cantregistros_defecto_gridview' => '10',
               'registros_pagina_gridview' => array(10 => 10, 20 => 20, 50 => 50, 100 => 100),
               /* Errores */
               'Error404' => 'La Pagina Solicitada no se encuentra o posiblemente tiene un error',
               'ErrorAccesoDenegado' => 'Acceso Denegado',
               'msjsuccess' => 'El registro se ha guardado',
               'msjdanger' => 'No se ha podido guardar, verifique las validaciones',
               /* Botones */
               'boton' => 'btn btn-sm btn-default',
               'view-icon' => '<i class="fa fa-eye"></i>',
               'view-btn' => 'btn btn-primary',
               'update-icon' => '<i class="fa fa-pencil-square-o"></i>',
               'falla' => '<i class="fa fa-wrench"></i>',
               'cerrar' => '<i class="fa fa-times-circle-o"></i>',
               'subir' => '<i class="fa fa-upload"></i>',
               'update-btn' => 'btn btn-primary',
               'stock-icon'=>'<i class="fa fa-stack-exchange"></i>',
               'delete-icon' => '<i class="fa fa-times"></i>',
               'delete-btn' => 'btn btn-primary',
               'save-icon' => '<i class="icon-menu glyph-icon flaticon-floppy1"></i>',
               'save-btn' => 'btn btn-success',
               'crear-text' => 'Crear',
               'actualizar-text' => 'Actualizar',
               'cancel-icon' => '<i class="icon-menu glyph-icon flaticon-back1"></i>',
               'cancel-btn' => 'btn btn-default',
               'cancel-text' => 'Cancelar',
               'back-text'=>'Volver',
               'back-btn'=>'btn btn-primary',
               'admin-icon' => '<i class="icon-menu glyph-icon flaticon-content"></i>',
               'admin-btn' => 'btn btn-sm btn-default',
               'create-icon' => '<i class="icon-menu glyph-icon flaticon-add46"></i>',
               'create-btn' => 'btn btn-primary',
               'index-icon' => '<i class="icon-menu glyph-icon flaticon-add46"></i>',
               'index-btn' => 'btn btn-sm btn-info',
               'search-text' => 'Buscar',
               'search-icon' => '<i class="icon-menu glyph-icon flaticon-add46"></i>',
               'search-btn' => 'btn btn-sm btn-primary',
               'IDGridview'=>'',
               'rutaUrlGridviewBoxSwitch'=>'',
               /* Transacciones */
               'rollback' => FALSE,
               'pais'=>'BOL',
               'logo'=>'logo.jpg',
               'width'=>'200px',
	),
);
