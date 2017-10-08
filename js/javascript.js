console.log('js loaded');

$(document).ready(do_setup);

function do_setup() {
  console.log('Inside do_setup');
  $('#submit').click(create_db);
  $('#db_name').click(reset);
  $('#drop_db').click(drop_db);
  get_dbs();
}

function create_db() {
  console.log('Inside run_command');
  $('#submit').removeClass().addClass('btn btn-warning right').text('submitting...');
  var dbName = $('#db_name').val();
  var data = {
    db: dbName
  };
  $.get('db/create_db.php', data).done(success).fail(oops);
}

function success(echo_results) {
  console.log('Inside success');
  $('#submit').removeClass().addClass('btn btn-success right').text('success!');
  console.log(echo_results);
}

function oops(echo_results) {
  console.log('Inside oops');
  $('#submit').removeClass().addClass('btn btn-danger right').text('oops...');
  console.log(echo_results);
}

function reset() {
  console.log('Inside reset');
  $('#submit').removeClass().addClass('btn btn-primary right').text('submit');
}

function get_dbs(){
    console.log('Inside show_dbs');
    $.get('db/show_databases.php').done(show_dbs).fail(oops);
}

function show_dbs(data){
    console.log('Inside show_dbs');
    console.log(JSON.parse(data));
}