@extends('layouts.dashboard.auth.master')
@section('title',__('auth.reset_password'))
@section('content')
    <div class="app-content content" style="min-height: 100vh!important;">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="flexbox-container">
                    <div class="col-12 d-flex align-items-center justify-content-center" style="margin-top: 80px !important;">
                        <div class="col-md-4 col-10 box-shadow-2 p-0">
                            <div class="card border-grey border-lighten-3 m-0">
                                <div class="card-header border-0">

                                    <h3 class="card-subtitle line-on-side text-muted text-center pt-2">
                                        <span>{{__('auth.reset_password')}}</span>
                                    </h3>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form-horizontal" action="{{ route('dashboard.password.reset-password.submit') }}" method="post">
                                            @csrf

                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="text" name="email" value="{{old('email',$email)}}" class="form-control input-lg"
                                                       placeholder="{{__('auth.email')}}"
                                                       tabindex="1">
                                                @error('email')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                                @enderror
                                                <div class="form-control-position">
                                                    <i class="ft-user"></i>
                                                </div>
                                                <div class="help-block font-small-3"></div>
                                            </fieldset>

                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="password" name="password" class="form-control input-lg" id="password"
                                                       placeholder="{{__('auth.password_filed')}}"
                                                       tabindex="2">
                                                @error('password')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                                @enderror
                                                <div class="form-control-position">
                                                    <i class="la la-key"></i>
                                                </div>
                                                <div class="help-block font-small-3"></div>
                                            </fieldset>

                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="password" name="password_confirmation" class="form-control input-lg"
                                                       id="password_confirmation"
                                                       placeholder="{{__('auth.password_confirmation')}}"
                                                       tabindex="2">
                                                @error('password')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                                @enderror
                                                <div class="form-control-position">
                                                    <i class="la la-key"></i>
                                                </div>
                                                <div class="help-block font-small-3"></div>
                                            </fieldset>

                                            <div class="form-group row">
                                                <div class="form-group col-md-12 col-12 text-center">
                                                    {!! NoCaptcha::display() !!}
                                                </div>
                                                @error('g-recaptcha-response')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                                @enderror
                                            </div>


                                            <button type="submit" class="btn btn-danger btn-block btn-lg">
                                                <i class="ft-unlock"></i> {{__('auth.save')}}
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
