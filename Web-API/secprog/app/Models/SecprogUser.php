<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Enums\AccountStatus;

class SecprogUser extends Authenticatable
{
    protected $table = 'user';              // schema-qualified table
    protected $primaryKey = 'user_id';
    public $incrementing = false;           // varchar PK
    protected $keyType = 'string';
    public $timestamps = false;             // we use custom timestamp columns

    protected $fillable = [
        'user_id', 'username', 'email', 'password', 'role', 'account_status'
        // created_timestamp, login_timestamp, pass_change_timestamp are DB-managed
    ];

    protected $casts = [
        'account_status' => AccountStatus::class,
    ];
    protected $hidden = ['password'];
}
