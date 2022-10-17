<?php
  
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use IlluminateDatabaseEloquentModel;
   
class project extends Model
{
    protected $fillable = [
        'name', 'detail'
    ];
    public function tasks()
    {
        return $this->hasMany('App\task');
    }
    public function user()
    {
    	return $this->belongsTo('App\user');
    }
}