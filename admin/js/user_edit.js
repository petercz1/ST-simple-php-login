/* global $, document */
function user_edit() {

    var row = $(this).parent().parent();

    console.log(row);

    var user_td = row.children('td:nth-child(1)');
    var email_td = row.children('td:nth-child(2)');
    var role_td = row.children('td:nth-child(3)');
    var button_td = row.children('td:nth-child(4)').children();

    user_td.html('<input type="text" id="user" value="' + user_td.html() + '">');
    email_td.html('<input type="text" id="email" value="' + email_td.html() + '">');
    role_td.html('<input type="text" id="role" value="' + role_td.html() + '">');

    button_td.html('save');
    button_td.off('click');
    button_td.click(save_edit);
}

function save_edit() {
    console.log('saving stuff');

    var user = $('#user').val();
    var email = $('#email').val();
    var role = $('#role').val();
    console.log($('#user').parent().parent().attr('name'));

    var id = $('#user').parent().parent().attr('name');

    $.post('user_edit.php', {
        'user': user,
        'email': email,
        'role': role,
        'id': id
    }).done(user_edit_server_responded).fail(failed);
}

function user_edit_server_responded(response) {
    console.log(response);
    if (response == 'exists') {
        $('#error_message').hide().html('<h3>email exists - try again...</h3>').show(500);
    } else {
        $.post('user_select.php').done(user_select).fail(failed);
    }
}
