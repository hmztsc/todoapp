var deleteModal = new bootstrap.Modal(document.getElementById('deleteTaskModal'), {
   keyboard: false
});

$(document).on('click', '#todolist .delete ', function() {
   var t = $(this),
      id = t.closest('.list-group-item').data('id'),
      form = $('#deleteTaskModal form');

   form.attr('action', '/todolist/' + id);
   form.attr('data-id', id);
});

$(document).on('submit', '#deleteTaskModal form ', function(e) {

   e.preventDefault();

   var t = $(this),
      form = $('#deleteTaskModal form');

   var data = form.serialize();

   $.ajax({
      type: form.attr('method'),
      url: form.attr('action'),
      data: data,
      beforeSend: function() {
         startBeforeSend();
      },
      success: function(data) {
         startSuccess(data);
      },
      error: function(data) {
         startError(data);
      }
   });

   function startBeforeSend() {

   }

   function startSuccess(data) {
      var form = $('#deleteTaskModal form'),
         id = form.attr('data-id');

      console.log(data);

      if (data.status == 1) {
         deleteModal.hide();
         $('#todolist *[data-id=' + id + ']').remove();
      }
   }

   function startError() {

   }


});