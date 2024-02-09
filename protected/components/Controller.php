<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController {

    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = '//layouts/column1';

    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = array();

    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
  
    public $breadcrumbs = array();

    public function validaSessionUser() {

        if (Yii::app()->user->id) {
            
        } else {

            $this->redirect(array('site/login'));
        }
    }

    public function PageSize($id = NULL, $model = NULL) {

        $this->widget('application.extensions.PageSize.PageSize', array(
            'gridViewId' => $id,
            'pageSize' => Yii::app()->request->getParam('pageSize', null),
            'defaultPageSize' => Yii::app()->params['cantregistros_defecto_gridview'],
            'pageSizeOptions' => Yii::app()->params['registros_pagina_gridview'],
        ));
        $dataProvider = $model->search();
        $pageSize = Yii::app()->user->getState('pageSize', Yii::app()->params['cantregistros_defecto_gridview']);
        $dataProvider->getPagination()->setPageSize($pageSize);
        return $dataProvider;
    }
    
     public function ControlMenu($categoria = NUll) {

        $user = Yii::app()->user->id;
        $cli_menus = new Menus;
        $cli_menus = $cli_menus->tableName();
        $cli_menu_opciones = new Items;
        $cli_menu_opciones = $cli_menu_opciones->tableName();
        $cli_roles = new Roles;
        $cli_roles = $cli_roles->tableName();
        $cli_usuarios = new Users;
        $cli_usuarios = $cli_usuarios->tableName();
        $cli_roles_opciones = new RolesItems;
        $cli_roles_opciones = $cli_roles_opciones->tableName();

        $sql = new CDbCriteria();

        $sql->addCondition("t.active = 1");
        $sql->addCondition("users.status = 1");
        $sql->addCondition("roles_items.active = 1");
        $sql->addCondition("roles.active = 1");
        $sql->addCondition("items.active = 1");
        $sql->addCondition("menu.active = 1");
        
        $sql->condition = "users.id = :userid AND menu.categoria = :category";
        
        $sql->params = array(':userid' => intval($user), ':category' => $categoria);

        $sql->join = "INNER JOIN $cli_usuarios users ON (users.id = t.user_id)
                      INNER JOIN $cli_roles_opciones roles_items ON (roles_items.id = t.rol_opcion_id)                             
                      INNER JOIN $cli_roles roles ON (roles.id = users.rol_id)
                      INNER JOIN $cli_menu_opciones items ON (items.id = roles_items.item_id)
                      INNER JOIN $cli_menus menus ON (menus.id = items.menu_id)                      
                      ";
        $sql->order = "menu.jerarquia ASC, menu.orden ASC";

        $sql->group = "menu.id";

        $sql->select = "menu.id as menu_id,
                        menu.name as menu_descripcion,
                        menu.url as menu_url,
                        menu.url as menu_url_tipo,
                        menu.icono as menu_icono,
                        menu.name as menu_modulo,
                        menu.position as menu_jerarquia                      
                       ";

        $model = UsersRolesItems::model()->findAll($sql);

        $menus = array();

        foreach ($model as $m) {
            /* Menu */
            if ($m->menu_jerarquia == 0) {
                $menus[$m->menu_id]['data'] = NULL;
                $menus[$m->menu_id]['menu_id'] = $m->menu_id;
                $menus[$m->menu_id]['menu_descripcion'] = $m->menu_descripcion;
                $menus[$m->menu_id]['menu_url'] = $m->menu_url;
                $menus[$m->menu_id]['menu_url_tipo'] = $m->menu_url_tipo;
                $menus[$m->menu_id]['menu_icono'] = $m->menu_icono;
                $menus[$m->menu_id]['menu_modulo'] = $m->menu_modulo;
                $menus[$m->menu_id]['menu_jerarquia'] = $m->menu_jerarquia;
            }
        }

        $cont = 1;
        foreach ($model as $m) {
            if ($m->menu_jerarquia > 0) {
                $menus[$m->menu_jerarquia]['data'][$m->menu_id]['menu_descripcion'] = $m->menu_descripcion;
                $menus[$m->menu_jerarquia]['data'][$m->menu_id]['menu_url'] = $m->menu_url;
                $menus[$m->menu_jerarquia]['data'][$m->menu_id]['menu_url_tipo'] = $m->menu_url_tipo;
                $menus[$m->menu_jerarquia]['data'][$m->menu_id]['menu_icono'] = $m->menu_icono;
                $menus[$m->menu_jerarquia]['data'][$m->menu_id]['menu_modulo'] = $m->menu_modulo;
                $menus[$m->menu_jerarquia]['data'][$m->menu_id]['menu_jerarquia'] = $m->menu_jerarquia;
                $cont++;
            }
        }

        return $menus;
    }
    
    public function nombrerol()
	{
		$rol = Yii::app()->user->getState('rolId');
		
		switch($rol)
		:
			
			case "1":
				$rola = "Administrador";
				break;
			case "2":
				$rola = "Ventas TFHKA";
				break;
			case "3":
				$rola = "CAS";
				break;
			case "4":
				$rola = "Técnico CAS";
				break;
			case "5":
				$rola = "Distribuidor";
				break;
			case "6":
				$rola = "Supervisor CAS";
				break;
			case "7":
				$rola = "Soporte TFHKA";
				break;
			
		endswitch
		;
		
		return $rola;
	}


}
