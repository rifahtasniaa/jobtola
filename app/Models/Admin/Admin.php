<?php

namespace App\Models\Admin;

use App\Models\AbstractModel;

class Admin extends AbstractModel
{
    protected $table = 'admin_users';

    public static function getColumns()
    {
        return ['name', 'phone', 'email', 'super_admin', 'password'];
    }
}
