<?php
/**
 * @Author: C Yongky Pranowo
 * @Date:   2019-11-24 19:12:40
 * @Last Modified by:   C Yongky Pranowo
 * @Last Modified time: 2019-11-30 22:33:57
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MstUser extends Model
{
    protected $table = 'mst_users';
    
    protected $fillable = [
        'user_name', 'user_email', 'user_email_verified_at','user_password','user_remember_token'
    ];

    protected $hidden = [
        'user_password', 'user_remember_token',
    ];

    protected $casts = [
        'user_email_verified_at' => 'datetime',
    ];
}
