@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Zweryfikuj swój adres Email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Link weryfikacyjny został wysłany na twój E-mail.') }}
                        </div>
                    @endif

                    {{ __('Zweryfikuj swoje konto by otrzymać pełnię działania.') }}
                    {{ __('Jeśli nie otrzymałeś maila') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('kliknij tu by wysłać kolejny') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
