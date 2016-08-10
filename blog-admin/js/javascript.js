/* global $, document  */

// waits until all the page has loaded and then runs do_setup
$(document).ready(do_setup);


function do_setup() {
    console.log('running setup!');
    // AJAX: sends a request to blog_select.php
    // when php responds it runs blog_select.js
    // (or blows up and runs failed!)
    $.post('post_select.php').done(post_select).fail(failed);
}

function failed() {
    console.log('something failed.... oh nooooo..');
}
