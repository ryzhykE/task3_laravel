
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
                <form method="POST" action="{{URL::to('auth/register')}}" class="form-signin">
                    <input type="text" name="name" class="form-control" placeholder="Name" autofocus>
                    <input type="email" name="email" class="form-control" placeholder="Email address" autofocus>
                    <input type="password" name="password" class="form-control" placeholder="Password" autofocus>
                    <input type="password" name="password_confirmation"  class="form-control" placeholder="Confirm Password:" autofocus>
                    <div class="checkbox"></div>
                    <button class="btn btn-lg btn-primary btn-block"type="submit">Register</button>
                </form>
            </div>
        </div>
    </div>
@endsection
