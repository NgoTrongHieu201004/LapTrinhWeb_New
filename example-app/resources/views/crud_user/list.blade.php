@extends('dashboard')

@section('content')
    <main class="login-form">
        <div class="container mt-5 content">
            <h3 class="text-center">Danh Sách User</h3>
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Name</th>
                        <th>Eamil</th>
                        <th>Role</th>
                        <th>Thao Tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $index => $user)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a href="{{ route('user.readUser', ['id' => $user->id]) }}" class="btn btn-info btn-sm">View</a>
                                <a href="{{ route('user.updateUser', ['id' => $user->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                                <a href="{{ route('user.deleteUser', ['id' => $user->id]) }}" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection