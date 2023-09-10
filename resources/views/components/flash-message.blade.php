@if ($message = Session::get('success'))
<div class="alert alert-success alert-block position-fixed" style="z-index: 999; left: 50%; transform: translateX(-50%)"
    x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show">
    <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block position-fixed" style="z-index: 999; left: 50%; transform: translateX(-50%)"
    x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show">
    <div>
        <strong>{{$message}}</strong>
    </div>
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger alert-block position-fixed" style="z-index: 999; left: 50% ; transform: translateX(-50%)"
    x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show">
    <ul>
        @foreach ($errors->all() as $error)
        <li>
            <strong>{{ $error }}</strong>
        </li>
        @endforeach
    </ul>
</div>
@endif