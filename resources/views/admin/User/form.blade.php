@extends('admin.layouts.master')
@section('title', 'Kullanıcı Yönetimi')
@section('content')
    <h1 class="page-header">Kullanıcı Yönetimi</h1>

    <form method="post" action="{{ route('admin.user.save', @$entry->id) }}">
        {{ csrf_field() }}
        <div class="pull-right">
            <button type="submit" class="btn btn-primary">
                {{ @$entry->id > 0 ? 'Güncelle' : 'Kaydet' }}
            </button>
        </div>

        <h2 class="sub-header">
            Kullanıcı {{ @$entry->id > 0 ? 'Düzenle' : 'Ekle' }}
        </h2>

        @include('layouts.partials.errors')
        @include('layouts.partials.alert')

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="firstname_lastname">Ad Soyad</label>
                    <input type="text" name="firstname_lastname" class="form-control" id="firstname_lastname"
                        placeholder="Ad Soyad" value="{{ $entry->firstname_lastname }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="mail">Email adresi</label>
                    <input type="email" class="form-control" name="email" id="mail" placeholder="Email"
                        value="{{ $entry->mail }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="password">Şifre</label>
                    <input type="password" class="form-control" id="password" placeholder="Şifre">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="address">Adres</label>
                    <input type="text" class="form-control" id="address" placeholder="Adres"
                        value="{{ $entry->detail->address }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="phone_number">Telefon</label>
                    <input type="text" class="form-control" id="phone_number" placeholder="Telefon"
                        value="{{ $entry->detail->phone_number }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="mobil_number">Cep Telefonu</label>
                    <input type="text" class="form-control" id="mobil_number" placeholder="Cep Telefonu"
                        value="{{ $entry->detail->mobil_number }}">
                </div>
            </div>
        </div>

        <div class="checkbox">
            <label>
                <input type="checkbox" name="is_active" value='1' {{ $entry->is_active ? 'checked' : '' }}>Aktif mi
            </label>
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="is_admin" value='1' {{ $entry->is_admin ? 'checked' : '' }}>Yönetici mi
            </label>
        </div>

    </form>
@endsection
