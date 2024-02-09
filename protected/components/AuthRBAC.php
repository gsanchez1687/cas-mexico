<?php

class AuthRBAC extends CApplicationComponent {

    public function init() {
        
    }

    public function checkAccess($item = NULL) {

        if ($item != NULL) {

            $sql = new CDbCriteria();

            $sql->condition = "user.id = :user_id AND t.user_id = :user_id AND user.status = 1 AND t.active = 1 AND item.item = :item_name AND rolItem.active = 1 AND item.active = 1";

            $sql->params = array(':user_id' => Yii::app()->user->id, ':item_name' => $item);

            $sql->with = array('rolItem' => array('with' => 'item'), 'user');

            $validacion = UsersRolesItems::model()->find($sql);

            if (count($validacion) == 1) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

}
