<?php
/**
 * @Author: C Yongky Pranowo
 * @Date:   2019-11-24 19:12:04
 * @Last Modified by:   C Yongky Pranowo
 * @Last Modified time: 2019-11-30 13:51:24
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MstClass extends Model
{
    protected $table = 'mst_class';
    protected $fillable = ['class_name'];
}
