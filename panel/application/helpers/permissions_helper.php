<?php
function isAllowedViewModule( $moduleName = ""){

    $t          = &get_instance();
    $moduleName = ($moduleName == "") ? $t->router->fetch_class() : $moduleName;

    $user = get_active_user();
    $user_roles = get_user_roles();

    if (isset($user_roles[$user->user_role_id])){
        $permission = json_decode($user_roles[$user->user_role_id]);
        if(isset($permission->$moduleName) && isset($permission->$moduleName->read)){
            return true;
        }
    }

    return true;
}
function isAllowedWriteModule( $moduleName = ""){

    $t          = &get_instance();
    $moduleName = ($moduleName == "") ? $t->router->fetch_class() : $moduleName;

    $user = get_active_user();
    $user_roles = get_user_roles();

    if (isset($user_roles[$user->user_role_id])){
        $permission = json_decode($user_roles[$user->user_role_id]);
        if(isset($permission->$moduleName) && isset($permission->$moduleName->write)){
            return true;
        }
    }

    return false;
}