@if (Session::has('error') && ($message = Session::get('error'))) 
    <div class="alert-panel alert-panel-danger"></div>
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <p><i class="icon fa fa-ban"></i>{!! $message !!}</p>
        
  </div>
@elseif (Session::has('success') && ($message = Session::get('success'))) 
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <p><i class="icon fa fa-check"></i>{!! $message !!}</p>
  </div>
    <!--nothing-->
@endif
