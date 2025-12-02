<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Freelancer extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
        // علاقة مع جدول المستخدمين one to one
        //هذا معناه بأن كل Freelancer ينتمي إلى مستخدم واحد عن طريق ال user id  الذي يعتبر كونه id في جدول المستخدمين
    }
}
