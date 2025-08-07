@extends('layouts.dashboard.app')
@section('title',__('admins.title'))
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">

            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">
                        <i class="la la-shield"></i> {{ __('admins.admins') }}
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
                                    <a href="{{ route('dashboard.roles.index') }}">{{ __('admins.admins') }}
                                    </a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>

                {{--   Dropdown   --}}
                <div class="content-header-right col-md-6 col-12">
                    <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                        <button type="button"
                                class="btn btn-info round dropdown-toggle dropdown-menu-right box-shadow-2 px-2"
                                id="btnGroupDrop3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="la la-cog"></i> {{ __('dashboard_roles.settings') }}
                        </button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop3">
                            <a class="dropdown-item" href="{{ route('dashboard.admins.create') }}">
                                <i class="la la-plus"></i> {{ __('admins.create_admin') }}
                            </a>
                        </div>
                    </div>
                </div>
                {{--   Dropdown   --}}
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">

                            <a class="btn btn-primary" href="{{ route('dashboard.admins.create') }}">+ {{__('admins.create_admin')}}</a>
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
                                        <th>{{__('admins.name')}}</th>
                                        <th>{{__('admins.email')}}</th>
                                        <th>{{__('admins.role')}}</th>
                                        <th>{{__('admins.status')}}</th>
                                        <th>{{__('tables.actions')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($admins as $index=>$admin)
                                        <tr>
                                            {{-- <td>{{$loop->iteration}}</td> --}}
                                            <td>{{$index + 1}}</td>
                                            <td>{{$admin->name}}</td>
                                            <td>{{$admin->email}}</td>
                                            <td>{{$admin->role->role}}</td>

                                            <td>
                                                @if($admin->status === 'active')
                                                    <span class="badge badge-success">{{ $admin->status }}</span>
                                                @else
                                                    <span class="badge badge-danger">{{ $admin->status }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <a style="font-size: 18px!important;" href="{{ route('dashboard.admins.edit', $admin->id) }}"
                                                       class="btn btn-primary mx-1" title="{{ __('tables.edit') }}">
                                                        <i class="la la-edit"></i>
                                                    </a>
                                                    <a style="font-size: 18px!important;" href="#" data-toggle="modal"
                                                       data-target="#delete_admin{{ $admin->id }}" class="btn btn-danger mx-1" title="{{ __('tables.delete') }}">
                                                        <i class="la la-trash"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#change_status_{{ $admin->id }}">
                                                        @if ($admin->status == 'active')
                                                            <span class="badge badge-success p-1" style="font-size: 18px!important;">
                                                                 <i class="fas fa-ban"></i>
                                                            </span>
                                                        @else
                                                            <span class="badge badge-danger p-1" style="font-size: 18px!important;">
                                                                <i class="fas fa-play"></i>
                                                            </span>
                                                        @endif
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        @include('dashboard.admins.delete')
                                        @include('dashboard.admins.change_status')
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
                                    {{$admins->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
