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

function drop_db(){
    console.log('Inside drop_db');
    var dbName = 'test2';
    var data = {
      db: dbName
    };
    $.get('db/drop_db.php', data).done(dropped_db).fail(oops);
}

function dropped_db(data){
    console.log('Inside dropped_db');
    console.log(data);
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
    var data = JSON.parse(data);
    var td = $('<td>');
    data.each(function(db){
        td.text(db.Database);
    });
    var tr = $('<tr>');
    tr.append(td);
    $('.table tbody').append(tr);

}