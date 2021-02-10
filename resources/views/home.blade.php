@extends('layouts.app')

@section('content')
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-12">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">My First Blog</div>--}}

{{--                <div class="card-body">--}}
{{--                    @if (session('status'))--}}
{{--                        <div class="alert alert-success" role="alert">--}}
{{--                            {{ session('status') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}

{{--                    This is my first blog. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam consequuntur dolores facere fugit illo impedit maiores molestiae nemo, placeat voluptate.--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#themeModal">Create New Theme</button>
{{--            <a href="#" class="btn btn-success" data-toggle="modal" data-target="#themeModal">Create New Theme</a>--}}
        </div>
    </div>
</div>

<!-- New Theme Modal -->
<div class="modal fade" id="themeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New Theme</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="themeForm" method="POST" action="{{route('home.themeadd')}}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name"/>
                    </div>
                    <div class="form-group">
                        <label for="body">Description</label>
                        <textarea class="form-control h-25" rows="10"  placeholder="Theme Description" name="body"></textarea>
                        <div class="invalid-feedback">
                            Please enter a message in the textarea.
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Ok</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>
<br>
<br>

@foreach($themes as $theme)
    <div>
        <blog-component loggedin="true" id="{{$theme->id}}" title="{{$theme->name}}" body="{{$theme->body}}"></blog-component>
        <br>
    </div>
@endforeach
{{--<listblog-component></listblog-component>--}}

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            {{$themes->links()}}
        </div>
    </div>
</div>

{{--<br>--}}
{{--<blog-component loggedin="true" title="My theme number 1" body="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aspernatur atque consequatur dicta ea eaque est ex fugiat, iure modi non officia perferendis placeat quas quibusdam repudiandae rerum veniam voluptatem!"></blog-component>--}}
{{--<comment-component loggedin="true" style="padding-left: 3%" body="My First comment"></comment-component>--}}
{{--<comment-component loggedin="true" style="padding-left: 6%" body="My second comment"></comment-component>--}}
{{--<br>--}}
{{--<blog-component loggedin="true" title="My second blog" body="Hello to my second blog"></blog-component>--}}
{{--<comment-component loggedin="true" style="padding-left: 3%" body="First Comment"></comment-component>--}}
{{--<comment-component loggedin="true" style="padding-left: 6%" body="Second comment"></comment-component>--}}
{{--<comment-component loggedin="true" style="padding-left: 6%" body="Third comment"></comment-component>--}}

@endsection


