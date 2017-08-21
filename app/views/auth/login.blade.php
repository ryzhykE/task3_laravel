
@extends('.index.layout')

@section('content')
    <div class="container">
        <div class="row">
            @if($errors->all())
                <div class="alert alert-danger fade in">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="col-sm-8 blog-main">
                <p> or <a href="{{URL::to('auth/register')}}">Register</a></p>
                <form method="POST" action="{{URL::to('auth/login')}}" class="form-signin">
                    <label class="sr-only">Email address</label>
                    <input type="email" name="email" class="form-control" placeholder="Email address" autofocus>

                    <label class="sr-only">Password"</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" autofocus>
                    <div class="checkbox"></div>

                    <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
                </form>
            </div>
        </div>
    </div>
@endsection






