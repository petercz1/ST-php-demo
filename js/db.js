console.log('js loaded');

$(document).ready(do_setup);

function do_setup() {
  $('*').off('click');
  console.log('Inside do_setup');
  get_dbs();
  $('#submit').click(create_db);
  $('#db_name').click(reset);
}

function get_dbs() {
    console.log('Inside show_dbs');
    $.get('backend/db/show_databases.php').done(show_dbs).fail(blow_up);
}

function show_dbs(databases) {
    console.log('Inside show_dbs');
    $('.table tbody').html('');
    console.log(databases);

    var databases = JSON.parse(databases); // convert text response to JSON
    $.each(databases, function(index, database) {
        var tr = $('<tr>');
        var td = $('<td>'); // make first <td>, add db name
        td.text(database.Database);
        tr.append(td);
        td = $('<td>'); //make second <td>, add button with id of dbase name
        var btn = $('<button class="delete_db" id=' + database.Database + '>');
        btn.text('delete');
        btn.addClass("btn btn-danger");
        td.append(btn);
        tr.append(td);
        $('.table tbody').append(tr);
    });
    $('.delete_db').click(drop_db);
}

function create_db() {
  console.log('Inside run_command');
  $('#submit').removeClass().addClass('btn btn-warning right').text('submitting...');
  var dbName = $('#db_name').val();
  var data = {
    db: dbName
  };
  $.get('backend/db/create_db.php', data).done(created_db).fail(blow_up);
}

function created_db(echo_results) {
    console.log('Inside success');
    $('#submit').removeClass().addClass('btn btn-success right').text('success!');
    console.log(echo_results);
    do_setup();
}

function drop_db() {
  console.log('Inside drop_db');
  var dbName = $(this).attr('id');
  console.log(dbName);
  var data = {
    db: dbName
  };
  $.get('backend/db/drop_db.php', data).done(dropped_db).fail(blow_up);
}

function dropped_db(data) {
  console.log('Inside dropped_db');
  console.log(data);
  do_setup();
}

function blow_up(echo_results) {
  console.log('Inside oops');
  $('#submit').removeClass().addClass('btn btn-danger right').text('oops...');
  console.log(echo_results);
}

function reset() {
  console.log('Inside reset');
  $('#submit').removeClass().addClass('btn btn-primary right').text('submit');
}