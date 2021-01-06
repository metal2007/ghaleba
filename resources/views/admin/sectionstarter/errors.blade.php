@if(count($errors) > 0 )
   <div class="alert alert-danger">
     <ul style="list-style: none">
       @foreach($errors->all() as $error)
             <li>{{ $error }}</li>
       @endforeach
     </ul>
   </div>
@endif

 {{-- @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif --}}


@foreach (['danger', 'warning', 'success', 'info'] as $key)
 @if(Session::has($key))
     <p class="alert alert-{{ $key }}">{{ Session::get($key) }}</p>
 @endif
@endforeach

{{-- 
@if(session()->get('success'))
<div class="alert alert-success">
  {{ session()->get('success') }}
</div>
@endif
@if(session()->get('danger'))
<div class="alert alert-danger">
  {{ session()->get('danger') }}
</div>
@endif --}}
