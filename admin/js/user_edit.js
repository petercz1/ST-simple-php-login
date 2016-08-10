/* global $, document */
function user_edit() {

    // grabs the row that the button is in
    var row = $(this).parent().parent();

    // uses jQuery to navigate and grab text in <td> cells
    var user_td = row.children('td:nth-child(1)');
    var email_td = row.children('td:nth-child(2)');
    var role_td = row.children('td:nth-child(3)');
    // grabs the button inside a <td> cell
    var button_td = row.children('td:nth-child(4)').children();

    // fiddly! makes a new piece of html with an <input> tag
    // and puts back in the text taken out in lines 8 - 10
    user_td.html('<input type="text" id="user" value="' + user_td.html() + '">');
    email_td.html('<input type="text" id="email" value="' + email_td.html() + '">');
    role_td.html('<input type="text" id="role" value="' + role_td.html() + '">');

    // changes 'edit' to 'save'
    button_td.html('save');
    // takes off current click listener (user_edit)
    button_td.off('click');
    // add a click listener to save_edit
    button_td.click(save_edit);
}

function save_edit() {

    // grab values from inside the <input> tags
    var user = $('#user').val();
    var email = $('#email').val();
    var role = $('#role').val();

    // grab id for the user in <tr>
    var id = $('#user').parent().parent().attr('name');

    // ajax call up user_edit.php on the server
    // and send it a JSON data object
    $.post('user_edit.php', {
        'user': user,
        'email': email,
        'role': role,
        'id': id
    }).done(user_edit_server_responded).fail(failed);
}

function user_edit_server_responded(response) {

    // show message if server says user 'exists'
    if (response == 'exists') {
        $('#error_message').hide().html('<h3>email exists - try again...</h3>').show(500);
    } else {
        // refresh user table
        $.post('user_select.php').done(user_select).fail(failed);
    }
}
