<?php 
use Illuminate\Support\Facades\DB; //use for native query
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Home</title>
	<link rel="shortcut icon" href="{{ URL::to('/images/favicon.ico') }}">
	<!-- Bootstrap core CSS -->
	<link href="{{URL::asset('themes/flatlab/css/bootstrap.css')}}" rel="stylesheet">
	<link href="{{URL::asset('themes/flatlab/css/modern-business.css')}}" rel="stylesheet">
	<link href="{{URL::asset('themes/flatlab/css/font-awesome.css')}}" rel="stylesheet">
	<link href="{{URL::asset('themes/flatlab/assets/notifIt/css/notifIt.css')}}" rel="stylesheet">
	<!-- js -->
</head>

<body>
<a href onclick="topFunction()" id="myBtn" title="Go to top"></a>
<!-- Nav. Header -->
<nav class="bg-nav-header">
	<div class="container-fluid">
		<div class="row-safari">
			<div class="col-sm-4 p-col-sm-4 py-1">
				<?php 
					$url= url('login');  
				?>
				<a href="<?php echo $url ?>" class="button-nav-header1 btn-block">
					<i class="fa fa-user" aria-hidden="true"></i>Login
				</a>
			</div>
			<div class="col-sm-4 p-col-sm-4 py-1">
				<a href="javascript:void(0);" onclick="callModal();" class="button-nav-header1 btn-block">
					<i class="fa fa-edit" aria-hidden="true"></i>Register
				</a>
			</div>
		</div>
	</div>
</nav>	

<!-- Header -->
<header class="bg-header">
	<div class="container-fluid">
		<div class="row-safari">
			<div class="col-lg-3 col-md-3 header-left">
				<img src="images/header-img-left.png" class="img-header-left" alt="">
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12">
				<div class="container-fluid">
					<div class="header-center">
						<div class="row-safari pt-lg-1">
							<div class="col-lg-4 col-md-4 col-sm-4 p-col-sm-4">
								<img src="images/logo-cerol.png" class="img-header-center-left" alt="">
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4 p-col-sm-4">
								<a href="<?php echo url('/');?>"><img src="images/logo-lppommui.png" class="img-header-center" alt=""></a>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4 p-col-sm-4">
								<a href="http://kan.or.id/index.php/documents/terakreditasi/doc17021/sni-iso-iec-17065/lembaga-sertifikasi-halal"><img src="images/logo-kan.png" class="img-header-center-right" alt=""></a>
							</div>
						</div>
						<div class="row-safari">
							<div class="col-lg-12">
							<h4><b>
								LEMBAGA PENGKAJIAN PANGAN, OBAT-OBATAN, DAN KOSMETIKA<br/>
								<span>MAJELIS ULAMA INDONESIA</span>
							</b></h4>
							<h5><b>LPPOM MUI</b></h5>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 header-right">
				<img src="images/header-img-right.png" class="img-header-right" alt="">
			</div>
		</div>
	</div>
</header>

<div class="bg-nav">
	<div class="container">
		<div class="row-safari">
			<div class="col-lg-8 col-md-5 col-sm-3">
				<nav class="navbar navbar-default">
					<div class="navbar-header nav_2">
						<button type="button" class="navbar-toggle collapsed navbar-toggle1 mt-1 my-1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div> 
					<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
						<ul class="nav navbar-nav">
							<li class=" active"><a href="<?php echo url('/');?>" class="hyper "><span>HOME</span></a></li>	
							<li><a href="<?php echo url('certification');?>" class="hyper"> <span>{{trans('front.mnu_Sertifikasi')}}</span></a></li>
							<li><a href="<?php echo url('customer_product');?>" class="hyper"><span>{{trans('front.mnu_CustomerProduct')}}</span></a></li>
							<li><a href="<?php echo url('customer');?>" class="hyper"><span>{{trans('front.mnu_OurCustomer')}}</span></a></li>
							<li><a href="<?php echo url('faq');?>" class="hyper"><span>{{trans('front.mnu_Faq')}}</span></a></li>
						</ul>
					</div>
				</nav>
			</div>
			<div class="col-lg-2 col-md-3 col-sm-9">
				<!--<select class="form-control mt-1 my-1">
				  <option value="">-Select Language-</option>
				  <option>English</option>
				  <option>Indonesia</option>
				</select>-->
				<ul class="languagepicker margin-languagepicker roundborders">
					<li class="btn-languagepicker">{{trans('front.SelectLanguage')}}<i class="fa fa-chevron-circle-down" aria-hidden="true"></i></li>
					<li><div class="id"></div><a href="javascript:void(0);" id="id" onclick="get_lang(this);"><div class="language-text">Indonesia</div></a></li>
					<li><div class="gb"></div><a href="javascript:void(0);" id="en" onclick="get_lang(this);"><div class="language-text">English</div></a></li>
				</ul>
			</div>
			<div class="col-lg-1 col-md-2">
				<?php 
					$url= url('login');  
				?>
				<a href="<?php echo $url ?>" class="button-nav-header btn-block mt-1 my-1">
					<i class="fa fa-user" aria-hidden="true"></i>Login
				</a>
			</div>
			<div class="col-lg-1 col-md-2">
				<a href="javascript:void(0);" onclick="callModal();" class="button-nav-header btn-block mt-1 my-1">
					<i class="fa fa-edit" aria-hidden="true"></i>{{trans('front.mnu_Register')}}
				</a>
			</div>
		</div>		
	</div>
