@extends('backend.layouts.login')

@section('content')
    <div class="card">
        <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center">
                <a href="{{ url('/')}}" class="app-brand-link ">
                    <span class="app-brand-text demo text-body fw-bolder p-2 h3">Login</span>
                </a>
            </div>
            <!-- /Logo -->
            {{-- {{ dd($errors->all()) }} --}}
            @include('backend.includes.errors')
            <form id="formAuthentication" class="mb-3" action="{{url('/')}}/admin/login" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email or Username</label>
                        {{ Form::text('email',null, ['class'=>'form-control','id'=>'email','placeholder'=>'Enter your email'])}}
                </div>
                <div class="mb-3 form-password-toggle">
                    <div class="d-flex justify-content-between">
                        <label class="form-label" for="password">Password</label>
                        {{-- <a href="auth-forgot-password-basic.html">
                            <small>Forgot Password?</small>
                        </a> --}}
                    </div>
                    <div class="input-group input-group-merge">

                            {{  Form::password('password', ['class'=>'form-control']) }}
                        {{-- <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span> --}}
                    </div>
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                </div>
            </form>


        </div>
    </div>
@endsection
