<?php
/**
 * @Author: C Yongky Pranowo
 * @Date:   2019-11-24 17:53:56
 * @Last Modified by:   C Yongky Pranowo
 * @Last Modified time: 2019-11-30 13:51:18
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DTTransact extends Model
{
    protected $table = 'dt_transact';
    protected $fillable = ['user_id','dt_schedule_id','phone_number','adult','child','payment_status'];
}
