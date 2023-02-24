<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Admin | Login</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="/admin/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="/admin/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
	<link href="/admin/assets/plugins/ionicons/css/ionicons.min.css" rel="stylesheet" />
	<link href="/admin/assets/css/animate.min.css" rel="stylesheet" />
	<link href="/admin/assets/css/style.min.css" rel="stylesheet" />
	<link href="/admin/assets/css/style-responsive.min.css" rel="stylesheet" />
	<script src="/admin/assets/ckeditor/ckeditor.js" type="text/javascript"></script>
	<script src="/admin/assets/plugins/jquery/jquery-1.9.1.min.js"></script>
<style type="text/css">
	em { color: red !important;text-align: left!important;font-size: 17px !important; }
	.container-fluid{background-color:#fff;}

	.hidden{
		display:block !important;
	}
	.hidden svg{
		display:none;
	}
</style>
</head>
<body class="pace-top">
	<!-- begin #page-container -->
	<div id="page-container" class="">
	    <!-- begin login -->
        <div class="login login-v2" data-pageload-addclass="animated fadeIn">
            <!-- begin brand -->
            <!-- end brand -->
            <div class="login-content">
            <div class="clearfix"></div><br>
				@if ($message = Session::get('success'))
					<div class="alert alert-success alert-block">
						<button type="button" class="close" data-dismiss="alert">×</button>	
						<strong>{{ $message }}</strong>
					</div>
				@endif
				@if ($message = Session::get('error'))
					<div class="alert alert-danger alert-block">
						<button type="button" class="close" data-dismiss="alert">×</button>	
						<strong>{{ $message }}</strong>
					</div>
				@endif
				<p>Login</p>
                <form action="/admin/users/post_login" method="POST" class="margin-bottom-0">
                {{ csrf_field() }}
				 <input type="hidden" name="flag" value="login">
                    <div class="form-group m-b-20">
                        <input type="text" name="email" class="form-control input-lg" placeholder="Username" required />
                    </div>
                    <div class="form-group m-b-20">
                        <input type="password" name="password" class="form-control input-lg" placeholder="Password" required />
                    </div>
                    <div class="checkbox m-b-20">
                        <label> </label>
                    </div>
                    <div class="login-buttons">
                        <button type="submit" name="submit" class="btn btn-primary btn-block btn-lg">Sign me in</button>
                    </div>
                </form>
            </div>
        </div>
	</div>
</body>