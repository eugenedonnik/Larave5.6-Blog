<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Scripts -->
{{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div id="app">
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#themeModal">Create New Theme</button>
                <button type="button" class="btn btn-primary">Logout</button>
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
                    <form id="themeForm">
                        @csrf
                        <div class="form-group">
                            <label for="themename">Name</label>
                            <input type="text" class="form-control" id="themename"/>
                        </div>
                        <div class="form-group">
                            <label for="themetext">Description</label>
                            <textarea class="form-control h-25" rows="10" id="validationTextarea" placeholder="Theme Description" id="themetext"></textarea>
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

{{--    @foreach($themes as $theme)--}}
{{--        <div>--}}
{{--            --}}{{--        <p>{{$theme->name}}</p>--}}
{{--            <blog-component loggedin="true" title="{{$theme->name}}" body="{{$theme->body}}"></blog-component>--}}
{{--            <br>--}}
{{--        </div>--}}
{{--    @endforeach--}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <p><b>title</b></p>
                        <div>
                            <button>Delete</button>
                            <button>Edit</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <p> body </p>
                        <div>
                            <button>Add Comment</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--    <br>--}}
{{--    <blog-component loggedin="true" title="My theme number 1" body="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aspernatur atque consequatur dicta ea eaque est ex fugiat, iure modi non officia perferendis placeat quas quibusdam repudiandae rerum veniam voluptatem!"></blog-component>--}}
{{--    <comment-component loggedin="true" style="padding-left: 3%" body="My First comment"></comment-component>--}}
{{--    <comment-component loggedin="true" style="padding-left: 6%" body="My second comment"></comment-component>--}}
</div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

<script>
    $("#themeForm").submit(function(e){
        e.preventDefault();
        let themename = $("#themename").val();
        let themetext = $("#themetext").val();
        let _token =$("input[name=_token]").val();
        alert('I Am HERE' + themename);

        $.ajax({
            url: "{{route('theme.add')}}",
            type: "POST",
            data:{
                themename:themename,
                themetext:themetext,
                _token:_token
            },
            success:function(response){
                if (response){
                    // $("#studentTable tbody").prepend('<tr>' +
                    //     '<td>'+response.firstname+'</td>' +
                    //     '<td>'+response.lastname+'</td>' +
                    //     '<td>'+response.email+'</td>' +
                    //     '<td>'+response.phone+'</td>' +
                    //     '<td> ' +
                    //     '<a class="btn btn-info" href="javascript:void(0)" onclick="editStudent('+response.id+')">Edit</a>' +
                    //     '<a class="btn btn-danger" href="javascript:void(0)" onclick="deleteStudent('+response.id+')">Delete</a>' +
                    //     '</td>'+
                    //     '</tr>');
                    $("#themeForm")[0].reset();
                    $("#themeModal").modal('hide');

                }
            }
        });
    });
</script>

</body>
</html>
