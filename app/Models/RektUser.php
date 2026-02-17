<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RektUser extends Model
{
    protected $fillable = [
        'x_username',
        'referrer',
        'wallet',
        'referral_code'
    ];
}
