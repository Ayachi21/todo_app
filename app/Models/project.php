<?php
  
namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use IlluminateDatabaseEloquentModel;
   
class project extends Model
{
    use SoftDeletes; 
    protected $fillable = [
        'name', 'detail' 
    ];
    public function tasks()
    {
        return $this->hasMany(task::class);
    }
    protected static function booted()
    {   parent::boot();
        static::deleted(function ($project) {
            $project->tasks()->delete();
        });
    }

}