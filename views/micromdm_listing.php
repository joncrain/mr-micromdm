<?php $this->view('partials/head'); ?>

<?php //Initialize models needed for the table
new Machine_model;
new Reportdata_model;
new Micromdm_model;
?>

<div class="container">
  <div class="row">
  	<div class="col-lg-12">
    <h3><span data-i18n="micromdm.listing.title"></span> <span id="total-count" class='label label-primary'>…</span></h3>
        <table class="table table-striped table-condensed table-bordered">
            <thead>
                <tr>
                    <th data-i18n="listing.computername" data-colname='machine.computer_name'></th>
                    <th data-i18n="serial" data-colname='reportdata.serial_number'></th>
                    <th data-i18n="username" data-colname='reportdata.long_username'></th>
                    <th data-i18n="micromdm.mdm_enrollment_status" data-colname='micromdm.mdm_enrollment_status'></th>
                    <th data-i18n="micromdm.dep_enrollment_status" data-colname='micromdm.dep_enrollment_status'></th>
                    <th data-i18n="micromdm.latestresponse" data-colname='micromdm.latestresponse'></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td data-i18n="listing.loading" colspan="6" class="dataTables_empty"></td>
                </tr>
            </tbody>
        </table>
    </div> <!-- /span 12 -->
  </div> <!-- /row -->
</div>  <!-- /container -->

<script type="text/javascript">

	$(document).on('appUpdate', function(e){
            var oTable = $('.table').DataTable();
            oTable.ajax.reload();
            return;
	});

	$(document).on('appReady', function(e, lang) {
            // Get column names from data attribute
            var columnDefs = [],
            col = 0; // Column counter
            $('.table th').map(function(){
              columnDefs.push({name: $(this).data('colname'), targets: col});
              col++;
            });
	    oTable = $('.table').dataTable( {
	        columnDefs: columnDefs,
	        ajax: {
                url: appUrl + '/datatables/data',
                type: "POST",data:
                function(d){
                    d.mrColNotEmpty = "mdm_enrollment_status";  // Only show if this column contains data            
                }
            },
            dom: mr.dt.buttonDom,
            buttons: mr.dt.buttons,
	        createdRow: function( nRow, aData, iDataIndex ) {
                    // Update name in first column to link
                    var name=$('td:eq(0)', nRow).html();
                    if(name == ''){name = "No Name"};
                    var sn=$('td:eq(1)', nRow).html();
                    var link = mr.getClientDetailLink(name, sn, '#tab_micromdm-tab');
                    $('td:eq(0)', nRow).html(link);
            
            var mdm_enrolled = $('td:eq(3)', nRow).html();
            $('td:eq(3)', nRow).html(function(){
                if( mdm_enrolled == 'Enrolled'){
                    return '<span class="label label-success">'+i18n.t('Enrolled')+'</span>';
                }
                return '<span class="label label-danger">'+i18n.t('Not Enrolled')+'</span>';
            });
            
            var dep_enrolled = $('td:eq(4)', nRow).html();
            $('td:eq(4)', nRow).html(function(){
                if( dep_enrolled == 'Enrolled'){
                    return '<span class="label label-success">'+i18n.t('Enrolled')+'</span>';
                }
                return '<span class="label label-danger">'+i18n.t('Not Enrolled')+'</span>';
            });
	        }
	    });
	});
</script>

<?php $this->view('partials/foot'); ?>
