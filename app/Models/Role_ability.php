<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role_ability extends Model
{
    protected $fillable = ['role_id', 'ability', 'type'];
    public function role(){
        return $this->belongsTo(Role::class,'role_id','id');
    }
}
