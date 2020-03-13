@include('admin.layouts.partials.head')
<body class="">
	@include('admin.layouts.partials.topbar')
	@include('admin.layouts.partials.sidebar')
	<div class="main-content">
		@include('admin.layouts.partials.navbar')
		@include('admin.layouts.partials.header')
		<div class="container-fluid mt--7">
			@yield('content')
		</div>
	</div>
	@include('admin.layouts.partials.footer')
</body>

</html>