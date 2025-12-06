<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $table = 'categories';
    public $guarded = [];
    public static function rules(){
        return[
               'name' => 'required|string|max:255|min:3',
            'description' => 'required|string',
            'parent_id' => 'nullable|exists:categories,id',
        ];
    }
}
