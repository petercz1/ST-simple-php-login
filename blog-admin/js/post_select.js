/* global $, document */

function post_select(data) {
    // go and build the table

    build_posts(data);

    // remove click listeners from EVERYTHING...
    $('*').off('click');

    // add a bunch of click listeners
    // all buttons with 'delete' class
    $('.delete').click(post_delete);
    // all buttons with 'edit' class
    $('.edit').click(post_edit);
    // blog_add form button
    $('#blog_add').click(post_add);

    // hide error message
    $('#error_message').hide();

}

function build_posts(data) {

    // changes string text from server into a JSON object
    var json_data = JSON.parse(data);
    $('#posts').empty();
    // build the html
    for (var counter = 0; counter < json_data.length; counter++) {

        // change the date string into an actual date object using date.js
        // https://code.google.com/archive/p/datejs/wikis/APIDocumentation.wiki
        var my_date = Date.parse(json_data[counter].post_date);

        var post_div = '<div class="post_div" name="' + json_data[counter].id + '">';

        post_div += '<div class="post_title">' + json_data[counter].post_title + '</div>';

        post_div += '<div class="post_byline">';
        post_div += my_date.toString('dddd, MMM d');
        post_div += ', <span class="post_category">' + json_data[counter].post_category + '</span>';
        post_div += '</div>';

        post_div += '<button class="edit">edit</button>';
        post_div += '<button class="delete">delete</button>';

        post_div += '<div class="post_image">' + json_data[counter].post_image + '</div>';
        post_div += '<div class="post_content">' + json_data[counter].post_content + '</div>';
        post_div += '</div>';
        // use jQuery to add html to page
        $('#posts').append(post_div);
    }
}
