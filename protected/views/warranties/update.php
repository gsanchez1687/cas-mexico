<?php $this->renderPartial('_update', array(
                                          'model'=>$model,                               
                                          'modelCustomers'=>$modelCustomers,
                                          'Customernit'=>$Customernit,
                                          'modelDevices'=>$modelDevices,
                                          'modelAccessories'=>$modelAccessories,
                                          'loadAccessoriewarranties'=>$loadAccessoriewarranties,
                                          'modelDispositions'=>$modelDispositions,
                                          'disposicion_id'=>$disposicion_id,
                                          'loadFilesWarranties'=>$loadFilesWarranties,
                                          'modelFailures'=>$modelFailures,
                                          'iddevice'=>$iddevice,
//                                        'codigo'=>$codigo,
                                        )); 
?>