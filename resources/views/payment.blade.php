@extends('layouts.master')
@section('title', 'Ödeme')
@section('content')
    <div class="container">
        <div class="bg-content">
            <h2>Ödeme</h2>
            <form action="{{ route('payment_process') }}" accept="post">
                <div class="row">
                    <div class="col-md-5">
                        <h3>Ödeme Bilgileri</h3>
                        <div class="form-group">
                            <label for="card_number">Kredi Kartı Numarası</label>
                            <input type="text" class="form-control kredikarti" id="card_number" name="card_number"
                                style="font-size:20px;" required>
                        </div>
                        <div class="form-group">
                            <label for="expiration_date">Son Kullanma Tarihi</label>
                            <div class="row">
                                <div class="col-md-6">
                                    Ay
                                    <select name="expiration_date_month "id="expiration_date_month" class="form-control"
                                        required>
                                        <option>1</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    Yıl
                                    <select id="expiration_date_year" name="expiration_date_year" class="form-control"
                                        required>
                                        <option>2017</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cardcvv2">CVV (Güvenlik Numarası)</label>
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="text" class="form-control kredikarti_cvv" name="cardcvv2" id="cardcvv2"
                                        required>
                                </div>
                            </div>
                        </div>
                        <form>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label><input type="checkbox" checked> Ön bilgilendirme formunu okudum ve kabul
                                        ediyorum.</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label><input type="checkbox" checked> Mesafeli satış sözleşmesini okudum ve kabul
                                        ediyorum.</label>
                                </div>
                            </div>
                        </form>
                        <button type="submit" class="btn btn-success btn-lg">Ödeme Yap</button>
                    </div>
                    <div class="col-md-7">
                        <h4>Ödenecek Tutar</h4>
                        <span class="price">{{ Cart::total() }} <small>TL</small></span>

                        <h4>İletişim ve Fatura Bilgileri</h4>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="firstname_lastname">Ad Soyad</label>
                                    <input type="text" class="form-control" name="firstname_lastname"
                                        id="firstname_lastname" value="{{ auth()->user()->firstname_lastname }}" required>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <label for="address">Adres</label>
                                <input type="text" class="form-control" name="address" id="address" required
                                    value="{{ $user_detail->address }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="phone">Telefon</label>
                                    <input type="text" class="form-control telefon" name="phone" id="phone"
                                        value="{{ $user_detail->phone_number }}">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <label for="mobil_phone">Cep Telefonu</label>
                                <input type="text" class="form-control telefon" name="mobil_phone" id="mobil_phone"
                                    value="{{ $user_detail->mobile_number }}" required>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
@section('footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.js"></script>
    <script>
        $('.kredikarti').mask('0000-0000-0000-0000', {
            placeholder: "____-____-____-____"
        });
        $('.kredikarti_cvv').mask('000', {
            placeholder: "___"
        });
        $('.telefon').mask('(000) 000-00-00', {
            placeholder: "(___) ___-__-__"
        });
    </script>
@endsection
