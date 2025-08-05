@extends('layouts.dashboard.app')
@section('title', __('dashboard_roles.roles'))
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
                                                <th>{{ __('dashboard_roles.actions') }}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse ($roles as $index => $role)
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
                                            @empty
                                                <tr>
                                                    <td colspan="3" class="text-center">
                                                        <div class="alert alert-warning">
                                                            <i class="la la-exclamation-triangle"></i>
                                                            {{ __('dashboard_roles.no_roles_found') }}
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforelse

                                            </tbody>
                                        </table>
                                        {{$roles->links()}}
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

<style>
    .permissions-display {
        max-width: 300px;
    }

    .permissions-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 4px;
    }

    .permission-badge {
        display: inline-block;
        transition: all 0.3s ease;
        border: none;
        font-weight: 500;
        cursor: pointer;
    }

    .permission-badge:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15) !important;
    }

    .permission-badge i {
        margin-right: 4px;
        font-size: 10px;
    }

    /* تحسين ألوان البادجات */
    .badge-success {
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        color: white;
    }

    .badge-warning {
        background: linear-gradient(135deg, #ffc107 0%, #fd7e14 100%);
        color: white;
    }

    .badge-danger {
        background: linear-gradient(135deg, #dc3545 0%, #e83e8c 100%);
        color: white;
    }

    .badge-primary {
        background: linear-gradient(135deg, #007bff 0%, #6610f2 100%);
        color: white;
    }

    .badge-info {
        background: linear-gradient(135deg, #17a2b8 0%, #6f42c1 100%);
        color: white;
    }

    .badge-dark {
        background: linear-gradient(135deg, #343a40 0%, #495057 100%);
        color: white;
    }

    /* تحسين عرض الجدول */
    .table-responsive {
        border-radius: 8px;
        overflow: hidden;
    }

    .table th {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border-bottom: 2px solid #dee2e6;
        font-weight: 600;
        color: #495057;
    }

    .table td {
        vertical-align: middle;
        border-bottom: 1px solid #f1f3f4;
    }

    .table-hover tbody tr:hover {
        background-color: rgba(0, 123, 255, 0.05);
    }
</style>
