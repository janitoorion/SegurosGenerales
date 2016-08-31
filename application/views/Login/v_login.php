<!DOCTYPE html>
<html lang="en-us" id="lock-page">

<head>
  <meta charset="utf-8">
  <title> Seguros Generales </title>
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

  <!-- #CSS Links -->
  <!-- Basic Styles -->
  <link rel="stylesheet" type="text/css" media="screen" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" media="screen" href="assets/css/font-awesome.min.css">

  <!-- SmartAdmin Styles : Caution! DO NOT change the order -->
  <link rel="stylesheet" type="text/css" media="screen" href="assets/css/smartadmin-production-plugins.min.css">
  <link rel="stylesheet" type="text/css" media="screen" href="assets/css/smartadmin-production.min.css">
  <link rel="stylesheet" type="text/css" media="screen" href="assets/css/smartadmin-skins.min.css">

  <!-- SmartAdmin RTL Support -->
  <link rel="stylesheet" type="text/css" media="screen" href="assets/css/smartadmin-rtl.min.css">

  <!-- We recommend you use "your_style.css" to override SmartAdmin
specific styles this will also ensure you retrain your customization with each SmartAdmin update.
<link rel="stylesheet" type="text/css" media="screen" href="css/your_style.css"> -->

  <!-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp -->
  <link rel="stylesheet" type="text/css" media="screen" href="assets/css/demo.min.css">

  <!-- page related CSS -->
  <link rel="stylesheet" type="text/css" media="screen" href="assets/css/lockscreen.min.css">

  <!-- #FAVICONS -->
  <link rel="shortcut icon" href="assets/img/favicon/favicon.ico" type="image/x-icon">
  <link rel="icon" href="assets/img/favicon/favicon.ico" type="image/x-icon">

  <!-- #GOOGLE FONT -->
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

  <!-- #APP SCREEN / ICONS -->
  <!-- Specifying a Webpage Icon for Web Clip
    Ref: https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html -->
  <link rel="apple-touch-icon" href="assets/img/splash/sptouch-icon-iphone.png">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/splash/touch-icon-ipad.png">
  <link rel="apple-touch-icon" sizes="120x120" href="assets/img/splash/touch-icon-iphone-retina.png">
  <link rel="apple-touch-icon" sizes="152x152" href="assets/img/splash/touch-icon-ipad-retina.png">

  <!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">

  <!-- Startup image for web apps -->
  <link rel="apple-touch-startup-image" href="assets/img/splash/ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
  <link rel="apple-touch-startup-image" href="assets/img/splash/ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
  <link rel="apple-touch-startup-image" href="assets/img/splash/iphone.png" media="screen and (max-device-width: 320px)">

</head>

<body>

  <div id="main" role="main">

    <!-- MAIN CONTENT -->

    <form class="lockscreen animated flipInY" action="LoginController/validar_login" method="POST" id="lock-form">
      <div class="logo">
        <h1 class="semi-bold"><img src="assets/img/logo-o.png" alt="" /> Seguros Generales </h1>
      </div>
      <div>
        <img src="assets/img/avatars/male.png" alt="" width="120" height="120" />
        <div>
          <h1><i class="fa fa-user fa-3x text-muted air air-top-right hidden-mobile"></i> Acceso al sistema <small><i class="fa fa-lock text-muted"></i> &nbsp;bloqueado</small></h1>
          <p class="text-muted">
            Ingrese los datos para entrar al sistema
          </p>

          <div class="input-group col-md-12">
            <input class="form-control" type="text" name="username" id="username" value="" placeholder="Usuario" style="margin-top:5px">
            <input class="form-control" type="password" name="password" id="password" placeholder="Contraseña" type="submit" style="margin-top:5px">
          </div>

          <fieldset>
            <section>
			<div class="col-md-12">
              <label class="checkbox" >
                <input type="checkbox" name="remember" checked="" style="margin-left:-10px">
                <i></i> &nbsp; Seguir conectado
              </label>
			  </div>
            </section>
          </fieldset>
		  <div class="input-group col-md-12 text-align-right">
			<button type="submit" class="btn btn-primary">
				Entrar
			</button>
		</div>
        </div>
		
      </div>
      <p class="font-xs margin-top-5">


      </p>
    </form>

  </div>

  <!--================================================== -->

  <!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
  <script src="assets/js/plugin/pace/pace.min.js"></script>

  <!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
  <script src="assets/js/libs/jquery-2.1.1.min.js"></script>
  <script src="assets/js/libs/jquery-ui-1.10.3.min.js"></script>

  <!-- IMPORTANT: APP CONFIG -->
  <script src="assets/js/app.config.js"></script>

  <!-- JS TOUCH : include this plugin for mobile drag / drop touch events
    <script src="js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script> -->

  <!-- BOOTSTRAP JS -->
  <script src="assets/js/bootstrap/bootstrap.min.js"></script>

  <!-- JQUERY VALIDATE -->
  <script src="assets/js/plugin/jquery-validate/jquery.validate.min.js"></script>

  <!-- JQUERY MASKED INPUT -->
  <script src="assets/js/plugin/masked-input/jquery.maskedinput.min.js"></script>

  <!--[if IE 8]>
    
<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

<![endif]-->

  <!-- CUSTOM NOTIFICATION -->
  <script src="assets/js/notification/SmartNotification.min.js"></script>

  <!-- MAIN APP JS FILE -->
  <script src="assets/js/app.min.js"></script>
  <script type="text/javascript">
    runAllForms();
    pageSetUp();

    var pagefunction = function() {
      // Validation
      $("#lock-form").validate({
        rules: {
          password: {
            required: true,
            minlength: 3,
            maxlength: 20
          }
        },
        messages: {
          password: {
            required: 'Ingrese Contraseña'
          }
        },
        errorPlacement: function(error, element) {
          error.insertAfter(element.parent());
        },
        submitHandler: function(form) {
          $.ajax({
            url: form.action,
            type: form.method,
            data: $(form).serialize(),
            dataType: "json",
            success: function(data) {
              if (data['STATUS'] == "TRUE") {
                window.location.href = 'HomeController';
              } else {
                $.smallBox({
                  title: 'Atención',
                  content: "<i class='fa fa-info-circle'></i><i> " + data['STATUS'] + "</i>",
                  color: "#C46A69",
                  timeout: 2000,
                  icon: "fa fa-thumbs-down bounce animated",
                });
              }
            },
            error: function(xhr, ajaxOptions, thrownError) {
              $.smallBox({
                title: 'Atención',
                content: "<i class='fa fa-info'></i><i> " + thrownError + "</i>",
                color: "#C46A69",
                timeout: 2000,
                icon: "fa fa-thumbs-down bounce animated",
              });
            }
          });
        }

      });
    }

    loadScript("assets/js/plugin/bootstrap-progressbar/bootstrap-progressbar.min.js", pagefunction);
  </script>
</body>

</html>