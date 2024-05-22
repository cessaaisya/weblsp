<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Authenticatable
{
    use Notifiable;
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address1',
        'address2',
        'address3',
    ];
}
