@extends('root')
@section('content')
    <div class="row">
        <div class="col-lg-7 mx-auto text-white text-center pt-5">
            <h1 class="display-4">Welcome to Point Point!</h1>
            <p class="lead mb-0">Point redemption service is available right now.</p>
            <p class="lead"></i><a href="{{ url('auth/line') }}" class="text-white">
                    <u>Sign in</u></a>
            </p>
        </div>
    </div>
@endsection
