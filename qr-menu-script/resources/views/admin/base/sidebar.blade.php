    <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div>
            <div class="brand-logo d-flex align-items-center justify-content-between">
                <a href="{{route('adminIndex')}}" class="text-nowrap logo-img">
                    @php
                        $Settings = App\Models\Settings::where('settings_key', 'logo')->first();
                        $logoSetting = $Settings->settings_value;
                        $WebSiteName = App\Models\Settings::where('settings_key', 'name')->first()->settings_value;
                    @endphp
                    <img src="{{ asset($logoSetting) }}" width="70" alt="" />
                    <span style="text-decoration:none; color:black">
                        <strong>
                            {{ ucwords($WebSiteName) }}
                        </strong>
                    </span>
                </a>
                <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                    <i class="ti ti-x fs-8"></i>
                </div>
            </div>
            <!-- Sidebar navigation-->
            @include('admin.base.navbar')
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>
