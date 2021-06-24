@extends('templates.template-principal')
@section('content')
    {{-- <x-jet-authentication-card> --}}
        {{-- <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot> --}}

    <div class="container" style="margin-top: 5rem; margin-bottom: 8rem;">
        <div class="form-row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow bg-white style_card_container">
                    <div class="card-header d-flex justify-content-between bg-white" id="style_card_container_header">
                        <h6 class="style_card_container_header_titulo">Esqueci minha senha</h6>
                    </div>
                    <div class="card-body">
                        <div class="mb-4 text-sm text-gray-600">
                            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                        </div>

                        @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger" style="padding-bottom: 0px;">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="block">
                                <label for="email">{{ __('Email') }}</label>
                                <input id="email" class="form-control" type="email" name="email" value="{{old('email')}}" required autofocus />
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <button type="submit" class="btn btn-success" style="width: 100%">{{ __('Email Password Reset Link') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- </x-jet-authentication-card> --}}
@endsection
