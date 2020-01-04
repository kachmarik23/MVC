function makeLogin() {
    var login = $('#login1').val();
    var pass = $('#pass').val();
    var data = {
        login: login,
        pass: pass
    };
    $.post('/users/login', data, function (res) {

        if (!res[0].success) {
            $('#message').text(res[0].err);
            $('#login_err').fadeIn().show();
            /* setTimeout(function () {
                 $('.alert-danger').fadeOut();
             }, 3000);*/
            $('#login').fadeIn().modal('show');
            return;
        }
        location.reload();
    });
}

function makeRegister() {

    var login = $('#reg_login').val();
    var pass = $('#reg_pass').val();
    var data = {
        login: login,
        pass: pass
    };

    $.post('/users/registr', data, function (res) {
        if (!res[0].success) {
            $('#message_reg').text(res[0].err);
            $('#reg_err').fadeIn().show();
            /*  setTimeout(function () {
                  $('.alert-danger').fadeOut();
              }, 3000);*/
            $('#register').fadeIn().modal('show');
            return;
        }
        location.reload();
    });
}