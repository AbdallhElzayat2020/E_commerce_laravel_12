@extends('layouts.dashboard.app')
@section('title', __('Roles'))
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">

            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">
                        <i class="la la-shield"></i> {{ __('dashboard_roles.roles_management') }}
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
                                    <a href="{{ route('dashboard.roles.index') }}">{{ __('dashboard_roles.role') }}
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
                            <a class="dropdown-item" href="{{ route('dashboard.roles.create') }}">
                                <i class="la la-plus"></i> {{ __('dashboard_roles.create_role') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">{{ __('dashboard_roles.roles') }}</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <a href="{{ route('dashboard.roles.create') }}" class="btn btn-primary">
                                            <i class="la la-plus"></i> {{ __('dashboard_roles.create_role') }}
                                        </a>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>{{ __('dashboard_roles.name') }}</th>
                                                    <th>{{ __('dashboard_roles.created_at') }}</th>
                                                    <th>{{ __('dashboard_roles.actions') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($roles as $index => $role)
                                                    <tr class="{{ $role->id === 1 ? 'table-warning' : '' }}">
                                                        <th scope="row">{{ $index + 1 }}</th>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                @if ($role->id === 1)
                                                                    <i class="la la-crown text-warning mr-2"
                                                                        style="font-size: 18px;" title="Super Admin"></i>
                                                                @endif
                                                                <span
                                                                    class="font-weight-bold">{{ $role->getTranslation('role', app()->getLocale()) }}</span>
                                                                @if ($role->id === 1)
                                                                    <span class="badge badge-warning ml-2">Super
                                                                        Admin</span>
                                                                @endif
                                                            </div>
                                                        </td>
                                                        <td>{{ $role->created_at->diffForHumans() }}</td>
                                                        <td>
                                                            <div class="btn-group" role="group">
                                                                @if ($role->id !== 1)
                                                                    <a href="{{ route('dashboard.roles.edit', $role->id) }}"
                                                                        class="btn btn-primary btn-sm mr-1"
                                                                        title="{{ __('dashboard_roles.edit') }}">
                                                                        <i class="la la-edit"></i>
                                                                    </a>
                                                                @else
                                                                    <button class="btn btn-secondary btn-sm" disabled
                                                                        title="Cannot edit Super Admin">
                                                                        <i class="la la-lock"></i>
                                                                    </button>
                                                                @endif

                                                                @if ($role->id !== 1)
                                                                    <a href="#" data-toggle="modal"
                                                                        data-target="#deleteRole_{{ $role->id }}"
                                                                        class="btn btn-danger btn-sm"
                                                                        title="{{ __('dashboard_roles.delete') }}">
                                                                        <i class="la la-trash"></i>
                                                                    </a>
                                                                @else
                                                                    <button class="btn btn-secondary btn-sm" disabled
                                                                        title="Cannot delete Super Admin">
                                                                        <i class="la la-lock"></i>
                                                                    </button>
                                                                @endif
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    @if ($role->id !== 1)
                                                        @include('dashboard.roles.delete')
                                                    @endif
                                                @endforeach

                                            </tbody>
                                        </table>
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
