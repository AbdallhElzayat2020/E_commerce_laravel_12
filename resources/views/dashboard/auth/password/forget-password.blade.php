@extends('layouts.dashboard.auth.master')
@section('title',__('auth.forget_password'))
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="flexbox-container">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="col-md-4 col-10 box-shadow-2 p-0">
                            <div class="card border-grey border-lighten-3 px-2 py-2 m-0">
                                <div class="card-header border-0 pb-0">
                                    <div class="card-title text-center">
                                        <img src="{{asset('assets/dashboard')}}/images/logo/logo-dark.png" alt="branding logo">
                                    </div>
                                </div>
                                <div class="card-content">

                                    <div class="card-body">
                                        <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                                            <span>{{__('auth.forget_password')}}</span>
                                        </h6>
                                        <form class="form-horizontal" action="{{ route('dashboard.password.forget-password.submit') }}" method="post">
                                            @csrf
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="email" class="form-control form-control-lg input-lg" id="user-email"
                                                       placeholder="{{__('auth.email')}}" name="email" value="{{ old('email') }}" required>
                                                <div class="form-control-position">
                                                    <i class="ft-mail"></i>
                                                </div>
                                            </fieldset>

                                            {{-- NoCaptcha --}}
                                            <div class="form-group row">
                                                <div class="form-group  col-md-12 col-12 text-center">
                                                    {!! NoCaptcha::display() !!}
                                                </div>
                                                @error('g-recaptcha-response')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                                @enderror
                                            </div>
                                            {{-- End NoCaptcha --}}

                                            <button type="submit" class="btn btn-outline-info btn-lg btn-block"><i class="ft-unlock"></i>
                                                {{__('auth.forget_password')}}
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="card-footer border-0">
                                    <p class="float-sm-left text-center"><a href="" class="card-link">{{__('auth.login')}}</a></p>
                                    <p class="float-sm-right text-center">
                                        <a href="" class="card-link">
                                            {{__('auth.register')}}
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
