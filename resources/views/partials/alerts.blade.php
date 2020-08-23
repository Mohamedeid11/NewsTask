
{{--allert of success--}}
@if(session('success'))
    <div class="alert alert-success mt-2">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{session('success')}}
    </div>
@endif

{{--allert of warrning--}}
@if(session('warning'))
    <div class="alert alert-warning mt-2">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{session('warning')}}
    </div>
@endif


{{--allert of error--}}
@if(session('error'))
    <div class="alert alert-danger mt-2">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{session('error')}}
    </div>
@endif
