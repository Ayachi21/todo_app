<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Model;
   
class Task extends Model
{
    protected $fillable = [
        'name', 'detail','$user->name' ,'$project->name'
    ];
    public function project()
    {
    	return $this->belongsTo('App\project');
    }
    public function user()
    {
    	return $this->belongsTo('App\user');
    }
}