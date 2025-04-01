@extends('dashboard')

@section('content')
<main class="signup-form">
    <div class="container mt-5 content">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center">Cập Nhật Tài Khoản</h3>
                        <form action="{{ route('user.postUpdateUser') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            
                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" value="{{ $user->username }}" required>
                                @error('username')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" value="{{ $user->email }}" required>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Mật Khẩu</label>
                                <input type="password" class="form-control" name="password">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Nhập lại Mật Khẩu</label>
                                <input type="password" class="form-control" name="password_confirmation">
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                            </div>
                        </form>

                        <div class="text-center mt-3">
                            <a href="{{ route('user.list') }}">Quay lại danh sách</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection