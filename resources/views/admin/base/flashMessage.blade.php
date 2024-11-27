 @if (session('success'))
     <div class="toast bg-success mb-5 w-100" role="alert" aria-live="assertive" aria-atomic="true">
         <div class="toast-header">
             <strong class="me-auto">Mesaj: </strong>
             <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
         </div>
         <div class="toast-body  text-light">
             <b>{{ session('success') }}</b>
         </div>
     </div>
 @endif
 @if (session('error'))
     <div class="toast bg-danger mb-5 w-100" role="alert" aria-live="assertive" aria-atomic="true">
         <div class="toast-header">
             <strong class="me-auto">Mesaj: </strong>
             <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
         </div>
         <div class="toast-body  text-light">
             <b>{{ session('error') }}</b>
         </div>
     </div>
 @endif
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
 <script>
     var toast = new bootstrap.Toast(document.querySelector('.toast'))
     toast.show();
 </script>
