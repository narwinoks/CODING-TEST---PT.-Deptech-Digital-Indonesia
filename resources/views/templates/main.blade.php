@include('templates.head')
<div class="main-wrapper">
    @include('templates.navbar')
    <div class="container mt-5">
        <ol class="breadcrumb float-sm-right">
            {{ Breadcrumbs::render() }}
        </ol>
        @yield('content')
    </div>
    @include('templates.footer')
</div>
