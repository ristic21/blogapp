@if (session('status'))
<div class="container">
  <div class="alert alert-success">
    {{ session('status') }}  
  </div>  
</div>
@endif