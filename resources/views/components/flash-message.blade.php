@if ($message = Session::get('success'))
<div class="alert alert-success alert-block" x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)"
    x-show="show">
    <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block" x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)"
    x-show="show">
    <div>
        <strong>{{$message}}</strong>
    </div>
</div>
@endif

@if ($errors->any())

@foreach ($errors->all() as $error)
<div class="alert alert-danger alert-block" x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)"
    x-show="show">
    <strong>{{ $error }}</strong>
</div>
@endforeach

@endif