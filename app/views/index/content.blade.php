<div class="container">


    @if (Auth::check())
        <a href="{{URL::to('auth/logout')}}">Logout</a>
    @endif
    <form method="POST" action="{{URL::to('/make-url')}}" class="form-signin">
        <h2 class="form-signin-heading">Put URL:</h2>
        <label class="sr-only">put url</label>
        <input type="text" name="url" class="form-control" placeholder="Put URL" required autofocus>
        <div class="checkbox"></div>
        <button class="btn btn-lg btn-primary btn-block" type="submit"> Make URL </button>
        @if ($errors->first('url'))
            <div class="alert alert-danger" role="alert">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <span class="sr-only">Error:</span>
                {{ $errors->first('url') }}
            </div>
        @endif
    </form>
</div> <!-- /container -->




