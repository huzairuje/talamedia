<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AdvertCategory extends Authenticatable
{
    protected $fillable = [
        'name', 'status',
    ];

    public function sql()
    {
        return $this
            ->select(
                $this->table.'.id',
                $this->table.'.name',
                $this->table.'.status'
            )->orderBy(
                $this->table.'.name'
            );
    }

}
