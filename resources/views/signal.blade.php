@extends('adminlte::master')

@section('adminlte_css')
<link rel="stylesheet" href="{{ asset('vendor/icheck-bootstrap/icheck-bootstrap.min.css') }}">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css'>
<link rel="stylesheet" href="{{asset('css/style.css')}}">
@php $signal=array('A','B','C','D'); @endphp
@yield('css')
@stop

@section('body_class', 'login-page')

@section('body')
<div class="login-box">
    <div class="login-logo">
        <a href="{{ url(config('adminlte.dashboard_url', 'home')) }}">{!! config('adminlte.logo', '<b>Admin</b>LTE') !!}</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Traffic Signal</p>
       
        
        
        <div class="row">
             @foreach($signal as $v)
             <div class="col-xs-3">
                 <p>{{$v}} <input type="text" name="signal_{{$v}}" id="signal_{{$v}}" class="form-control signal" data-id="{{$v}}"/></p>
                  <div class="container" id="{{$v}}">
                    <div class="circle red" color="red"></div>
                    <div class="circle" color="yellow"></div>
                    <div class="circle" color="green"></div>
                  </div>
             </div>
             @endforeach
        </div><br><br>
        <div class="form-group">
            <input type="text" name="count" id="count" class="form-control" placeholder="Countdown"/>
        </div>
        <div class="form-group">
            <input type="text" name="alert_time" id="alert_time" class="form-control" placeholder="Alert Time"/>
        </div>
        <div class="row">
               
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="button" class="btn btn-primary btn-block btn-flat submit">
                        Submit
                    </button>
                </div>
                <!-- /.col -->
        </div>
       
    </div>
    <!-- /.login-box-body -->
</div><!-- /.login-box -->
@stop

@section('adminlte_js')
@yield('js')
<script>
    var seq=[];
    $(document).on('click','.submit',function(){
        var count=$('#count').val()*1000;
        var alt=$('#alert_time').val()*1000;
        var seq=[];
        $('.signal').each(function(){
            if($(this).val()!='') {
            var sid=$(this).attr('data-id');
            seq[$(this).val()]=sid;
        }
        });
        var key=1;
        let activeLight = 2;
        setInterval(() => {
            changeLight(seq[key],activeLight);
         }, count);
//       for(i=1; i<=4; i++){
//           console.log(seq[i]);
//           const circles = $('#'+seq[i]).find('.circle');
//           let activeLight = 2;
//           
//           
//       }
        
    });
  
    function changeLight(div,activeLight) {
        circles = $('#'+div).find('.circle');
  circles[activeLight].className = 'circle';
  activeLight--;
  
  if(activeLight < 1) {
    activeLight = 2;
    key++;
  }
  
  const currentLight = circles[activeLight]
  
  currentLight.classList.add(currentLight.getAttribute('color'));
}
</script>
@stop
