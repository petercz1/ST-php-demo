console.log('js loaded');

$(document).ready(do_setup);

function do_setup(){
    console.log('Inside do_setup');
    $('#submit').click(run_command);
}

function run_command(){
    $('#submit').removeClass().addClass('btn btn-warning right').text('submitting...');
    console.log('Inside run_command');
    var cmd = $('#input_command').val();
    var data = {sql:cmd};
    $.get('db/execute_sql.php', data).done(success).fail(oops);
}

function success(data){
    console.log('Inside success');
    $('#submit').removeClass().addClass('btn btn-success right').text('submitting...');
    console.log(data);
}

function oops(data){
    console.log('Inside oops - something went wrong with php?');
    $('#submit').removeClass().addClass('btn btn-danger right').text('submitting...');

    console.log(data);

}