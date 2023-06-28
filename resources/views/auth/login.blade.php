@extends('layouts.app')
<?php require_once "./myfunctions/conexao.php"; ?>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                <div class="tm-block-title mb-4">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" class="tm-login-form" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label" style="color:white">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end" style="color:white">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                       

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                            <?php 
                              $result = $mysqli->query("SELECT * FROM users ");
                              $rowcount = $result->num_rows;
                            ?>
                               
                            <?php 
                              if($rowcount == "0" || $rowcount == ""){
                            ?>
                                 <a href="{{ url('/register2')}}" class="nav-item" style="color:deepskyblue; margin-left: 30px;" >Primeiro Acesso </a>
                            <?php         
                              }else{

                              }
                            ?>    
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
