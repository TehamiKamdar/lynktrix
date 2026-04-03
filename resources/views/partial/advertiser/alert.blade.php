@if($errors->any())

    <div class="text-capitalize alert alert-danger alert-dismissible fade show" role="alert">
        <div class="alert-content">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close text-capitalize" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">close now</span>
            </button>
        </div>
    </div>

@elseif(Session::has('success'))

    <div class="text-capitalize alert alert-success alert-dismissible fade show" role="alert">
        <div class="alert-content">
            <p>{{ Session::get('success') }}</p>
            <button type="button" class="close text-capitalize" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">close now</span>
            </button>
        </div>
    </div>

    @php
        Session::forget('success');
    @endphp

@elseif(Session::has('error'))

    <div class="text-capitalize alert alert-danger alert-dismissible fade show" role="alert">
        <div class="alert-content">
            <p>{{ Session::get('error') }}</p>
            <button type="button" class="close text-capitalize" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">close now</span>
            </button>
        </div>
    </div>

    @php
        Session::forget('error');
    @endphp

@endif
