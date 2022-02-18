var readTaskModal = new bootstrap.Modal(document.getElementById('readTaskModal'), {
   keyboard: false
})

$(document).on('click', '#todolist .list-group-item', function(e) {
   e.preventDefault();

   var t = $(this),
      id = t.data('id'),
      _token = $('meta[name=csrf-token]').attr('content');

   var form = $('#readTaskModal form');

   var title = $('#readTaskModal .modal-title');
   var description = $('#readTaskModal .description');
   var created_at = $('#readTaskModal .created_at');
   var creator = $('#readTaskModal .creator');

   $.ajax({
      type: 'GET',
      url: '/todolist/' + id,
      data: {
         _token: _token
      },
      beforeSend: function() {},
      success: function(data) {
         console.log(data);

         title.html(data.title);
         description.html(data.description);

         created_at.html(moment(data.created_at).tz('Europe/Istanbul').fromNow());
         created_at.attr('data-bs-original-title', moment(data.created_at).format('DD/MM/YYYY HH:mm:ss'))
         creator.html(data.user.name);

         readTaskModal.show();


      },
      error: function(data) {}
   });

});