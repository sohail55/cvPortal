@if (Session::has('success_message'))
    <div class="alert alert-success"
        style="{{ Route::current()->getName() == 'dashboard' ? 'border-radius: 0px; margin-top: 15px' : '' }}" role="alert">
        <div class="alert-text"
            style="{{ Route::current()->getName() == 'login' ? 'margin-left: 0px;' : '' }}"><p style="font-size:20px;">
            {{ session::get('success_message') }}</p></div>
    </div>
@endif

@if (Session::has('error_message'))
    <div class="alert alert-danger"
        style="{{ Route::current()->getName() != 'login' ? 'border-radius: 0px; margin-bottom: 15px; width: 100%; margin-top: 15px;' : '' }}" role="alert">
        <div class="alert-text" style="{{ Route::current()->getName() != 'login' ? 'margin-left: 10px;' : '' }}">
          <p style="font-size:20px;">  {{ session::get('error_message') }} </p></div>
    </div>
@endif

@if (Session::get('errors'))
    <div class="alert alert-danger"
        style="{{ Route::current()->getName() != 'login' ? 'border-radius: 0px; margin: 0px' : '' }}" role="alert">
        <div class="alert-text" style="{{ Route::current()->getName() != 'login' ? 'margin-left: 0px;' : '' }}">
            {{ Session::get('errors')->first() }}</div>
    </div>
@endif
