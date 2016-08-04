/* global $, document */
function user_add() {
    var user = $('#user').val();
    var email = $('#email').val();
    var password = $('#password').val();
    var role = $('#role').val();

    $.post('user_add.php', {

        'user': user,
        'email': email,
        'password': password,
        'role': role

    }).done(user_add_server_responded).fail(failed);

}

function user_add_server_responded(response) {
    console.log(response);
    if (response == 'exists') {
        $('#error_message').hide().html('<h3>User exists - try again...</h3>').show(500);
    } else {
        $.post('user_select.php').done(user_select).fail(failed);
    }
}
