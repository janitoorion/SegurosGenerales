<!-- Bread crumb is created dynamically -->
<!-- row -->
<div class="row">
	
	<!-- TODO -->
	
	<!-- end TODO -->
</div>
<!-- end row -->

<!--
	The ID "widget-grid" will start to initialize all widgets below 
	You do not need to use widgets if you dont want to. Simply remove 
	the <section></section> and you can use wells or panels instead 
	-->

<!-- widget grid -->
<section id="widget-grid" class="">

	<!-- row -->
	<div class="row">
		
		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			
			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-blueDark" data-widget-sortable="false" data-widget-collapsed="false" data-widget-custombutton="false" data-widget-deletebutton="false" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" id="wid-id-0">
				<!-- widget options:
					usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">
					
					data-widget-colorbutton="false"	
					data-widget-editbutton="false"
					data-widget-togglebutton="false"
					data-widget-deletebutton="false"
					data-widget-fullscreenbutton="false"
					data-widget-custombutton="false"
					data-widget-collapsed="true" 
					data-widget-sortable="false"
					
				-->
				<header>
					<span class="widget-icon"> <i class="fa fa-comments"></i> </span>
					<h2>Registro de Personas</h2>				
					
				</header>

				<!-- widget div-->
				<div>
					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->
						<input class="form-control" type="text">	
					</div>
					<!-- end widget edit box -->
					
					<!-- widget content -->
					<div class="widget-body-min-height-4  widget-body ">
						<!-- this is what the user will see -->
                        <!-- Form content -->
						

						<form action="" method="post" id="contact-form" class="smart-form">
							<header>Nueva Persona</header>
							<fieldset>					
								
								<div class="row">
									<section class="col col-6">
										<label class="label">Nacionalidad</label>
										<label class="select">
											<select name="interested" name="lsNacionalidad" id="lsNacionalidad">
												<option value="0">Interested in</option>
												<option value="1">design</option>
												<option value="1">development</option>
												<option value="2">illustration</option>
												<option value="2">branding</option>
												<option value="3">video</option>
											</select> 
											<i></i> 
										</label>
									</section>
									<section class="col col-6">
										<label class="label">Tipo de Persona</label>
										<label class="select">
											<select name="interested" name="lsTipoPersona" id="lsTipoPersona" onchange="tipoForm();">
												<option value="N">Natural</option>
												<option value="J">Juridica</option>
											</select> <i></i> 
										</label>
									</section>
								</div>

								<div class="row">
									<section class="col col-6">
										<label class="label">ID / RUT</label>
										<label class="input">
											<i class="icon-append fa fa-tag"></i>
											<input type="text" name="txtRut" id="txtRut">
										</label>
									</section>
								</div>
								
								<section class="pernatural">
									<label class="label">Nombre</label>
									<label class="input">
										<i class="icon-append fa fa-comment"></i>
										<input type="text" name="txtNombre" id="txtNombre">
									</label>
								</section>
								
								<section class="pernatural">
									<label class="label">Apellido Paterno</label>
									<label class="input">
										<i class="icon-append fa fa-comment"></i>
										<input type="text" name="txtAp" id="txtAp">
									</label>
								</section>

								<section class="pernatural">
									<label class="label">Apellido Materno</label>
									<label class="input">
										<i class="icon-append fa fa-comment"></i>
										<input type="text" name="txtAm" id="txtAm">
									</label>
								</section>

								<section class="pernatural">
									<label class="label">Fecha Nacimiento</label>
									<label class="input">
										<i class="icon-append fa fa-comment"></i>
										<input type="text" class="form-control" data-mask="99/99/9999" data-mask-placeholder="-">
									</label>
									<p class="note">
										Formato fecha dd/mm/yyyy
									</p>
								</section>

								<div class="row">
									<section class="col col-6 pernatural">
										<label class="label">Sexo</label>
										<label class="select">
											<select name="interested" name="lsNacionalidad" id="lsNacionalidad">
												<option value="0">Femenino</option>
												<option value="1">Masculino</option>
											</select> 
											<i></i> 
										</label>
									</section>
								</div>

								<section class="perjuridica">
									<label class="label">Razón Social</label>
									<label class="input">
										<i class="icon-append fa fa-comment"></i>
										<input type="text" name="txtRs" id="txtRs">
									</label>
								</section>	
								
								<section  class="perjuridica">
									<label class="label">Nombre de fantasía</label>
									<label class="input">
										<i class="icon-append fa fa-comment"></i>
										<input type="text" name="txtNf" id="txtNf">
									</label>
								</section>

							</fieldset>
							
							<footer>
								<button type="submit" class="btn btn-primary">Guardar</button>
							</footer>
							<!--
							<div class="message">
								<i class="fa fa-thumbs-up"></i>
								<p>Your message was successfully sent!</p>
							</div>
							-->
						</form>
                        <!-- end Form content -->
					</div>
					<!-- end widget content -->
				</div>
				<!-- end widget div -->
			</div>
			<!-- end widget -->
		</article>
		<!-- WIDGET END -->
	</div>
	<!-- end row -->
	<!-- row -->
	<div class="row">
		<!-- a blank row to get started -->
		<div class="col-sm-12">
			<!-- your contents here -->
			
		</div>
	</div>
	<!-- end row -->
