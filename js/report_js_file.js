$('#collection_div').text($('#total_collection').val());
$('.therapy_report_read_more').click(function () {
    var more = $(this).attr('full_history');
    Lobibox.window({
        title: 'Note History',
        content: more
    });
});


$("body input[name='reports']").click(function () {
    var radio_val = $(this).val();
    if (radio_val == 'therapy_reports') {
        $('#tharapy_report_div').show();
        $('#registration_reports_div').hide();
        $('#capacity_reports_div').hide();
        $('#receipt_reports_div').hide();
        $('#quotation_reports_div').hide();
    }
    if (radio_val == 'registration_reports') {
        $('#registration_reports_div').show();
        $('#receipt_reports_div').hide();
        $('#capacity_reports_div').hide();
        $('#tharapy_report_div').hide();
        $('#quotation_reports_div').hide();
    }
    if (radio_val == 'quotation_reports') {
        $('#quotation_reports_div').show();
        $('#receipt_reports_div').hide();
        $('#capacity_reports_div').hide();
        $('#tharapy_report_div').hide();
        $('#registration_reports_div').hide();
    }
    if (radio_val == 'receipt_reports') {
        $('#receipt_reports_div').show();
        $('#quotation_reports_div').hide();
        $('#capacity_reports_div').hide();
        $('#tharapy_report_div').hide();
        $('#registration_reports_div').hide();
    }
    if (radio_val == 'capacity_reports') {
        $('#capacity_reports_div').show();
        $('#receipt_reports_div').hide();
        $('#quotation_reports_div').hide();
        $('#tharapy_report_div').hide();
        $('#registration_reports_div').hide();
    }
});

//<![CDATA[
//<![CDATA[
var tableToExcel = (function () {
    var uri = 'data:application/vnd.ms-excel;base64,'
            , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
            , base64 = function (s) {
                return window.btoa(unescape(encodeURIComponent(s)))
            }
    , format = function (s, c) {
        return s.replace(/{(\w+)}/g, function (m, p) {
            return c[p];
        })
    }
    return function (table, name, file_name = '') {
        if (!table.nodeType)
            table = document.getElementById(table)
        var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
        //window.location.href = uri + base64(format(template, ctx))
        var link = document.createElement("a");
        link.download = file_name + ".xls";
        link.href = uri + base64(format(template, ctx));
        link.click();
    }
})()
//]]> 
//]]> 