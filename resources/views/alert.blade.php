@if (session()->has('success'))
    <div class="container">
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    </div>
@endif
@if (session()->has('error'))
    </div>
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
    </div>
@endif