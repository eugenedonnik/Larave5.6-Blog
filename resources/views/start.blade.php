@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-4">
        <h2 class="border-bottom text-center">Standart Vue+Laravel</h2>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="btn-toolbar justify-content-center" role="toolbar" aria-label="Toolbar with button groups">
        </div>
    </div>
</div>
<prop-component v-bind:urldata="{{json_encode($url_data)}}"></prop-component>
<hr>
<ajax-component></ajax-component>

{{--<script type="text/javascript">--}}
{{--    @{{$url_data}}--}}
{{--</script>--}}

@endsection
