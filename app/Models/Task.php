<?php
  
namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name', 'detail','user_id' ,'project_id','deadline',
        'status',
    ];
    public function project():BelongsTo
    {
    	return $this->belongsTo(project::class);
    }
    public function user():BelongsTo
    {
    	return $this->belongsTo(user::class);
    }
}