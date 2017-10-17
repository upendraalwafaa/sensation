function notification_details() {
    var data = {status: 'get_notification_details'};
    $.ajax({
        url: base_url + "Home/notification_helper",
        type: 'POST',
        async: true,
        data: data,
        success: function (data) {
            var json = jQuery.parseJSON(data);
            $('#notification_ul_id').empty();
            $('#notification_ul_id').append(json.html);
            $('.count_notification').text(json.count)
        }
    });
}
notification_details();
