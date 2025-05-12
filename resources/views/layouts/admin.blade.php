<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Admin Dashboard</title>
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" href="images/favicon.ico" type="image/x-icon">
    
    <!-- vendor css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('css/Admin/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/Admin/mo.css') }}" />
    @stack('css')
</head>
<body class="">
	<div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div>
        
    @include('layouts.admin.nav')
    @include('layouts.admin.header')
    <main>
        <div class="pcoded-main-container">
            <div class="pcoded-content">
                @yield('content')
            </div>
        </div>
    </main>
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{ asset('js/admin/vendor-all.min.js') }}"></script>
    <script src="{{ asset('js/admin/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/admin/pcoded.min.js') }}"></script>
    <script src="{{ asset('js/admin/plugins/apexcharts.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/parsleyjs@2.9.2/dist/parsley.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('scripts')
</body>

</html>
