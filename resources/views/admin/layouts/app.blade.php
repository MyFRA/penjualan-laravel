@include('admin.layouts.partials.head')
<body class="">
	@include('admin.layouts.partials.topbar')
	@include('admin.layouts.partials.sidebar')
	<div class="main-content">
		@include('admin.layouts.partials.navbar')
		@include('admin.layouts.partials.header')
		<div class="container-fluid mt--7">
			@yield('content')
			<div class="container mt-5 pb-5">
        		<div class="copyright text-center my-auto">
          			<span><br>
          				Copyright ©2020 | This application is made with <i class="fa fa-heart"></i> by <a target="_blank" href="https://api.whatsapp.com/send?phone=6285229940851">Tomy Wibowo</a>
        			</span><br><br><br>
        		</div>
      		</div>
		</div>
	</div>
	@include('admin.layouts.partials.footer')
</body>

</html>