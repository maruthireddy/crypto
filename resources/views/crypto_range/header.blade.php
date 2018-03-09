<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>BIGMARKET CRYPTO</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
      <style>
#chartdiv {
  width: 100%;
  height: 295px;
}
</style>

<style>
@import url(https://fonts.googleapis.com/css?family=Raleway);


.faq-header{
 font-size: 2em;
 border-bottom: 1px dotted #ccc;
 padding: 1em 0;
}

.faq-c {
 border-bottom: 1px dotted #ccc;
 padding: 1em 0;
}

.faq-t {
 line-height: 1em;
 color: #aaa;
 font-family: sans-serif;
 float:left;
 font-weight: 700;
 padding-right: 0.3em;
 -webkit-transition: all 200ms;
 -moz-transition: all 200ms;
 transition: all 200ms;
}

.faq-o {
 transform: rotate(-45deg);
 transform-origin: 50% 50%;
 -ms-transform: rotate(-45deg);
 -ms-transform-origin: 50% 50%;
 -webkit-transform: rotate(-45deg);
 -webkit-transform-origin: 50% 50%;
 -webkit-transition: all 200ms;
 -moz-transition: all 200ms;
 transition: all 200ms;
}

.faq-q {
 cursor: pointer;
 font-size: 1.5em;
 font-weight: 100;
}

.faq-a {
 clear: both;
 color: #666;
 display: none;
 padding-left: 1.5em;
}



@import url(https://fonts.googleapis.com/css?family=Open+Sans:400,600);

.promos {
  width: 800px;
  margin: 0 auto;
  margin-top: 50px;
}
.promo {
  width: 250px;
  background: #0F1012;
  color: #f9f9f9;
  float: left;
}
.deal {
  padding: 10px 0 0 0;
}
.deal span {
  display: block;
  text-align: center;
}
.deal span:first-of-type {
  font-size: 23px;
}
.deal span:last-of-type {
  font-size: 13px;
}
.promo .price {
  display: block;
  width: 250px;
  background: #292b2e;
  margin: 15px 0 10px 0;
  text-align: center;
  font-size: 23px;
  padding: 17px 0 17px 0;
}
ul {
  display: block;
  margin: 20px 0 10px 0;
  padding: 0;
  list-style-type: none;
  text-align: center;
  color: #999999;
}
li {
  display: block;
  margin: 10px 0 0 0;
}
.butn {
  border: none;
  border-radius: 40px;
  background: #292b2e;
  color: #f9f9f9;
  padding: 10px 37px;
  margin: 10px 0 20px 60px;
}
.scale {
  transform: scale(1.2);
  box-shadow: 0 0 4px 1px rgba(20, 20, 20, 0.8);
}
.scale button {
  background: #64AAA4;
}
.scale .price {
  color: #64AAA4;
}
</style>
<style>
#snackbar {
    visibility: hidden;
    min-width: 250px;
    margin-left: -125px;
    background-color:red;
    color: #fff;
    text-align: center;
    border-radius: 2px;
    padding: 16px;
    position: fixed;
    z-index: 1;
    left: 50%;
    bottom: 30px;
    font-size: 12px;
}

#snackbar.show {
    visibility: visible;
    -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
    animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

@-webkit-keyframes fadein {
    from {bottom: 0; opacity: 0;}
    to {bottom: 30px; opacity: 1;}
}

@keyframes fadein {
    from {bottom: 0; opacity: 0;}
    to {bottom: 30px; opacity: 1;}
}

@-webkit-keyframes fadeout {
    from {bottom: 30px; opacity: 1;}
    to {bottom: 0; opacity: 0;}
}

@keyframes fadeout {
    from {bottom: 30px; opacity: 1;}
    to {bottom: 0; opacity: 0;}
}
</style>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="#" class="site_title"><i class="fa fa-user"></i> <span>BIGMARKET CRYPTO</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <p>{{Session::get('user')->first_name}}</p>
                  <span>{{Session::get('user')->email}}</span>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href='/crypto_range/dashboard'><i class="fa fa-home"></i> Dashboard <span class=""></span></a></li>
                  <li class="treeview">
                <a href="/crypto_range/trading">
                <i class="fa fa-line-chart"></i> <span>Trading</span>
                </a>
              </li>
                    <li class="treeview">
                <a href="/crypto_range/wallet">
                <i class="fa fa-money"></i> <span>Wallet</span>
                </a>
              </li>
                <li class="treeview">
                <a href="/crypto_range/trading_history">
                <i class="fa fa-history"></i> <span>Trading History</span>
                </a>
              </li>
                <li class="treeview">
                <a href="/crypto_range/affiliate">
                <i class="fa fa-users"></i> <span>Affiliate</span>
                </a>
              </li>
                <li class="treeview">
                <a href="support.php">
                <i class="fa fa-envelope"></i> <span>Support</span>
                </a>
              </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="/logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav class="col-md-12">
              <div class="col-md-2 nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="col-md-5 nav navbar-nav navbar-right">

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-exit"></i>
     
                  </a>

                </li>
              </ul>
                <div class="col-md-5" style="margin-left: 5%;">
              Referral Link : <span style='color:orange'>https://cryptorange.io/signup?referral={{Session::get('user')->referral_key}}</span>
        </div>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
 <script type="text/javascript">

        $(document).ready(function () {
            $('#demo-pie-1').pieChart({
                barColor: '#2dde98',
                trackColor: '#eee',
                lineCap: 'round',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-2').pieChart({
                barColor: '#8e43e7',
                trackColor: '#eee',
                lineCap: 'butt',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-3').pieChart({
                barColor: '#ffc168',
                trackColor: '#eee',
                lineCap: 'square',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });


        });

    </script>
<!-- //pie-chart --><!-- index page sales reviews visitors pie chart -->

	<!-- requried-jsfiles-for owl -->

						<script>
							$(document).ready(function() {
								$("#owl-demo").owlCarousel({
									items : 3,
									lazyLoad : true,
									autoPlay : true,
									pagination : true,
									nav:true,
								});
							});
						</script>
					<!-- //requried-jsfiles-for owl -->

