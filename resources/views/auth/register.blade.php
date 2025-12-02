<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>{{ __('Register') }} - نظام المطعم</title>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  
  <style>
    :root {
      /* تعريف اللون الأساسي ليتناسب مع صفحة الدخول */
      --brand-color: #e67e22;
      --brand-color-dark: #d35400;
    }

    body {
      /* تغيير صورة الخلفية */
      background: url('https://images.unsplash.com/photo-1555396273-367ea4eb4db5?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80') no-repeat center center fixed;
      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      padding: 20px;
    }

    .register-container {
      /* تعديل الشفافية والظل */
      background: rgba(255, 255, 255, 0.97);
      padding: 40px;
      border-radius: 12px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3); /* ظل أنعم */
      width: 100%;
      max-width: 450px;
    }

    .invalid-feedback {
        display: block; /* هذا لم يتغير، ضروري لعمل الأخطاء */
    }

    /* تعديلات الألوان لتجاوز Bootstrap 
    */
    .btn-primary {
      background-color: var(--brand-color);
      border-color: var(--brand-color);
    }
    .btn-primary:hover, .btn-primary:focus {
      background-color: var(--brand-color-dark);
      border-color: var(--brand-color-dark);
      box-shadow: 0 0 0 0.25rem rgba(230, 126, 34, 0.25);
    }
    .text-primary {
      /* استخدام !important لتجاوز كلاس Bootstrap */
      color: var(--brand-color) !important;
    }
    .form-control:focus {
      border-color: var(--brand-color);
      box-shadow: 0 0 0 0.25rem rgba(230, 126, 34, 0.25);
    }
    .text-secondary.link:hover {
        color: var(--brand-color) !important;
    }
  </style>
  </head>
<body>
  <div class="register-container">
    
    <h2 class="text-center mb-4 text-primary">{{ __('Register') }}</h2>
    
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}"  autofocus autocomplete="name" 
                   class="form-control @error('name') is-invalid @enderror" />
            
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}"  autocomplete="username"
                   class="form-control @error('email') is-invalid @enderror" />
            
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">{{ __('Password') }}</label>
            <input id="password" type="password" name="password"  autocomplete="new-password"
                   class="form-control @error('password') is-invalid @enderror" />
            
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
            <input id="password_confirmation" type="password" name="password_confirmation"  autocomplete="new-password"
                   class="form-control @error('password_confirmation') is-invalid @enderror" />
            
            @error('password_confirmation')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-primary btn-lg">
                {{ __('Register') }}
            </button>
        </div>
    </form>
    
    <div class="text-center mt-3">
        <a class="link text-decoration-none text-secondary" href="{{ route('login') }}">
            {{ __('Already registered?') }}
        </a>
    </div>
    </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body> 