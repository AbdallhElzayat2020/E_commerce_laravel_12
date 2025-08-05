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
                                    <a href="{{ route('dashboard.roles.index') }}">
                                        {{ __('dashboard_roles.role') }}
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <a href="javascript:;">
                                        {{ __('dashboard_roles.create_role') }}
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
                            <i class="la la-cog"></i> {{__('dashboard_roles.settings')}}
                        </button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop3">
                            <a class="dropdown-item" href="{{ route('dashboard.roles.index') }}">
                                <i class="la la-list"></i> {{__('dashboard_roles.roles')}}
                            </a>
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
                                        <i class="la la-plus-circle"></i> {{ __('dashboard_roles.create_role') }}
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

                                        <form class="form" action="{{ route('dashboard.roles.store') }}" method="POST">
                                            @csrf
                                            <div class="form-body">
                                                <!-- Role Names Section -->
                                                <div class="row mb-4">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="role_name_arabic">
                                                                <i class="la la-tag"></i>
                                                                {{ __('dashboard_roles.role_name_arabic') }}
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <input type="text" id="role_name_arabic"
                                                                   class="form-control border-primary"
                                                                   placeholder="{{ __('dashboard_roles.role_name_arabic') }}"
                                                                   name="role[ar]" value="{{ old('role.ar') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="role_name_english">
                                                                <i class="la la-tag"></i>
                                                                {{ __('dashboard_roles.role_name_english') }}
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <input type="text" id="role_name_english"
                                                                   class="form-control border-primary"
                                                                   placeholder="{{ __('dashboard_roles.role_name_english') }}"
                                                                   name="role[en]" value="{{ old('role.en') }}">
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Permissions Section -->
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>
                                                                <i class="la la-check-square-o"></i>
                                                                {{ __('dashboard_roles.permissions') }}
                                                            </label>
                                                            <div class="permissions-container"
                                                                 style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); border-radius: 10px; padding: 20px; border: 2px solid #dee2e6;">

                                                                <div class="row">
                                                                    @foreach (config('permissions') as $key => $value)
                                                                        <div class="col-md-4 mb-3">
                                                                            <div class="permission-item"
                                                                                 style="background: #fff; border-radius: 8px; padding: 15px; border: 2px solid #e9ecef; transition: all 0.3s ease;">
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox" class="custom-control-input"
                                                                                           id="permissions.{{ $key }}"
                                                                                           name="permissions[]" value="{{ $key }}"
                                                                                           onchange="togglePermission(this)"
                                                                                        {{ in_array($key, old('permissions', [])) ? 'checked' : '' }}>
                                                                                    <label class="custom-control-label"
                                                                                           for="permissions.{{ $key }}"
                                                                                           style="font-weight: 600; color: #495057;">
                                                                                        {{ __('permissions.' . $key) }}
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>

                                                                @error('permissions')
                                                                <div class="alert alert-danger mt-3"
                                                                     style="border-radius: 8px;">
                                                                    <i class="la la-exclamation-triangle"></i>
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </div>
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

    <script>
        function togglePermission(checkbox) {
            const permissionItem = checkbox.closest('.permission-item');
            if (checkbox.checked) {
                // Selected state - Green gradient background
                permissionItem.style.background = 'linear-gradient(135deg, #28a745 0%, #20c997 100%)';
                permissionItem.style.borderColor = '#28a745';
                permissionItem.style.boxShadow = '0 4px 15px rgba(40, 167, 69, 0.3)';
                permissionItem.style.transform = 'translateY(-2px)';
                // Change text color to white
                const label = permissionItem.querySelector('.custom-control-label');
                label.style.color = '#fff';
                const icon = permissionItem.querySelector('.custom-control-label i');
                icon.style.color = '#fff';
            } else {
                // Unselected state - White background
                permissionItem.style.background = '#fff';
                permissionItem.style.borderColor = '#e9ecef';
                permissionItem.style.boxShadow = 'none';
                permissionItem.style.transform = 'translateY(0)';
                // Change text color back to dark
                const label = permissionItem.querySelector('.custom-control-label');
                label.style.color = '#495057';
                const icon = permissionItem.querySelector('.custom-control-label i');
                icon.style.color = '#6c757d';
            }
        }

        // Function to apply green style to checked checkboxes without triggering toggle
        function applyCheckedStyles() {
            document.querySelectorAll('.permission-item').forEach(function (item) {
                const checkbox = item.querySelector('input[type="checkbox"]');
                if (checkbox && checkbox.checked) {
                    // Apply green style without triggering toggle function
                    item.style.background = 'linear-gradient(135deg, #28a745 0%, #20c997 100%)';
                    item.style.borderColor = '#28a745';
                    item.style.boxShadow = '0 4px 15px rgba(40, 167, 69, 0.3)';
                    item.style.transform = 'translateY(-2px)';

                    // Change text color to white
                    const label = item.querySelector('.custom-control-label');
                    if (label) {
                        label.style.color = '#fff';
                    }
                    const icon = item.querySelector('.custom-control-label i');
                    if (icon) {
                        icon.style.color = '#fff';
                    }
                }
            });
        }

        document.addEventListener('DOMContentLoaded', function () {
            // Apply styles to all checked checkboxes
            applyCheckedStyles();
        });

        // Apply styles when page is fully loaded (including after form submission with errors)
        window.addEventListener('load', function () {
            applyCheckedStyles();
        });

        // Apply styles after a short delay to ensure all elements are rendered
        setTimeout(function () {
            applyCheckedStyles();
        }, 100);
    </script>
@endsection
