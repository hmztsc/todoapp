if (Object($('#todolist-store-form')).length > 0 && Object($('#createModal')).length > 0) {
   var myModal = new bootstrap.Modal(document.getElementById('createModal'), {
      keyboard: false
   });

   $("#todolist-store-form").attr('data-process', 1);

   document.getElementById('createModal').addEventListener('hide.bs.modal', function(event) {
      var form = $("#todolist-store-form");
      form[0].reset();
      form.removeClass('was-validated');
      form.find('input,select,textarea').removeClass('is-invalid is-valid');
      form.find('.alert').removeClass('alert-danger alert-success').addClass('d-none');
      form.attr('data-process', 1);
   });

   $(document).on('submit', "#todolist-store-form", function(e) {
      e.preventDefault();

      var form = $('#todolist-store-form');
      var data = form.serialize();
      var _token = form.find('input[name=_token]').val();

      var elements = {
         title: form.find('#title'),
         description: form.find('#description'),
         status: form.find('#status'),
         priority: form.find('#priority'),
      };

      if (form.attr('data-process') == 1) {
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
            var form = $('#todolist-store-form');

            form.removeClass('was-validated');
            form.find('.is-invalid').removeClass('is-invalid');
            form.find('.alert').removeClass('alert-danger alert-success').addClass('d-none');
            form.find('.alert i').removeClass('bi-exclamation-triangle-fill bi-check-circle-fill');
         }

         function startError(data) {
            var form = $('#todolist-store-form');

            form.find('.alert').removeClass('d-none').addClass('alert-danger');
            form.find('.alert .message').html(data.responseJSON.message);
            form.find('.alert i').addClass('bi-exclamation-triangle-fill');

            var data = data.responseJSON.errors;
            $.each(data, function(key, value) {
               if (Object(data[key]).length) {
                  elements[key].addClass('is-invalid');
                  elements[key].parent().find('.invalid-feedback').html(data[key]);
               }
            });
         }

         function startSuccess(data) {
            console.log(data);
            var created_at = moment().tz(data.created_at, "YYYY-MM-DD HH:mm:ss").fromNow();

            var block = "<a href='#' class='list-group-item list-group-item-action d-flex gap-3 py-3' aria-current='true' data-id='" + data.id + "'>";
            block += "<img src='https://www.webtures.com/assets/images/icons/webtures-180.png' alt='twbs' width='32' height='32' class='rounded-circle flex-shrink-0'>";
            block += "<div class='d-flex gap-2 w-100 justify-content-between'>";
            block += "<div>";
            block += "<h6 class='mb-0'>" + data.title + "</h6>";
            block += "<p class='mb-0 opacity-75'>" + data.description + "</p>";
            block += "</div>";
            block += "<small class='opacity-50 text-nowrap' data-bs-toggle='tooltip' data-bs-placement='top' title='" + created_at + "'>" + created_at + "</small>";
            block += "</div>";
            block += "</div>";
            block += "<div class='transactions ms-auto'>";
            block += "<i class='bi bi-trash3 text-danger delete' data-bs-toggle='modal' data-bs-target='#deleteTaskModal'></i>";
            block += "</div>";
            block += "</a>";

            $('#' + data.status + '_tasks').prepend(block);

            var form = $('#todolist-store-form');

            form.attr('data-process', 0);
            form.find('.alert').removeClass('d-none').addClass('alert-success').find('i').addClass('bi-check-circle-fill');
            form.find('.alert .message').html('New task was created.');
            form.find('input, select, textarea').addClass('is-valid');

            setTimeout(function() {
               myModal.hide();
               form.find('input, select, textarea').removeClass('is-valid');
               form.find('alert').addClass('d-none');
               document.getElementById("todolist-store-form").reset();

            }, 300);
         }
      }


   });
}