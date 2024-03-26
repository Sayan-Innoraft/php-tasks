$(document).ready(
  function load_posts() {
    $('#load_more').click(function () {
      $start = parseInt($('#start').val());
      $start = $start + 5;
      $('#start').val($start);
      $.ajax({
        url: 'data.php',
        method: 'POST',
        data: { 'starting': $start },
        success: function (response) {
          if (response !== '') {
            $('#posts').append(response);
          } else {
            $('#load_more').val('No More Posts').prop("disabled", true);
          }
        },
        error: function () {
          alert('There was some error performing the AJAX call!');
        }
      });
    });
    $('#search-bar').on('keyup',function () {
      $('#search-list').empty();
      $prefix = $('#search-bar').val();
      $.ajax({
        url: 'username_list.php',
        method: 'POST',
        data: { 'prefix': $prefix },
        success: function (response) {
          if (response !== '') {
            $('#search-list').append(response);
            console.log(response);
          }
        },
        error: function () {
          alert('There was some error performing the AJAX call!');
        }
      });
    });
  }
);