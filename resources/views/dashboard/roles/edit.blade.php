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
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.welcome') }}"><i class="la la-home"></i>
                                    {{ __('dashboard_roles.Home') }}</a></li>
                            <li class="breadcrumb-item active"><a
                                    href="{{ route('dashboard.roles.index') }}">{{ __('dashboard_roles.role') }}</a>
                            </li>
                            <li class="breadcrumb-item active"><a
                                    href="javascript:;">{{ __('dashboard_roles.edit_role') }}</a></li>
                        </ol>
                    </div>
                </div>
                {{--   Dropdown   --}}
                <div class="content-header-right col-md-6 col-12">
                    <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                        <button type="button"
                            class="btn btn-info round dropdown-toggle dropdown-menu-right box-shadow-2 px-2"
                            id="btnGroupDrop3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="la la-cog"></i> Settings
                        </button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop3">
                            <a class="dropdown-item" href="{{ route('dashboard.roles.index') }}">
                                <i class="la la-list"></i> View All Roles
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
                                        <i class="la la-edit"></i> {{ __('dashboard_roles.edit_role') }}
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
                                        <form class="form" action="{{ route('dashboard.roles.update', $role->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('PUT')
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
                                                                class="form-control border-primary @error('role.ar') is-invalid @enderror"
                                                                placeholder="{{ __('dashboard_roles.role_name_arabic') }}"
                                                                name="role[ar]"
                                                                value="{{ old('role.ar', $role->getTranslation('name', 'ar')) }}">
                                                            @error('role.ar')
                                                                <div class="alert alert-danger mt-2"
                                                                    style="border-radius: 6px; font-size: 0.875rem;">
                                                                    <i class="la la-exclamation-triangle"></i>
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
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
                                                                class="form-control border-primary @error('role.en') is-invalid @enderror"
                                                                placeholder="{{ __('dashboard_roles.role_name_english') }}"
                                                                name="role[en]"
                                                                value="{{ old('role.en', $role->getTranslation('name', 'en')) }}">
                                                            @error('role.en')
                                                                <div class="alert alert-danger mt-2"
                                                                    style="border-radius: 6px; font-size: 0.875rem;">
                                                                    <i class="la la-exclamation-triangle"></i>
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
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
                                                                                    <input type="checkbox"
                                                                                        class="custom-control-input single-checkbox"
                                                                                        id="permissions.{{ $key }}"
                                                                                        name="permissions[]"
                                                                                        value="{{ $key }}"
                                                                                        onchange="togglePermission(this)"
                                                                                        {{ in_array($key, old('permissions', $role->permissions->pluck('name')->toArray())) ? 'checked' : '' }}>

                                                                                    <label class="custom-control-label"
                                                                                        for="permissions.{{ $key }}"
                                                                                        style="font-weight: 600; color: #495057;">
                                                                                        {{ $value }}
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

    <style>
        /* Hide ALL checkboxes by default */
        .permission-item input[type="checkbox"] {
            display: none !important;
            opacity: 0 !important;
            visibility: hidden !important;
            position: absolute !important;
            left: -9999px !important;
            width: 0 !important;
            height: 0 !important;
            margin: 0 !important;
            padding: 0 !important;
            border: none !important;
            pointer-events: none !important;
        }

        /* Show ONLY the first checkbox */
        .permission-item input[type="checkbox"]:first-of-type {
            display: block !important;
            opacity: 1 !important;
            visibility: visible !important;
            position: relative !important;
            left: auto !important;
            width: auto !important;
            height: auto !important;
            margin: auto !important;
            padding: auto !important;
            border: auto !important;
            pointer-events: auto !important;
        }

        /* Hide any duplicate custom-control divs */
        .permission-item .custom-control:not(:first-child) {
            display: none !important;
        }

        /* Ensure only one checkbox container */
        .permission-item .custom-control {
            position: relative;
        }

        /* Force hide any additional checkboxes */
        .permission-item input[type="checkbox"]:nth-of-type(n+2) {
            display: none !important;
            opacity: 0 !important;
            visibility: hidden !important;
            position: absolute !important;
            left: -9999px !important;
            width: 0 !important;
            height: 0 !important;
            margin: 0 !important;
            padding: 0 !important;
            border: none !important;
            pointer-events: none !important;
        }
    </style>

    <script>
        function togglePermission(checkbox) {
            const permissionItem = checkbox.closest('.permission-item');

            // Check if permissionItem exists
            if (!permissionItem) {
                console.error('Permission item not found for checkbox:', checkbox.id);
                return;
            }

            // Remove ALL duplicate checkboxes immediately
            const allCheckboxes = permissionItem.querySelectorAll('input[type="checkbox"]');
            if (allCheckboxes.length > 1) {
                console.log('Found duplicate checkboxes, removing ALL extras...');
                // Keep only the first checkbox
                for (let i = 1; i < allCheckboxes.length; i++) {
                    allCheckboxes[i].remove();
                }
            }

            // Force remove any additional checkboxes that might be created
            setTimeout(() => {
                const remainingCheckboxes = permissionItem.querySelectorAll('input[type="checkbox"]');
                if (remainingCheckboxes.length > 1) {
                    console.log('Removing additional checkboxes after toggle...');
                    for (let i = 1; i < remainingCheckboxes.length; i++) {
                        remainingCheckboxes[i].remove();
                    }
                }
            }, 10);

            // Additional cleanup - remove any checkboxes that might be created by other scripts
            setTimeout(() => {
                const finalCheckboxes = permissionItem.querySelectorAll('input[type="checkbox"]');
                if (finalCheckboxes.length > 1) {
                    console.log('Final cleanup - removing extra checkboxes...');
                    for (let i = 1; i < finalCheckboxes.length; i++) {
                        finalCheckboxes[i].remove();
                    }
                }
            }, 50);

            // Prevent any new checkboxes from being created
            const observer = new MutationObserver((mutations) => {
                mutations.forEach((mutation) => {
                    if (mutation.type === 'childList') {
                        const newCheckboxes = permissionItem.querySelectorAll('input[type="checkbox"]');
                        if (newCheckboxes.length > 1) {
                            console.log('MutationObserver detected new checkboxes, removing...');
                            for (let i = 1; i < newCheckboxes.length; i++) {
                                newCheckboxes[i].remove();
                            }
                        }
                    }
                });
            });

            observer.observe(permissionItem, {
                childList: true,
                subtree: true
            });

            if (checkbox.checked) {
                // Selected state - Green gradient background
                permissionItem.style.background = 'linear-gradient(135deg, #28a745 0%, #20c997 100%)';
                permissionItem.style.borderColor = '#28a745';
                permissionItem.style.boxShadow = '0 4px 15px rgba(40, 167, 69, 0.3)';
                permissionItem.style.transform = 'translateY(-2px)';
                // Change text color to white
                const label = permissionItem.querySelector('.custom-control-label');
                if (label) {
                    label.style.color = '#fff';
                }
                const icon = permissionItem.querySelector('.custom-control-label i');
                if (icon) {
                    icon.style.color = '#fff';
                }
            } else {
                // Unselected state - White background
                permissionItem.style.background = '#fff';
                permissionItem.style.borderColor = '#e9ecef';
                permissionItem.style.boxShadow = 'none';
                permissionItem.style.transform = 'translateY(0)';
                // Change text color back to dark
                const label = permissionItem.querySelector('.custom-control-label');
                if (label) {
                    label.style.color = '#495057';
                }
                const icon = permissionItem.querySelector('.custom-control-label i');
                if (icon) {
                    icon.style.color = '#6c757d';
                }
            }
        }

        // Function to clear error messages
        function clearErrors() {
            // Remove is-invalid class from inputs
            document.querySelectorAll('.is-invalid').forEach(function(element) {
                element.classList.remove('is-invalid');
            });

            // Remove error alert messages
            document.querySelectorAll('.alert-danger').forEach(function(element) {
                element.remove();
            });
        }

        // Initialize permission items on page load
        function initializePermissions() {
            console.log('Initializing permissions...');
            let checkedCount = 0;
            const permissionItems = document.querySelectorAll('.permission-item');
            console.log('Found permission items:', permissionItems.length);

            // Check for duplicate IDs
            const checkboxIds = [];
            permissionItems.forEach(function(item, index) {
                const checkbox = item.querySelector('input[type="checkbox"]');
                if (checkbox) {
                    if (checkboxIds.includes(checkbox.id)) {
                        console.error('Duplicate checkbox ID found:', checkbox.id);
                    } else {
                        checkboxIds.push(checkbox.id);
                    }
                    console.log('Item', index, 'checkbox:', checkbox.id);
                    if (checkbox.checked) {
                        console.log('Found checked checkbox:', checkbox.id);
                        togglePermission(checkbox);
                        checkedCount++;
                    }
                } else {
                    console.error('Checkbox not found in item', index);
                }
            });
            console.log('Total checked checkboxes:', checkedCount);
            console.log('Total unique checkbox IDs:', checkboxIds.length);
        }

        // Function to apply green style to checked checkboxes without triggering toggle
        function applyCheckedStyles() {
            document.querySelectorAll('.permission-item').forEach(function(item) {
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

        // Run on DOM ready
        document.addEventListener('DOMContentLoaded', function() {
            initializePermissions();
            applyCheckedStyles();
        });

        // Run on window load
        window.addEventListener('load', function() {
            initializePermissions();
            applyCheckedStyles();
        });

        // Run after a short delay to ensure all elements are ready
        setTimeout(function() {
            initializePermissions();
            applyCheckedStyles();
        }, 100);

        // Run multiple times to ensure it works
        setTimeout(function() {
            initializePermissions();
            applyCheckedStyles();
        }, 500);
        setTimeout(function() {
            initializePermissions();
            applyCheckedStyles();
        }, 1000);

        // Also run when the page is fully interactive
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', function() {
                initializePermissions();
                applyCheckedStyles();
            });
        } else {
            initializePermissions();
            applyCheckedStyles();
        }

        // Remove any duplicate checkboxes
        function removeDuplicateCheckboxes() {
            document.querySelectorAll('.permission-item').forEach(function(item) {
                const checkboxes = item.querySelectorAll('input[type="checkbox"]');
                if (checkboxes.length > 1) {
                    console.log('Found duplicate checkboxes in item:', item);
                    // Keep only the first checkbox
                    for (let i = 1; i < checkboxes.length; i++) {
                        checkboxes[i].remove();
                    }
                }
            });
        }

        // Force remove all duplicate checkboxes
        function forceRemoveDuplicates() {
            console.log('Force removing all duplicate checkboxes...');
            document.querySelectorAll('.permission-item').forEach(function(item) {
                const checkboxes = item.querySelectorAll('input[type="checkbox"]');
                console.log('Found', checkboxes.length, 'checkboxes in item');
                if (checkboxes.length > 1) {
                    console.log('Removing', checkboxes.length - 1, 'extra checkboxes');
                    // Keep only the first checkbox
                    for (let i = 1; i < checkboxes.length; i++) {
                        checkboxes[i].remove();
                    }
                }
            });
        }

        // Remove all duplicate checkboxes immediately
        removeDuplicateCheckboxes();
        forceRemoveDuplicates();

        // Run duplicate removal multiple times
        setTimeout(removeDuplicateCheckboxes, 100);
        setTimeout(forceRemoveDuplicates, 100);
        setTimeout(removeDuplicateCheckboxes, 200);
        setTimeout(forceRemoveDuplicates, 200);
        setTimeout(removeDuplicateCheckboxes, 500);
        setTimeout(forceRemoveDuplicates, 500);
        setTimeout(removeDuplicateCheckboxes, 1000);
        setTimeout(forceRemoveDuplicates, 1000);
        setTimeout(removeDuplicateCheckboxes, 2000);
        setTimeout(forceRemoveDuplicates, 2000);

        // Continuous monitoring
        setInterval(forceRemoveDuplicates, 1000);
    </script>
@endsection
