<x-app-layout>
    <x-slot name="header">
{{-- التعديل واضافة مستخدمين وعرض ا=مستخجمين الموقع --}}
@foreach($user as $users)
        <table border="1">
            <tr>
                <td>{{ $users->id }}</td>
                <td>{{ $users->name }}</td>
                <td>{{ $users->email }}</td>
                <td>{{ $users->role }}</td>
            </tr>
        </table>
@endforeach
    </x-slot>
</x-app-layout>
