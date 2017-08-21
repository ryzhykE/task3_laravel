@extends('.index.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8 blog-main">
                <h2>Short Link: <a href="{{$link}}">{{$link}}</a></h2>
            </div>
        </div>
    </div>
@endsection
