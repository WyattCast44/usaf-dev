<?php

namespace App\Http\Controllers\DataTables;

use App\Models\Users\User;
use App\Http\Controllers\DataTables\DataTableController;

class UsersController extends DataTableController
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'admin']);
    }

    public function builder()
    {
        return User::query();
    }

    protected function getDisplayableColumns()
    {
        return [
            'first_name', 'middle_name', 'last_name', 'email', 'email_verified_at', 'admin', 'avatar'
        ];
    }
}
