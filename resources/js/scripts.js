$.ajaxSetup({
   headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
});

$('input, select, textarea').on('focusout', function() {
   $(this).removeClass('is-invalid');
});

var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
   return new bootstrap.Tooltip(tooltipTriggerEl)
})