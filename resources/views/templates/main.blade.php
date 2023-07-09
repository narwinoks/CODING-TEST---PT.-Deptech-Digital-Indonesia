@include('templates.head')
<div class="main-wrapper">
    @include('templates.navbar')
    @yield('content')
    @include('templates.footer')
</div>
