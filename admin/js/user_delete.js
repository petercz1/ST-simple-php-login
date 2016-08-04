/* global $, document */

function user_delete() {

    var id = $(this).parent().parent().attr('name');
    $.post('user_delete.php', {
        id: id
    }).done(deleted).fail(failed);

}

function deleted(deleted_message) {
    console.log(deleted_message);
    $.post('user_select.php').done(user_select).fail(failed);
}
