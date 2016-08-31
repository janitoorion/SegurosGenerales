<section id="widget-grid" class="">
  <div class="row">
    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-3" data-widget-togglebutton="false" data-widget-fullscreenbutton="false" data-widget-sortable="false" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
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
          <span class="widget-icon"> <i class="fa fa-table"></i></span>
          <h2>Parámetros</h2>

          <div class="widget-toolbar">

            <div class="btn-group">
              <button class="btn btn-default btn-xs" id="btnAgregar">
                <i class="fa fa-plus"></i> <span class="hidden-mobile">Agregar</span>
              </button>
              <button class="btn btn-default btn-xs" id="btnExportar" onclick="javascript: $('#datatable_tabletools').DataTable().buttons(0).trigger();">
                <i class="fa fa-table"></i> <span class="hidden-mobile">Excel</span>
              </button>
            </div>
          </div>

        </header>
        <div>
          <div class="jarviswidget-editbox">
            <!-- This area used as dropdown edit box -->
          </div>
          <div class="widget-body no-padding">
            <table id="datatable_tabletools" class="table table-striped table-bordered table-hover" width="100%">
              <?= $grilla; ?>
            </table>
          </div>
        </div>
      </div>
    </article>
  </div>
</section>

<script src="<?php echo base_url() ?>assets/js/Excel/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/Excel/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/Excel/buttons.flash.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/Excel/jszip.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/Excel/pdfmake.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/Excel/vfs_fonts.js"></script>
<script src="<?php echo base_url() ?>assets/js/Excel/buttons.html5.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/Excel/buttons.print.min.js"></script>

<script type="text/javascript">
  pageSetUp();

  var pagefunction = function() {
    /* BASIC ;*/
    var responsiveHelper_dt_basic = undefined;
    var responsiveHelper_datatable_fixed_column = undefined;
    var responsiveHelper_datatable_col_reorder = undefined;
    var responsiveHelper_datatable_tabletools = undefined;

    var breakpointDefinition = {
      tablet: 1024,
      phone: 480
    };
    /* END BASIC */

    /* TABLETOOLS ;*/
    $('#datatable_tabletools').dataTable({
      "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'T>r>" +
        "t" +
        "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
      "oLanguage": {
        "sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>',
        "sUrl": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
      },

      "oTableTools": {
        "aButtons": []
      },
      buttons: ['excel'],
      "bDestroy": true,
      "order": [],
      "autoWidth": true,
      "preDrawCallback": function() {
        // Initialize the responsive datatables helper once.
        if (!responsiveHelper_datatable_tabletools) {
          responsiveHelper_datatable_tabletools = new ResponsiveDatatablesHelper($('#datatable_tabletools'), breakpointDefinition);
        }
      },
      "rowCallback": function(nRow) {
        responsiveHelper_datatable_tabletools.createExpandIcon(nRow);
      },
      "drawCallback": function(oSettings) {
        responsiveHelper_datatable_tabletools.respond();
      }
    });
    /* END TABLETOOLS */
  };

  loadScript("assets/js/plugin/datatables/dataTables.colVis.min.js", function() {
    loadScript("assets/js/plugin/datatables/dataTables.tableTools.min.js", function() {
      loadScript("assets/js/plugin/datatables/dataTables.bootstrap.min.js", function() {
        loadScript("assets/js/plugin/datatable-responsive/datatables.responsive.min.js", pagefunction)
      });
    });
  });
</script>