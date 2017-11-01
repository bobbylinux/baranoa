@extends('layouts.app')
@section('content')
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">Login</div>
        <div class="card-body">
            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="exampleInputEmail1">Email</label>
                    <input class="form-control" id="exampleInputEmail1" type="email" name="email"
                           value="{{ old('email') }}" aria-describedby="emailHelp"
                           placeholder="Inserire un indirizzo email">
                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="exampleInputPassword1">Password</label>
                    <input class="form-control" id="exampleInputPassword1" type="password" name="password"
                           placeholder="Password" required>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" name="remember"
                                   type="checkbox" {{ old('remember') ? 'checked' : '' }}> Ricorda la password</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-12">
                        <button type="submit" class="btn btn-block btn-outline-info">
                            Login
                        </button>


                    </div>
                </div>
            </form>
        </div>
    </div>
@stop