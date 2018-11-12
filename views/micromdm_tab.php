<h2 id="enrollment_status"></h2>
<div class="col-lg-4">
<h4>Available Commands</h4>
    <table>
        <tr>
            <td><a data-i18n="micromdm.restart" class="btn btn-default btn-xs" href="<?php echo url('module/micromdm/restart_computer_micromdm/' . $serial_number);?>"></a></td>
        </tr>
        <tr>
            <td><a data-i18n="micromdm.security_info" class="btn btn-default btn-xs" href="<?php echo url('module/micromdm/security_info_micromdm/' . $serial_number);?>"></a></td>
        </tr>
    </table>
</div>

<script>
$(document).on('appReady', function(e, lang) {
    $.getJSON( appUrl + '/module/micromdm/get_data/' + serialNumber, function( data ) {

        // Format Enrollment Status
        data.enrollment_status = data.enrollment_status == 'Enrolled' ? 'MicroMDM <span class="label label-success">Enrolled</span>' :
        data.enrollment_status = data.enrollment_status == 'Not Enrolled' ? 'MicroMDM <span class="label label-danger">Not Enrolled</span>' :
        $('#enrollment_status').html(data.enrollment_status);
        // No idea why I need to add this again, but it works...
        $('#enrollment_status').html(data.enrollment_status);

    });
});
</script>