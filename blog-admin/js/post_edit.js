/* global $, document */
var post_div;

function post_edit() {

    post_div = $(this).parent();

    var post_title = post_div.children('.post_title');
    var post_content = post_div.children('.post_content');
    var post_image = post_div.children('.post_image');

    var post_category = post_div.children('.post_byline').children('.post_category');
    var edit_button = post_div.children('.edit');

    post_title.html('<input type="text" id="edit_title" placeholder="enter post title" value="' + post_title.html() + '">');
    post_content.html('<textarea id="edit_content" class="edit_this" placeholder="enter post text">' + post_content.html() + '</textarea>');
    post_category.html('<input type="text" id="edit_category" value="' + post_category.html() + '">');
    post_image.html('<input type="text" id="edit_image" placeholder="enter image url" value="' + post_image.html() + '">');

    edit_button.text('save');
    edit_button.off('click');
    edit_button.click(save_edit);
    post_div.addClass('editing');
}

function save_edit() {
    console.log('saving stuff');

    var post_title = $('#edit_title').val();
    var post_content = $('#edit_content').val();
    var post_category = $('#edit_category').val();
    var post_image = $('#edit_image').val();
    var id = $('#edit_title').parent().parent().attr('name');

    $.post('post_edit.php', {
        'post_title': post_title,
        'post_content': post_content,
        'post_category': post_category,
        'post_image': post_image,
        'id': id
    }).done(post_edit_server_responded).fail(failed);
    post_div.removeClass('editing');
}

function post_edit_server_responded(response) {
    console.log(response);
    $.post('post_select.php').done(post_select).fail(failed);
}
