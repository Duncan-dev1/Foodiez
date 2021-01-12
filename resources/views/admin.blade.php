@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif


                    {{ __('You are logged in!') }}


                </div>

            </div>
        </div>
    </div>
    <div class="container">
        {{--     <div class="row"> @foreach($fooditems as $fooditems)
            <div class="col-6">

                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$fooditems->food_name}}</h5>
        <p class="card-text">{{$fooditems->description}}
        </p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
</div>

</div> @endforeach
</div> --}}
<div class="row"> @foreach($users as $user)
    <div class="col-6">

        <ul>
            <li>{{$user->name}}</li>

        </ul>

    </div> @endforeach
</div>

</div>


</div>
@endsection