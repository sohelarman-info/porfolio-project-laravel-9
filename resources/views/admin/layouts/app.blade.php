@role('Admin')
@include('admin.layouts.head')
@include('admin.layouts.nav')
@include('admin.layouts.sidebar')
@yield('title')
@yield('content')
@include('admin.layouts.footer')
@include('admin.layouts.end')

@else
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('404 Page') }}</title>
</head>
<body>
<div class="content-wrapper">
    <div align="center" class="row">
        <a href="{{ route('home') }}"><img width="30%" src="{{ asset('admin/dist/img/404.png') }}" alt="Error"></a>
    </div>
</div>
</body>
</html>
@endrole


