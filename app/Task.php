<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'priority', 'due_date','user_id'
    ];

     /**
     * Relación entre una tarea y el usuario que la creo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
