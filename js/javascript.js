console.log('js loaded');

$(document).ready(do_setup);

function do_setup(){
    console.log('Inside do_setup');
    $('#submit').click(run_command);
    $('#input_command').click('reset');
}

function run_command(){
    console.log('Inside run_command');
    $('#submit').removeClass().addClass('btn btn-warning right').text('submitting...');
    var cmd = $('#input_command').val();
    var data = {sql:cmd};
    $.get('db/execute_sql.php', data).done(success).fail(oops);
}

function success(data){
    console.log('Inside success');
    $('#submit').removeClass().addClass('btn btn-success right').text('success!');
    console.log(data);
}

function oops(data){
    console.log('Inside oops');
    $('#submit').removeClass().addClass('btn btn-danger right').text('oops...');
    console.log(data);
}

function reset(){
    console.log('Inside reset');
    $('#submit').removeClass().addClass('btn btn-primary right').text('submit');
}

