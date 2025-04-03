@extends('dashboard')

@section('content')
    <!-- Đăng nhập -->
    <main class="login-form">
    <div class="container mt-5 content">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center">Đăng Nhập</h3>
                        <form method="POST" action="{{ route('user.authUser') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required autofocus>
                                @if ($errors->has('username'))
                                        <span class="text-danger">{{ $errors->first('username') }}</span>
                                    @endif
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required >
                                @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="rememberMe">
                                <label class="form-check-label" for="rememberMe">Ghi nhớ đăng nhập</label>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Đăng Nhập</button>
                            </div>
                        </form>
                        <div class="text-center mt-3">
                            <a href="#">Quên mật khẩu?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</main>
@endsection