
<section id="widget-grid" class="">
	<div class="row">
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-3" data-widget-sortable="false" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
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
					<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					<h2>Parámetros</h2>
				</header>
				<div>
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->
					</div>
					<div class="widget-body no-padding">
						<table id="datatable_tabletools" class="table table-striped table-bordered table-hover" width="100%">
							<thead>
								<tr>
									<th data-hide="phone">Cod. Parámetro</th>
									<th data-class="expand">Descripción</th>
									<th data-hide="phone">Tipo</th>
									<th data-hide="phone">Número</th>
									<th data-hide="phone,tablet">Texto</th>
									<th data-hide="phone,tablet">Fecha</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>1</td>
									<td>Jennifer</td>
									<td>Et Rutrum Non Associates</td>
									<td>35728</td>
									<td>Fogo</td>
									<td>03/04/14</td>
								</tr>
								<tr>
									<td>2</td>
									<td>Clark</td>
									<td>Nam Ac Inc.</td>
									<td>7162</td>
									<td>Machelen</td>
									<td>03/23/13</td>
								</tr>
								<tr>
									<td>3</td>
									<td>Brendan</td>
									<td>Enim Commodo Limited</td>
									<td>98611</td>
									<td>Norman</td>
									<td>02/13/14</td>
								</tr>
                                <tr>
									<td>1</td>
									<td>Jennifer</td>
									<td>Et Rutrum Non Associates</td>
									<td>35728</td>
									<td>Fogo</td>
									<td>03/04/14</td>
								</tr>
								<tr>
									<td>2</td>
									<td>Clark</td>
									<td>Nam Ac Inc.</td>
									<td>7162</td>
									<td>Machelen</td>
									<td>03/23/13</td>
								</tr>
								<tr>
									<td>3</td>
									<td>Brendan</td>
									<td>Enim Commodo Limited</td>
									<td>98611</td>
									<td>Norman</td>
									<td>02/13/14</td>
								</tr>
                                <tr>
									<td>1</td>
									<td>Jennifer</td>
									<td>Et Rutrum Non Associates</td>
									<td>35728</td>
									<td>Fogo</td>
									<td>03/04/14</td>
								</tr>
								<tr>
									<td>2</td>
									<td>Clark</td>
									<td>Nam Ac Inc.</td>
									<td>7162</td>
									<td>Machelen</td>
									<td>03/23/13</td>
								</tr>
								<tr>
									<td>3</td>
									<td>Brendan</td>
									<td>Enim Commodo Limited</td>
									<td>98611</td>
									<td>Norman</td>
									<td>02/13/14</td>
								</tr>
                                <tr>
									<td>1</td>
									<td>Jennifer</td>
									<td>Et Rutrum Non Associates</td>
									<td>35728</td>
									<td>Fogo</td>
									<td>03/04/14</td>
								</tr>
								<tr>
									<td>2</td>
									<td>Clark</td>
									<td>Nam Ac Inc.</td>
									<td>7162</td>
									<td>Machelen</td>
									<td>03/23/13</td>
								</tr>
								<tr>
									<td>3</td>
									<td>Brendan</td>
									<td>Enim Commodo Limited</td>
									<td>98611</td>
									<td>Norman</td>
									<td>02/13/14</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
        </article>
	</div>
</section>

<script type="text/javascript">
	pageSetUp();
	
	var pagefunction = function() {
		/* BASIC ;*/
            var responsiveHelper_dt_basic = undefined;
            var responsiveHelper_datatable_fixed_column = undefined;
            var responsiveHelper_datatable_col_reorder = undefined;
            var responsiveHelper_datatable_tabletools = undefined;
            
            var breakpointDefinition = {
                tablet : 1024,
                phone : 480
            };
		/* END BASIC */
		
		/* TABLETOOLS ;*/
            $('#datatable_tabletools').dataTable({
                "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'T>r>"+
                        "t"+
                        "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
                "oLanguage": {
                    "sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
                },
                "oTableTools": {
                    "aButtons": [
                    "copy",
                    "csv",
                    "xls",
                        {
                            "sExtends": "pdf",
                            "sTitle": "SmartAdmin_PDF",
                            "sPdfMessage": "SmartAdmin PDF Export",
                            "sPdfSize": "letter"
                        },
                        {
                            "sExtends": "print",
                            "sMessage": "Generated by SmartAdmin <i>(press Esc to close)</i>"
                        }
                    ],
                    "sSwfPath": "js/plugin/datatables/swf/copy_csv_xls_pdf.swf"
                },
                "autoWidth" : true,
                "preDrawCallback" : function() {
                    // Initialize the responsive datatables helper once.
                    if (!responsiveHelper_datatable_tabletools) {
                        responsiveHelper_datatable_tabletools = new ResponsiveDatatablesHelper($('#datatable_tabletools'), breakpointDefinition);
                    }
                },
                "rowCallback" : function(nRow) {
                    responsiveHelper_datatable_tabletools.createExpandIcon(nRow);
                },
                "drawCallback" : function(oSettings) {
                    responsiveHelper_datatable_tabletools.respond();
                }
            });
		/* END TABLETOOLS */
	};
	
	loadScript("assets/js/plugin/datatables/jquery.dataTables.min.js", function(){
		loadScript("assets/js/plugin/datatables/dataTables.colVis.min.js", function(){
			loadScript("assets/js/plugin/datatables/dataTables.tableTools.min.js", function(){
				loadScript("assets/js/plugin/datatables/dataTables.bootstrap.min.js", function(){
					loadScript("assets/js/plugin/datatable-responsive/datatables.responsive.min.js", pagefunction)
				});
			});
		});
	});


</script>