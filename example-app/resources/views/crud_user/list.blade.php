@extends('dashboard')

@section('content')
    <main class="login-form">
    <div class="container mt-5 content">
        <h3 class="text-center">Danh Sách Người Dùng</h3>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th style="display:none; ">ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Thao Tác</th>
                </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                            <tr>
                                <th style="display:none; ">{{ $user->id }}</th>
                                <th>{{ $user->username }}</th>
                                <th>{{ $user->email }}</th>
                                <th>
                                    <a href="{{ route('user.readUser', ['id' => $user->id]) }}">View</a> |
                                    <a href="{{ route('user.updateUser', ['id' => $user->id]) }}">Edit</a> |
                                    <a href="{{ route('user.deleteUser', ['id' => $user->id]) }}">Delete</a>
                                </th>
                            </tr>
                        @endforeach
            </tbody>
        </table>
    </div>

      
    </main>
@endsection