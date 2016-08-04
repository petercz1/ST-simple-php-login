/* global $, document */

function user_select(data) {
    build_table(data);

    $('*').off('click');

    $('.delete').click(user_delete);
    $('.edit').click(user_edit);
    $('#user_add').click(user_add);

    $('#error_message').hide();

}

function build_table(data) {
    console.log('running...');

    var json_data = JSON.parse(data);

    var html_string = '<tr><th>user</th><th>email</th><th>role</th></tr>';

    for (var counter = 0; counter < json_data.length; counter++) {
        html_string += '<tr name="' + json_data[counter].id + '">';

        html_string += '<td>';
        html_string += json_data[counter].user;
        html_string += '</td>';

        html_string += '<td>';
        html_string += json_data[counter].email;
        html_string += '</td>';

        html_string += '<td>';
        html_string += json_data[counter].role;
        html_string += '</td>';

        html_string += '<td>';
        html_string += '<button class="edit">edit</button>';
        html_string += '</td>';

        html_string += '<td>';
        html_string += '<button class="delete">delete</button>';
        html_string += '</td>';

        html_string += '</tr>';
    }
    $('#users').html(html_string);
}
