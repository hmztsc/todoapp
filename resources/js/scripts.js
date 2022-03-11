$('input, select, textarea').on('focusout', function() {
   $(this).removeClass('is-invalid');
});

var alertList = document.querySelectorAll('.alert')
var alerts = [].slice.call(alertList).map(function(element) {
   return new bootstrap.Alert(element)
})

if ($('.alert').length > 0) {
   setTimeout(function() {
      var alertNode = document.querySelector('.alert')
      var alert = bootstrap.Alert.getInstance(alertNode)
      alert.close();
   }, 3000);
}

var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
   return new bootstrap.Tooltip(tooltipTriggerEl)
});