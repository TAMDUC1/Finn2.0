<div class="main-sidebar" >
    <div class="main-sidebar-content" style="background-color: #f9f7f5">
        <div aria-label="breadcrumb" style="background-color: #f9f7f5">
            <ol class="breadcrumb" style="background-color: #e0dedc;">
                <li class="breadcrumb-item">
                    <a href="">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="">Store</a>
                </li >
                <li class="breadcrumb-item">
                    <a href="">Term and condition</a>
                </li>
            </ol>
        </div>
    </div>
    <div>
        <ul class="sidebar-list" style="padding-left: 5px">
            <li STYLE="background-color: white">
                <i class="fa fa-angle-right" style="padding-left: 20px;width: 4px">
                </i>
                <a href="login" style="margin-left: 20px">LOGIN/REGISTER</a>
            </li>
            <li STYLE="background-color: white">
                <i class="fa fa-angle-right" style="padding-left: 20px;width: 4px">
                </i>
                <a href="{{ route('password.request') }}"style="margin-left: 20px">RESTORE PASSWORD</a>
            </li>
            <li STYLE="background-color: white">
                <i class="fa fa-angle-right" style="padding-left: 20px;width: 4px">
                </i>
                @if(session('role'))
                    <a href="{{route('profile1')}}" style="margin-left: 20px">MY ACCOUNT</a>
                @endif
                @if(!session('role'))
                    <a href="{{route('profile')}}" style="margin-left: 20px">MY ACCOUNT</a>
                @endif
            </li>
            <li STYLE="background-color: white">
                <i class="fa fa-angle-right" style="padding-left: 20px;width: 4px">
                </i>
                <a href=""style="margin-left: 20px">ADDRESS BOOK</a>
            </li>
            <li STYLE="background-color: white">
                <i class="fa fa-angle-right" style="padding-left: 20px;width: 4px">
                </i>
                <a href=""style="margin-left: 20px">WISH LIST</a>
            </li>
            <li STYLE="background-color: white">
                <i class="fa fa-angle-right" style="padding-left: 20px;width: 4px">
                </i>
                <a href=""style="margin-left: 20px">RETURNS</a>
            </li>
            <li STYLE="background-color: white">
                <i class="fa fa-angle-right" style="padding-left: 20px;width: 4px">
                </i>
                <a href=""style="margin-left: 20px">NEWSLETTER</a></li>
        </ul>
    </div>
</div>
@yield('web')
