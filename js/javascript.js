console.log('js loaded');

$(document).ready(do_setup);

function do_setup(){
    console.log('Inside do_setup');
    $('#submit').click(run_command);
}

function run_command(){
    $('#submit').removeClass('btn-primary').addClass('btn-warning');
    console.log('Inside run_command');

}
