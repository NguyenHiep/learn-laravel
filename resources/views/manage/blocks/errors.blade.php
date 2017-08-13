@if (count($errors) > 0)
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            <button class="close" data-close="alert"></button>
            <span> {{ $error }} </span>
        </div>
    @endforeach
@endif
