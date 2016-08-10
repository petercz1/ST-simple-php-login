/* global $, document */

function user_select(data) {
    // go and build the table
    build_table(data);

    // remove click listeners from EVERYTHING...
    $('*').off('click');

    // add a bunch of click listeners
    // all buttons with 'delete' class
    $('.delete').click(user_delete);
    // all buttons with 'edit' class
    $('.edit').click(user_edit);
    // user_add form button
    $('#user_add').click(user_add);

    // hide error message
    $('#error_message').hide();

}

function build_table(data) {
    console.log('running...');

    // changes string text from server into a JSON object
    var json_data = JSON.parse(data);

    // build the html
    var html_string = '<tr><th>user</th><th>email</th><th>role</th></tr>';

    for (var counter = 0; counter < json_data.length; counter++) {
        // loops through all rows in JSON object
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
    // use jQuery to add html to page
    $('#users').html(html_string);
}
