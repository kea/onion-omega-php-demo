$(function(){
    $.ajax({
        type: 'GET',
        url: 'expansions_statuses.php',
        dataType: 'json',
        timeout: 5000,
        context: $('body'),
        success: function(data){
            if (data.relay !== false) {
                $('#relay').text("Found expansion: " + data.relay);
                $('#relay-action').show();
            } else {
                $('#relay').text("No relay expansion found");
                $('#relay-action').hide();
            }
            if (data.oled === true) {
                $('#oled').text("Found OLED expansion");
                $('#oled-action').show();
            } else {
                $('#oled').text("No OLED expansion found");
                $('#oled-action').hide();
            }
            if (data.pwm === true) {
                $('#pwm').text("Found servo expansion");
                $('#pwm-action').show();
            } else {
                $('#pwm').text("No servo expansion found");
                $('#pwm-action').hide();
            }
            if (data.gps === true) {
                $('#gps').text("Found GPS expansion");
                $('#gps-action').show();
            } else {
                $('#gps').text("No GPS expansion found");
                $('#gps-action').hide();
            }
        },
        error: function(xhr, type){
//            alert('Ajax error!');
            console.log(xhr, type);
        }
    });
});