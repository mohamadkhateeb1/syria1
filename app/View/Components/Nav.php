<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;
// use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use App\Models\User;

class Nav extends Component
{
    public $items;
    public $active;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->items =config('nav'); // استدعاء ملف الإعدادات الخاص بالقائمة
        $this->active = Route::currentRouteName(); // الحصول على اسم الراوت الحالي
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.nav');
    }
    // public function ability_check($items)
    // {
    //     $user = Auth::User();
    //     foreach ($items as  $key => $item) {
    //         if (isset($item['ability']) && $user->can($item['ability'])) {
    //             unset($item[$key]);
    //         }
    //     }
    // }
}
