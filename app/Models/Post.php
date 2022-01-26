<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
// Changing table name
    // protected $table='posts';
    // Removing the timestamps
    // public $timestamps=false;
// Changing primary key
// protected $primaryKey='id';
// Modelling relationships between models
public function user(){
    return $this->belongsTo('App\Models\User');
}

}
