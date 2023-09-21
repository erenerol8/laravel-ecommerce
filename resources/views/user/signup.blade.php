@extends('layouts.master')
@section('title', 'Kayıt Ol')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Kaydol</div>
                    <div class="panel-body">
                        @include('layouts.partials.errors')
                        @include('layouts.partials.alert')


                        <form class="form-horizontal" role="form" method="POST" action="{{ route('user.signup') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="firstname_lastname" class="col-md-4 control-label">İsim Soyisim</label>
                                <div class="col-md-6">
                                    <input id="firstname_lastname" type="text" class="form-control"
                                        name="firstname_lastname" value="" required autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="mail" class="col-md-4 control-label">Email</label>
                                <div class="col-md-6">
                                    <input id="mail" type="mail" class="form-control" name="mail" value=""
                                        required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-md-4 control-label">Şifre</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 control-label">Şifre (Tekrar)</label>
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Kaydol
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