</section>
<!-- end widget grid -->
<script type="text/javascript">
	/* DO NOT REMOVE : GLOBAL FUNCTIONS!
	 *
	 * pageSetUp(); WILL CALL THE FOLLOWING FUNCTIONS
	 *
	 * // activate tooltips
	 * $("[rel=tooltip]").tooltip();
	 *
	 * // activate popovers
	 * $("[rel=popover]").popover();
	 *
	 * // activate popovers with hover states
	 * $("[rel=popover-hover]").popover({ trigger: "hover" });
	 *
	 * // activate inline charts
	 * runAllCharts();
	 *
	 * // setup widgets
	 * setup_widgets_desktop();
	 *
	 * // run form elements
	 * runAllForms();
	 *
	 ********************************
	 *
	 * pageSetUp() is needed whenever you load a page.
	 * It initializes and checks for all basic elements of the page
	 * and makes rendering easier.
	 *
	 */

	pageSetUp();
	
	/*
	 * ALL PAGE RELATED SCRIPTS CAN GO BELOW HERE
	 * eg alert("my home function");
	 * 
	 * var pagefunction = function() {
	 *   ...
	 * }
	 * loadScript("js/plugin/_PLUGIN_NAME_.js", pagefunction);
	 * 
	 * TO LOAD A SCRIPT:
	 * var pagefunction = function (){ 
	 *  loadScript(".../plugin.js", run_after_loaded);	
	 * }
	 * 
	 * OR you can load chain scripts by doing
	 * 
	 * loadScript(".../plugin.js", function(){
	 * 	 loadScript("../plugin.js", function(){
	 * 	   ...
	 *   })
	 * });
	 */
	
	// pagefunction
	
	var pagefunction = function() {
		// clears the variable if left blank
	};
	
	// end pagefunction

	// destroy generated instances 
	// pagedestroy is called automatically before loading a new page
	// only usable in AJAX version!

	var pagedestroy = function(){
		/*
		Example below:
		$("#calednar").fullCalendar( 'destroy' );
		if (debugState){
			root.console.log("✔ Calendar destroyed");
		} 
		For common instances, such as Jarviswidgets, Google maps, and Datatables, are automatically destroyed through the app.js loadURL mechanic
		*/
	}
	// end destroy

	// run pagefunction
	pagefunction();

	function tipoForm(){
		if($('#lsTipoPersona').val() == 'N'){
			$('.perjuridica').hide();
			$('.pernatural').show();
		}else{
			$('.perjuridica').show();
			$('.pernatural').hide();
		}
	}
	$(document).ready(function() {
		$('.perjuridica').hide();
	});
</script>
