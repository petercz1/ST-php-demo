console.log('js loaded');

$(document).ready(do_setup);

function do_setup() {
  $('*').off('click');
  console.log('Inside do_setup');
  get_users();
  $('#submit').click(create_user);
  $('#user_name').click(reset);
}

function get_users() {
    console.log('Inside get_users');
    $.get('backend/users/show_users.php').done(show_users).fail(blow_up);
}

function show_users(users) {
    console.log('Inside show_users');
    $('.table tbody').html('');
    console.log(users);
    var users = JSON.parse(users); // convert text response to JSON
    $.each(users, function(index, user) {
        var tr = $('<tr>');
        var td = $('<td>'); // make first <td>, add db name
        td.text(user.User);
        tr.append(td);
        td = $('<td>'); //make second <td>, add button with id of dbase name
        var btn = $('<button class="delete_user" id=' + user.User + '>');
        btn.text('delete');
        btn.addClass("btn btn-danger");
        td.append(btn);
        tr.append(td);
        $('.table tbody').append(tr);
    });
    $('.delete_user').click(drop_user);

}

function create_user() {
  console.log('Inside create_user');
  $('#submit').removeClass().addClass('btn btn-warning right').text('submitting...');
  var userName = $('#user_name').val();
  var userPass = $('#user_pass').val();
  var data = {
    user: userName,
    pass: userPass
  };
  $.get('backend/users/create_user.php', data).done(created_user).fail(blow_up);
}

function created_user(echo_results) {
    console.log('created user');
    $('#submit').removeClass().addClass('btn btn-success right').text('success!');
    console.log(echo_results);
    do_setup();
}

function drop_user() {
  console.log('Inside drop_user');
  var userName = $(this).attr('id');
  console.log(userName);
  var data = {
    user: userName
  };
  $.get('backend/users/drop_user.php', data).done(dropped_user).fail(blow_up);
}

function dropped_user(data) {
  console.log('dropped user');
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