@php
  $html = '';
  if (count($errors) > 0):
    $html .= "<ul class='list-unstyled'>";
    foreach ($errors->all() as $error):
      $html .= "<li>{$error}</li>";
    endforeach;
    $html .= "</ul>";

    echo '
      <script>
          var errors = {
            status: "errors",
            message: "'.$html.'"
      }
      show_message(errors);
      </script>
      ';

  endif;

@endphp



