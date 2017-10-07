console.log('js loaded');

$(document).ready(do_setup);

function do_setup(){
    console.log('Inside do_setup');
    $('#submit').click(run_command);
}

function run_command(){
    $('#submit').removeClass('btn-primary').addClass('btn-warning').text('submitting...');
    console.log('Inside run_command');
    var cmd = $('#input_command').val();
    var data = {sql:cmd};
    $.get('db/execute_sql.php', data).done(success).fail(oops);
}

function success(data){
    console.log('Inside success');
    $('#submit').removeClass('btn-primary').addClass('btn-warning').text('submitting...');
    console.log(data);
}

function oops(data){
    console.log('Inside oops - something went wrong with php?');
    $('#submit').removeClass('btn-primary').addClass('btn-warning').text('submitting...');

    console.log(data);

}