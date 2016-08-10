/* global $, document */
function blog_add() {

    // grab values from <input> tags
    var post_title = $('#post_title').val();
    var post_category = $('#new_post_form [name="post_category"]:checked').val();
    var post_content = $('#post_content').val();
    var post_image = $('#post_image').val();

    console.log(post_category);

    // do AJAX stuff to call user_add.php on the server
    // and send it some data as JSON object
    $.post('post_add.php', {

        'post_title': post_title,
        'post_category': post_category,
        'post_content': post_content,
        'post_image': post_image

    }).done(post_add_server_responded).fail(failed);
}

function post_add_server_responded(response) {

    // if server responds with 'exists' then show message
    if (response == 'exists') {
        $('#error_message').hide().html('<h3>User exists - try again...</h3>').show(500);
    } else {
        // reload the user table
        $.post('post_select.php').done(post_select).fail(failed);
    }
}
