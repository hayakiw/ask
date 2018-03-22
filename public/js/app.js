
$(function(){
});

function toggleNoticeCount() {
    if ($('#notice_count span').html() == '0') {
        $('#notice_count').hide();
    }
    else {
        $('#notice_count').show();
    }
}

$(toggleNoticeCount);

$("#notification a")
    .on('ajax:success', function(event, data, status) {
        toggleNoticeCount();
    })
;