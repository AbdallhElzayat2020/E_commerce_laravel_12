@extends('layouts.dashboard.app')
@section('title', __('world.title'))
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">

            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">
                        <i class="la la-shield"></i> {{ __('world.title') }}
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
                                    <a href="{{ route('dashboard.roles.index') }}">{{ __('world.title') }}
                                    </a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">

                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body card-dashboard">
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>{{ __('world.country_name') }}</th>
                                        <th>{{ __('world.phone_code') }}</th>
                                        <th>{{ __('world.num_of_governorates') }}</th>
                                        <th>{{ __('world.status') }}</th>
                                        <th>{{ __('tables.actions') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($countries as $index=>$country)
                                        <tr>
                                            {{-- <td>{{$loop->iteration}}</td> --}}
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $country->name }}</td>
                                            <td>
                                                <div class="card-body">
                                                    <fieldset class="form-group position-relative has-icon-left">
                                                        <input type="text" class="form-control" id="iconLeft" value="{{ $country->phone_code }}" readonly>
                                                        <div class="form-control-position">
                                                            <i class="ft-phone-call primary"></i>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge badge-success">{{ $country->governorates()->count() }}</span>
                                            </td>

                                            <td>
                                                @if ($country->country_status === 'Active')
                                                    <span class="badge badge-success">{{ $country->country_status }}</span>
                                                @else
                                                    <span class="badge badge-danger">{{ $country->country_status }}</span>
                                                @endif
                                            </td>

                                            <td>
                                                <div class="btn-group">
                                                    <a style="font-size: 18px!important;"
                                                       href="{{ route('dashboard.admins.edit', $country->id) }}"
                                                       class="btn btn-primary mx-1" title="{{ __('tables.edit') }}">
                                                        <i class="la la-edit"></i>
                                                    </a>
                                                    <a style="font-size: 18px!important;" href="#"
                                                       data-toggle="modal"
                                                       data-target="#delete_admin{{ $country->id }}"
                                                       class="btn btn-danger mx-1" title="{{ __('tables.delete') }}">
                                                        <i class="la la-trash"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal"
                                                       data-target="#change_status_{{ $country->id }}">
                                                        @if ($country->is_active == 'active')
                                                            <span class="badge badge-success p-1"
                                                                  style="font-size: 18px!important;">
                                                                    <i class="fas fa-ban"></i>
                                                                </span>
                                                        @else
                                                            <span class="badge badge-danger p-1"
                                                                  style="font-size: 18px!important;">
                                                                    <i class="fas fa-play"></i>
                                                                </span>
                                                        @endif
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        {{--                                        @include('dashboard.admins.delete')--}}
                                        {{--                                        @include('dashboard.admins.change_status')--}}
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">
                                                <h3>{{ __('messages.not_found') }}</h3>
                                            </td>
                                        </tr>
                                    @endforelse

                                    </tbody>

                                </table>
                                <div class="mx-2">
                                    {{ $countries->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