</div>

 <!--content-->
  @yield('content')   
  <!-- end content -->

 
<!-- Footer -->
<footer class="p-sm-1 bg-footer bg-footer-overlay footer-text">
	<div class="container">
		<div class="row-safari">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="contact-us"><img src="{{ URL::to('/images/contact-us.png') }}" class="img-fluid" width="150" alt=""></div>
				<div class="contact-us-text">Contact Us</div>
			</div>
		</div>
		<div class="row-safari">
			<div class="col-lg-4 col-md-4 mb-4 pt-3">
				<div class="row-safari">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<h5>MAJELIS ULAMA INDONESIA</h5>
						<h6>Sekretariat Office (Jakarta)</h6>
					</div>
				</div>
				<div class="row-safari pb-2">
					<div class="col-lg-1 col-md-1 col-sm-1">
						<i class="fa fa-home" aria-hidden="true"></i>   
					</div>
					<div class="col-lg-11 col-md-11 col-sm-11">
						Jl. Proklamasi No. 51, Menteng, Jakarta Pusat 
					</div>
				</div>
				<div class="row-safari pb-2">
					<div class="col-lg-1 col-md-1 col-sm-1">
						<i class="fa fa-phone" aria-hidden="true"></i>   
					</div>
					<div class="col-lg-11 col-md-11 col-sm-11">
						+62 21 3918917
					</div>
				</div>
				<div class="row-safari pb-2">
					<div class="col-lg-1 col-md-1 col-sm-1">
						<i class="fa fa-fax" aria-hidden="true"></i>
					</div>
					<div class="col-lg-11 col-md-11 col-sm-11">
						+62 21 39224667
					</div>
				</div>
				<div class="row-safari pb-2 pb-5">
					<div class="col-lg-1 col-md-1 col-sm-1">
						<i class="fa fa-envelope-o" aria-hidden="true"></i>
					</div>
					<div class="col-lg-11 col-md-11 col-sm-11">
						services@halalmui.org
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 mb-4 padding-footer1 pt-3">
				<div class="row-safari">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<h5>GLOBAL HALAL CENTER</h5>
						<h6>Operational Office (Bogor)</h6>
					</div>
				</div>
				<div class="row-safari pb-2">
					<div class="col-lg-1 col-md-1 col-sm-1">
						<i class="fa fa-home" aria-hidden="true"></i>   
					</div>
					<div class="col-lg-11 col-md-11 col-sm-11">
						Jl. Pemuda No. 5, Bogor, Jawa Barat
					</div>
				</div>
				<div class="row-safari pb-2">
					<div class="col-lg-1 col-md-1 col-sm-1">
						<i class="fa fa-phone" aria-hidden="true"></i>   
					</div>
					<div class="col-lg-11 col-md-11 col-sm-11">
						+62 251 8358748
					</div>
				</div>
				<div class="row-safari pb-2">
					<div class="col-lg-1 col-md-1 col-sm-1">
						<i class="fa fa-fax" aria-hidden="true"></i>
					</div>
					<div class="col-lg-11 col-md-11 col-sm-11">
						+62 251 8358747
					</div>
				</div>
				<div class="row-safari pb-2 pb-5">
					<div class="col-lg-1 col-md-1 col-sm-1">
						<i class="fa fa-envelope-o" aria-hidden="true"></i>
					</div>
					<div class="col-lg-11 col-md-11 col-sm-11">
						services@halalmui.org
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 mb-4 padding-footer2">
				<div class="center">
				<img src="images/follow-us.png" class="img-fluid" width="200" alt="">
				<div class="social-media margin-social-media">
				  <ul>
					<li class="facebook"><i class="fa fa-lg fa-facebook" aria-hidden="true"></i></li>
					<li class="twitter"><i class="fa fa-lg fa-twitter" aria-hidden="true"></i></li>
					<li class="instagram"><i class="fa fa-lg fa-instagram" aria-hidden="true"></i></li>
					<li class="whatsapp"><i class="fa fa-lg fa-whatsapp" aria-hidden="true"></i></li>
				  </ul>
				</div>
				</div>
			</div>
		</div>
	</div>
