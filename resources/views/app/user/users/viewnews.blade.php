@extends('app.user.layouts.default') {{-- Web site Title --}} @section('title') {{{ $title }}} :: @parent @stop {{-- Content --}} @section('styles') @parent
<style type="text/css">
</style>
@endsection @section('main')@include('flash::message') @include('utils.errors.list')
  <div class="card card-flat">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">View News</h5>
        <div class="header-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
            </ul>
        </div>
    </div>
    
        <div class="card-body">
 {{$post->title}}
      

    {!!$post->content!!}



                         
     
    </div>
</div>


@endsection @section('overscripts') @parent

@endsection 
@section('scripts')
 @parent
 <script type="text/javascript">
$(document).on('submit', 'form', function() {
   $(this).find('button:submit, input:submit').attr('disabled','disabled');
 });
</script>

 @endsection