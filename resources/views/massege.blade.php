@if (session('status'))
    <div class="mb-4 alert alert-success font-medium text-sm text-green-600">
        {{ session('status') }}
    </div>
@endif


@if ($errors->any())
    <div class="pl-1 alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif