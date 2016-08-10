/* global $, document */

function post_delete() {

    // gets the 'name' attribute of the row that the button is in
    // we used 'name' as id can't begin with a number - doh!
    var id = $(this).parent().attr('name');
    // AJAX call to user_delete.php, and send some data ie id stuff
    $.post('post_delete.php', {
        id: id
    }).done(deleted).fail(failed);

}

// runs if ajax is successful
function deleted(deleted_message) {
    console.log(deleted_message);
    // reloads the user table
    $.post('post_select.php').done(post_select).fail(failed);
}
