<!DOCTYPE html>
<html class="no-js">   
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo Yii::app()->params['titulo']; ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <!-- Favicon -->
        <link rel="shortcut icon" href="<?php echo Yii::app()->baseUrl ?>/imgages/favicon.ico" type="image/x-icon">
        <link rel="shortcut icon" href="<?php echo Yii::app()->baseUrl ?>/images/favicon.ico" />
        <link rel="Bookmark" href="<?php echo Yii::app()->baseUrl ?>/images/favicon.ico" />
        <link rel="icon" href="<?php echo Yii::app()->baseUrl ?>/images/favicon.ico" />
        <script src="<?php echo Yii::app()->baseUrl ?>/plugins/shortcuts/shortcuts.js"></script>
        <!-- Bootstrap core CSS -->        
        <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl ?>/plugins/bootstrap/css/bootstrap.min.css"> 
        <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl ?>/plugins/pace/pace.css">         
        <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl ?>/css/fontawesome/font-awesome.min.css">
        <!-- CSS Animate -->
        <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl ?>/css/animate.css">
        <!-- Custom styles for this theme -->
        <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl ?>/css/main.css">
        <!-- CSS STYLE -->
        <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl ?>/css/style.css">      
    </head>
    <script type="text/javascript">if(top.location != self.location)top.location = self.location;</script>
        <script type="text/javascript"> 
            shortcut.add("backspace",function() { });
            shortcut.add("enter",function() { });
        </script>   
    <body>        
        <?php echo $content; ?>
        <div class="clear"></div>
               
        <script src="<?php echo Yii::app()->baseUrl ?>/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo Yii::app()->baseUrl ?>/plugins/pace/pace.min.js"></script>          
        <script src="<?php echo Yii::app()->baseUrl ?>/js/src/app.js"></script>      
        <script src="<?php echo Yii::app()->baseUrl ?>/js/jquery.validate.js"></script>      
    </body>
</html>
