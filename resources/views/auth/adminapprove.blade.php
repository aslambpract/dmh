@extends('layouts.auth')
@section('styles') @parent
<style type="text/css">
h4{
margin-top: 100px;
}

ul.nav.nav-tabs.nav-tabs-vertical {
background: #eaeaea;
}

.nav-tabs-vertical .nav-item.show .nav-link, .nav-tabs-vertical .nav-link.active{
background-color: #fff;
</style>
@endsection
@section('content')
<div class="row" style="    margin-top: 28px;
">
    <div class="col-lg-8 offset-lg-2">
        <div class="card mb-0">
            <div class="card-body">
                <div class="text-center mb-3">
                    <i class="icon-plus3 icon-2x text-success border-success border-3 rounded-round p-3 mb-3 mt-1"></i>      
                </div>
                    <form action="{{url('approve')}}" class="smart-wizard form" method="post" onsubmit="return checkForm(this);">
                    <input name="_token" type="hidden" value="{{csrf_token()}}">
                      <input name="reg_id" type="hidden" value="{{$reg_id}}">

                    <h6 class="width-full" style="text-align: center;">{{trans('register.approve_user') }}  </h6>
                    <fieldset>
                        <div class="col-md-12 text-center">
                            <button class="btn btn-info" id="approve" name="approve" tabindex="4" type="submit" value="debit">
                            {{trans('register.approve')}}
                            </button>
                        </div>
                    </fieldset>
                    </form>
            </div>
        </div>
    </div>
</div>

@endsection @section('overscripts') @parent

@endsection