</footer>

<footer class="bg-copyright">
	<div class="container">
		<div class="row-safari">
			<div class="col-lg-12 col-md-12 col-sm-12 copyright">
				&copy; 2018 LPPOM MUI. All Rights Reserved
			</div>
		</div>
	</div>
</footer>

<script src="{{URL::asset('themes/flatlab/js/jquery.js')}}"></script>
<script type="text/javascript">
function get_lang(p)
{
	$.ajax({
			url: "{{ url('/changelanguage') }}",
			beforeSend:function()
			{		
				
			},
			type:'POST',
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			data: 'locale='+p.id,
			success: function(row) {
				if(row.status=='success')
				{
					window.location.href="<?php echo url('/') ?>";
				}
			}
		});
}

$("#submit-login").click(function(e){
		e.preventDefault();
		var data = $("#myForm").serialize();
		$.ajax({
			url: "{{ url('/auth/dologin') }}",
			beforeSend:function()
			{		
				
			},
			type:'POST',
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			data: data,
			success: function(row) {
				$('#loading-bar').hide();
				$("#submit").attr("disabled", false);
				if(row.status=='success')
				{
					var url ='/'+row.url;
					window.location.href="<?php echo url('/') ?>"+url;
				}
				else
				{
					notif({
					  msg: row.mess,
					  type: "error",
					  opacity: 0.7,
					  fade: true
					});	
				}
			}
		});
}); 

function callModal()
{						
	$.ajax({
		async: true,   
		url: "{{ url('/user/signup') }}",
		type:'POST',
		beforeSend:function()
		{
			//$("#add-btn").attr("disabled", true);
			//$("#loading-bar").show();
		},
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		success: function(data) {		
			//$("#add-btn").attr("disabled", false);
			//$("#loading-bar").hide();
			$('#myModal').modal('show', {backdrop: 'static', keyboard: false});			
			$('#myModal .modal-body').html(data);				
		}
	});
}

function callModal1()
{						
	

	$.ajax({
		async: true,   
		url: "{{ url('/user/feedback') }}",
		type:'POST',
		beforeSend:function()
		{
			//$("#add-btn").attr("disabled", true);
			//$("#loading-bar").show();
		},
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		success: function(data) {		
			//$("#add-btn").attr("disabled", false);
			//$("#loading-bar").hide();
			$('#myModal1').modal('show', {backdrop: 'static', keyboard: false});			
			$('#myModal1 .modal-body').html(data);				
		}
	});
}
		
</script>

<script>
function myFunction() {
    var elmnt = document.getElementById("content");
    elmnt.scrollIntoView();
}
</script>

<script>
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
</script>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
	  <div class="modal-content">
		  <div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			  <h4 class="modal-title">Sign Up</h4>
		  </div>
		  <div class="modal-body">
		  
		  </div>
	  </div>
  </div>
</div>

<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
	  <div class="modal-content">
		  <div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			  <h4 class="modal-title">Feedback</h4>
		  </div>
		  <div class="modal-body">
		  
		  </div>
	  </div>
  </div>
</div>
<!-- modal -->

<script src="{{URL::asset('themes/flatlab/js/bootstrap.js')}}"></script>
<script src="{{URL::asset('themes/flatlab/assets/notifIt/js/notifIt.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('themes/flatlab/js/wowslider.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('themes/flatlab/js/script.js')}}"></script>

</body>
</html>
