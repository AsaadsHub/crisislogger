@php $name = Auth::user()->name ?? '' ? Auth::user()->name : Auth::user()->email ?? ''; @endphp
<div class="kt-header__topbar-item kt-header__topbar-item--user">
    <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
        <div class="kt-header__topbar-user">
            <span class="kt-header__topbar-username">{{ $name }}</span>

            <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
            @include('components.user-badge', ['initial' => substr($name, 0, 1)])
        </div>
    </div>
    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">
        <div class="kt-notification">
            <a href="{{ route('profile') }}" class="kt-notification__item">
                <div class="kt-notification__item-icon">
                    <i class="flaticon2-calendar-3 kt-font-primary"></i>
                </div>
                <div class="kt-notification__item-details">
                    <div class="kt-notification__item-title kt-font-bold">
                        My Profile
                    </div>
                    <div class="kt-notification__item-time">
                        Account settings and more
                    </div>
                </div>
            </a>
            <div class="kt-notification__custom kt-space-between">
                <a class="btn btn-label btn-label-brand btn-sm btn-bold" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>
