/* global $, document */
function user_add() {

    // grab values from <input> tags
    var user = $('#user').val();
    var email = $('#email').val();
    var password = $('#password').val();
    var role = $('#role').val();

    // do AJAX stuff to call user_add.php on the server
    // and send it some data as JSON object
    $.post('user_add.php', {

        'user': user,
        'email': email,
        'password': password,
        'role': role

    }).done(user_add_server_responded).fail(failed);

}

function user_add_server_responded(response) {

    // if server responds with 'exists' then show message
    if (response == 'exists') {
        $('#error_message').hide().html('<h3>User exists - try again...</h3>').show(500);
    } else {
        // reload the user table
        $.post('user_select.php').done(user_select).fail(failed);
    }
}
