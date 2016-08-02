/* global $, document  */

$(document).ready(do_setup);

function do_setup() {
    console.log('running setup!');
    $.post('user_select.php').done(user_select).fail(failed);
}

function failed() {
    console.log('something failed.... oh nooooo..');
}

function do_setup() {
    console.log('loaded...');
    $.post('user_select.php').done(user_select).fail(failed);
}

function failed() {
    console.log('something failed');
}
