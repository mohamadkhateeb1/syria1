<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>{{ __('Log in') }} - نظام المطعم</title>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', Tahoma, sans-serif; }
    body {
      background: url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80') no-repeat center center fixed;
      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      padding: 20px;
    }
    .login-container {
      background: rgba(255, 255, 255, 0.93);
      padding: 40px;
      border-radius: 12px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
      width: 100%;
      max-width: 400px;
    }
    .login-container h2 {
      text-align: center;
      margin-bottom: 25px;
      color: #2c3e50;
    }
    .form-group {
      margin-bottom: 20px;
    }
    .form-group label {
      display: block;
      margin-bottom: 8px;
      font-weight: bold;
      color: #34495e;
    }
    .form-group input {
      width: 100%;
      padding: 12px;
      border: 1px solid #ddd;
      border-radius: 6px;
      font-size: 16px;
    }
    .form-group input:focus {
      outline: none;
      border-color: #e67e22;
    }
    .btn {
      width: 100%;
      padding: 12px;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      cursor: pointer;
    }
    .btn-login {
      background-color: #e67e22;
      color: white;
    }
    .btn-login:hover {
      background-color: #d35400;
    }
    .link {
      display: block;
      text-align: center;
      margin-top: 15px;
      color: #3498db;
      text-decoration: none;
      font-size: 14px;
    }
    .link:hover {
      text-decoration: underline;
    }
    
    /* أضفنا هذا الستايل لرسائل الخطأ الخاصة بالحقول */
    .field-error ul {
      list-style: none;
      padding: 0;
      margin: 5px 0 0 0;
      font-size: 14px;
      color: #e74c3c;
    }

    /* أضفنا هذا الستايل لمربع "تذكرني" */
    .form-group-remember {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
    }
    .form-group-remember input {
      width: auto;
      margin-left: 10px; /* يعطي مسافة بين المربع والنص في RTL */
    }
    .form-group-remember label {
      margin: 0;
      font-weight: normal;
      color: #34495e;
      font-size: 14px;
    }

    /* أضفنا هذا الستايل لرسائل الحالة (مثل "تم إرسال رابط") */
    .session-status {
      font-size: 14px;
      background-color: #d4edda;
      color: #155724;
      padding: 10px;
      border-radius: 6px;
      margin-bottom: 20px;
      text-align: center;
    }
  </style>
</head>
<body>
  <div class="login-container">
    
    <x-auth-session-status class="session-status" :status="session('status')" />

    <h2>{{ __('Log in') }}</h2>
    
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
            <label for="email">{{ __('Email') }}</label>
            <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="field-error" />
        </div>

        <div class="form-group">
            <label for="password">{{ __('Password') }}</label>
            <input id="password" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="field-error" />
        </div>

        <div class="form-group-remember">
            <input id="remember_me" type="checkbox" name="remember">
            <label for="remember_me">{{ __('Remember me') }}</label>
        </div>

        <button type="submit" class="btn btn-login">
            {{ __('Log in') }}
        </button>
        
        <div class="links-container">
            @if (Route::has('password.request'))
                <a class="link" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            @if (Route::has('register'))
                 <a href="{{ route('register') }}" class="link">ليس لديك حساب؟ أنشئ واحدًا الآن</a>
            @endif
        </div>
    </form>
  </div>
</body>
</html>