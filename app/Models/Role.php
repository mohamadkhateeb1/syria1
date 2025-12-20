<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name'];
    public function createwithAbilities($request){
        $roles=Role::create(['name'=>$request->name]);
        foreach($request->abilities as $ability=>$value){
            Role_ability::create([
                'role_id'=>$roles->id,
                'ability_id'=>$ability,
                'type'=>$value
            ]);
        }
    }
    public function abilities(){
        return $this->hasMany(Role_ability::class,'role_id','id');
    }
    public function updatewithAbilities($request){// تحديث اسم الدور
        $this->update(['name'=>$request->name]);// تحديث اسم الدور
        // حذف القدرات القديمة المرتبطة بالدور
        // إضافة القدرات الجديدة
        foreach($request->abilities as $ability => $value){// إضافة القدرات الجديدة
            Role_ability::create([// إنشاء سجل جديد في جدول role_abilities لكل قدرة
                'role_id' => $this->id,// ربط الصلاحية بالدور الحالي
                'ability' => $ability,// تحديد اسم الصلاحية
                'type' => $value// تحديد نوع الصلاحية (سماح، رفض، وراثة)
            ]);
            return $this;// إرجاع الكائن المحدث
        }
    }
}
