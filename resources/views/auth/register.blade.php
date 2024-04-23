@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div>
                    <div>
                        <a href="index.html" class="logo logo-admin"><img
                                src="{{ asset('dashboard/assets/images/22.jpg') }}" height="50" alt="logo"></a>
                    </div>
                    <h5 class="font-14 text-muted mb-4">Hadyatee</h5>
                    <p class="text-muted mb-4">The website "Hadyatee" contributes to 
                        helping individuals browse and choose suitable gifts based on
                         their allocated budget. It enhances the shopping experience by
                          categorizing and displaying unique gift options, as well as selecting
                           appropriate formats to ensure the quickest and best way to receive a gift.

                    </p>

                </div>
            </div>
            <div class="col-lg-5 offset-lg-1">
                <div class="card mb-0">
                    <div class="card-body">
                        <div class="p-2">
                            <h4 class="text-muted float-right font-18 mt-4">{{ __('Register') }}</h4>
                            <div>
                                <a href="index.html" class="logo logo-admin"><img
                                        src="{{ asset('dashboard/assets/images/22.jpg') }}" height="28"
                                        alt="logo"></a>
                            </div>
                        </div>

                        <div class="p-2">
                            <form class="form-horizontal m-t-20" method="POST" action="{{ route('register') }}">
                              @csrf
                                <div class="form-group row">
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                    <div class="col-12">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email">
                                    </div>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <label for="name"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                    <div class="col-12">
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    </div>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <label for="gender"
                                        class="col-md-4 col-form-label text-md-end">{{ __('gender') }}</label>

                                    <div class="col-12">
                                        <input id="gender" type="text"
                                            class="form-control @error('gender') is-invalid @enderror" name="gender"
                                            value="{{ old('gender') }}" required autocomplete="gender" autofocus>
                                    </div>
                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <label for="phone"
                                        class="col-md-4 col-form-label text-md-end">{{ __('phone') }}</label>

                                    <div class="col-12">
                                        <input id="phone" type="text"
                                            class="form-control @error('phone') is-invalid @enderror" name="phone"
                                            value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                                    </div>
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                    <div class="col-12">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password">
                                    </div>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                    <div class="col-12">
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>


                                <div class="form-group text-center row m-t-20">
                                    <div class="col-12">
                                        <button class="btn btn-primary btn-block waves-effect waves-light"
                                            type="submit">{{ __('Register') }}</button>
                                    </div>
                                </div>

                                <div class="form-group m-t-10 mb-0 row">
                                    <div class="col-12 m-t-20 text-center">
                                        <a href="{{ route('login') }}" class="text-muted">Already have account?</a>
                                    </div>
                                </div>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
@endsection
