<div id="micromdm-tab"></div>
<h2 data-i18n="micromdm.title"></h2>

<table id="micromdm-tab-table"></table>

<script>
$(document).on('appReady', function(){
    $.getJSON(appUrl + '/module/micromdm/get_data/' + serialNumber, function(data){
        var table = $('#micromdm-tab-table');
        $.each(data, function(key,val){
            var th = $('<th>').text(i18n.t('micromdm.column.' + key));
            var td = $('<td>').text(val);
            table.append($('<tr>').append(th, td));
        });
    });
});
</script>
