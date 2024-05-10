<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderLine extends Model
{
    use HasFactory;
    protected $primaryKey = 'id'; // Name of your primary key column
    protected $table = 'orderline'; // Name of your database table
}
