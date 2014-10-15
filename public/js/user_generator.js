$(function() {
  var $includePasswordEl = $('#include_password');
  var $passwordFieldsEl = $('#password-fields');
  $includePasswordEl.on('change', function(e) {
    if($includePasswordEl.is(':checked')) {
      $passwordFieldsEl.show();
    } else {
      $passwordFieldsEl.hide();
    }
  });
});