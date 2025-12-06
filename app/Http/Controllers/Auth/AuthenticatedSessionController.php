<?php
// مسؤوول عن عملية تسجيل الدخول وتسجيل الخروج للمستخدمين
// ويشمل عرض نموذج تسجيل الدخول، معالجة طلبات تسجيل الدخول، وتدمير الجلسات عند تسجيل الخروج.
// يستخدم طلب مخصص للتحقق من صحة بيانات تسجيل الدخول.
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
  /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // ------------------ ابدأ الإضافة من هنا ------------------

        // 1. احصل على بيانات المستخدم الذي قام بتسجيل الدخول
        $user = Auth::user();

        // 2. قم بتخزين الـ "role" الخاص به في الجلسة
        // (افترض أن اسم العمود في جدول المستخدمين هو 'role')
        $request->session()->put('role', $user->role);
        
        // ------------------ انتهت الإضافة ------------------

        
        return redirect()->intended(route('categories.index', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}