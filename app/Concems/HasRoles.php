<?php
// هذا الملف يحتوي على خاصية لإدارة الأدوار والصلاحيات للمستخدمين في التطبيق
namespace App\Concems;
use App\Models\Role;
trait HasRole{// خاصية لإدارة الأدوار والصلاحيات للمستخدمين
    public function roles(){// تعريف علاقة متعدد الأشكال بين المستخدمين والأدوار
        return $this->morphToMany(Role::class, 'authorizable','role_user');
    }
    public function hasAbility($ability){// فحص ما إذا كان للمستخدم دور يمنحه صلاحية معينة
// فحص ما إذا كان للمستخدم دور يمنحه صلاحية معينة
        return $this->roles()->whereHas('abilities',function($query) use ($ability){// تحقق من وجود الصلاحية المسموحة في الأدوار المرتبطة بالمستخدم
            $query->where('ability',$ability)->where('type','allow');//
        })->exists();// إرجاع true إذا وجد الدور مع الصلاحية المسموحة، وإلا false
    }
}