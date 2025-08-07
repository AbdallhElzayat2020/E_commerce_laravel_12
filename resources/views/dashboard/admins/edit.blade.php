@extends('layouts.dashboard.app')
@section('title', __('admins.title'))
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">

            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">
                        <i class="la la-shield"></i> {{ __('admins.title') }}
                    </h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('dashboard.welcome') }}">
                                        <i class="la la-home"></i> {{ __('dashboard_roles.Home') }}
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <a href="{{ route('dashboard.admins.index') }}">
                                        {{ __('dashboard_roles.role') }}
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <a href="javascript:;">
                                        {{ __('admins.create_admin') }}
                                    </a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-colored-form-control">
                                        <i class="la la-plus-circle"></i> {{ __('admins.create_admin') }}
                                    </h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="la la-minus"></i></a></li>
                                            <li><a data-action="expand"><i class="la la-expand"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">

                                        {{--  message error   --}}
                                        @include('layouts.dashboard.includes.validation-errors')
                                        {{--  message error   --}}

                                        <form class="form" action="{{ route('dashboard.admins.update', $admin->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-body">
                                                <!-- Role Names Section -->
                                                <div class="row mb-4">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name_ar">
                                                                <i class="la la-tag"></i>
                                                                {{ __('admins.name') }}
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <input type="text" id="name_ar"
                                                                class="form-control border-primary"
                                                                value="{{ old('name', $admin->name) }}"
                                                                placeholder="{{ __('admins.name') }}" name="name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="email">
                                                                <i class="la la-tag"></i>
                                                                {{ __('admins.email') }}
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <input type="text" id="email"
                                                                class="form-control border-primary"
                                                                value="{{ old('email', $admin->email) }}"
                                                                placeholder="{{ __('admins.email') }}" name="email">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="password">
                                                                <i class="la la-tag"></i>
                                                                {{ __('admins.password') }}
                                                                <small
                                                                    class="text-muted">({{ __('admins.leave_blank_to_keep_current') }})</small>
                                                            </label>
                                                            <input type="password" id="password"
                                                                class="form-control border-primary"
                                                                placeholder="{{ __('admins.password') }}" name="password">
                                                            <div id="password-indicator" class="password-change-indicator"
                                                                style="display: none;">
                                                                <i class="la la-exclamation-triangle"></i>
                                                                {{ __('admins.password_will_change') }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="password_confirmation">
                                                                <i class="la la-tag"></i>
                                                                {{ __('admins.confirm_password') }}
                                                            </label>
                                                            <input type="password" id="password_confirmation"
                                                                class="form-control border-primary"
                                                                placeholder="{{ __('admins.confirm_password') }}"
                                                                name="password_confirmation">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="status">
                                                                <i class="la la-toggle-on"></i>
                                                                {{ __('admins.status') }}
                                                            </label>
                                                            <select name="status" id="status"
                                                                class="form-control border-primary status-select">
                                                                <option value="active" @selected(old('status', $admin->status) == 'active')>
                                                                    {{ __('admins.active') }}
                                                                </option>
                                                                <option value="inactive" @selected(old('status', $admin->status) == 'inactive')>
                                                                    {{ __('admins.inactive') }}
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="role_id">
                                                                <i class="la la-tag"></i>
                                                                {{ __('admins.role') }}
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <select name="role_id" id="role_id"
                                                                class="form-control border-primary">
                                                                <option value="" selected disabled>
                                                                    {{ __('admins.role') }}
                                                                </option>
                                                                @foreach ($roles as $role)
                                                                    <option value="{{ $role->id }}"
                                                                        @selected(old('role_id', $role->id) == $role->id)>
                                                                        {{ $role->role }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions right">
                                                <button type="submit" class="btn btn-primary d-flex align-items-center">
                                                    <i class="la la-check-square-o"></i>{{ __('dashboard_roles.save') }}
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>


@endsection
