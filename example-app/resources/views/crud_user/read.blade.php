@extends('dashboard')

@section('content')
    <main class="login-form">
    <div class="container mt-5 content">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body p-5">
                        <h3 class="text-center mb-4">Màn Hình Chi Tiết</h3>
                        <div class="ms-5 mb-3" style=" display : none;">
                            <strong class="me-5">Id:</strong> {{$messi->id}}
                        </div>
                        <div class="ms-5 mb-3">
                            <strong class="me-5">Username:</strong> {{$messi->username}}
                        </div>
                        <div class=" ms-5 mb-3">
                            <strong class="me-5">Email:</strong> {{$messi->email}}
                        </div>
                        <div class="text-end">
                            <a class="btn btn-primary" href="{{ route('user.updateUser', ['id' => $messi->id]) }}">Chỉnh Sửa</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </main>
@endsection