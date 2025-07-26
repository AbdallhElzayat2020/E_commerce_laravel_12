@extends('layouts.dashboard.auth.master')
@section('title',__('auth.show_otp_form'))
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

                                    <h3 class="card-subtitle line-on-side text-muted text-center pt-2">
                                        <span>{{__('auth.show_otp_form')}}</span>
                                    </h3>

                                </div>
                                <div class="card-content">
                                    @include('layouts.dashboard.messages.error')
                                    <div class="card-body">
                                        <form class="form-horizontal" action="{{ route('dashboard.password.verify-otp') }}" method="post">
                                            @csrf
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="hidden" name="email" class="form-control form-control-lg input-lg" id="email"
                                                       value="{{$email}}">
                                            </fieldset>

                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="text" name="otp" class="form-control form-control-lg input-lg" id="otp"
                                                       placeholder="{{__('auth.otp')}}" required>
                                                @error('otp')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                                <div class="form-control-position">
                                                    <i class="ft-otp"></i>
                                                </div>
                                            </fieldset>

                                            <button type="submit" class="btn btn-outline-info btn-lg btn-block"><i class="ft-unlock"></i>
                                                {{__('auth.otp_send')}}
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
