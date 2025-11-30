<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('إدارة المستخدمين') }}
        </h2>
    </x-slot>

    <div class="container-fluid" style="padding: 20px;">
        
        <div class="row mb-3">
            <div class="col text-right">
                <a href="" class="btn btn-primary">
                    <i class="fas fa-plus"></i> إضافة مستخدم جديد
                </a>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">قائمة جميع المستخدمين</h3>
            </div>
            <div class="card-body table-responsive p-0">
                
                {{-- 3. تطبيق الكلاسات الاحترافية على الجدول --}}
                <table class="table table-hover table-striped">
                    
                    <thead class="thead-light">
                        <tr>
                            <th style="width: 10px;">ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th style="width: 200px;">الإجراءات (Actions)</th> {{-- 4. عمود الأزرار --}}
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    {{-- يمكنك إضافة تنسيق للـ Role هنا --}}
                                    <span class="badge {{ $user->role == 'admin' ? 'badge-success' : 'badge-info' }}">
                                        {{ $user->role }}
                                    </span>
                                </td>
                                
                                {{-- 5. أزرار التعديل والحذف --}}
                                <td>
                                    {{-- زر التعديل (رابط عادي) --}}
                                    {{-- غيّر الرابط # إلى رابط صفحة التعديل --}}
                                    <a href="#" class="btn btn-sm btn-info">
                                        <i class="fas fa-edit"></i> تعديل
                                    </a>

                                    {{-- زر الحذف (يجب أن يكون داخل فورم) --}}
                                    {{-- غيّر الرابط # إلى رابط الحذف --}}
                                    <form action="#" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('هل أنت متأكد من رغبتك في الحذف؟')">
                                            <i class="fas fa-trash"></i> حذف
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    
                </table>
            </div>
            </div>
        </div>

</x-app-layout>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>