<?php

namespace App\Models\GSuite;

use Illuminate\Database\Eloquent\Model;

class GSuiteAccount extends Model
{
    protected $guarded = [];

    protected $table = 'gsuite_accounts';

    /**
     * Relationships
     */
    public function gsuiteable()
    {
        return $this->morphTo();
    }
}
