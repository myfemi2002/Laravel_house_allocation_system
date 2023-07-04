@php
$id = Auth::user()->id;
$adminData = App\Models\User::find($id);
@endphp
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">@yield('title')</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page" style="text-transform: capitalize;">{{ Auth::user()->role }}</li>
            </ol>
        </nav>
    </div>
</div>