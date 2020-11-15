<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Custom -->
    <link rel="stylesheet" href="{{asset('css/customer.css')}}">
    <style>
        .btn-info {
    color: #fff !important;
    background-color: rgb(255, 64, 129) !important;
    border-color: none !important;
    border: none !important;
}
    </style>
</head>
<body class="bg-color">

    <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">Album example</h1>
          <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
          <p>
            <a href="#" class="btn btn-primary my-2">Main call to action</a>
            <a href="#" class="btn btn-secondary my-2">Secondary action</a>
          </p>
        </div>
      </section>

    <div class="container">
        <!-- Content here -->

        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="embed-responsive embed-responsive-16by9">
                    <div id="iframe_content">
                        <iframe id="iframevid" src="https://www.youtube.com/embed/IE9BLZu4RhM" allowfullscreen></iframe>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-12">
                @php
                    $no=0;
                    $nom=0;
                @endphp
                @foreach($lessonss as $lesson)
                @php

                    $no++;
                @endphp
                <div id="accordion">
                    <div class="card">
                    <div class="card-header" id="heading{{$lesson->id}}">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$lesson->id}}" aria-expanded="true" aria-controls="collapseOne">
                            @php
                            echo $no;
                                echo ". ";
                            @endphp {{$lesson->name}}
                        </button>
                    </div>

                    <div id="collapse{{$lesson->id}}" class="collapse" aria-labelledby="heading{{$lesson->id}}" data-parent="#accordion">
                        <div class="card-body">
                            @foreach($lesson->practice as $pract)
                            @php  $nom++;   @endphp
                            <a onclick="showVideo({{$pract->id}})" class="btn btn-info btn-flat btn-xs"><i class="glyphicon glyphicon-edit"></i>{{$nom}}{{". "}} {{$pract->link}}</a>
                            <br/>
                            @endforeach
                        </div>
                    </div>
                    </div>
                </div>

            @endforeach
            </div>

        </div>


    </div>
</body>
<script>
    function showVideo(id) {
        event.preventDefault();
    event.stopImmediatePropagation();
        $.ajax({
            url: "{{ url('pratices') }}" + '/' + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
            var url = 'https://www.youtube.com/embed/zpOULjyy-n8?rel=0';
            $('#iframevid').attr('src', url);
            },
            error : function() {
                alert("Nothing Data");
            }
        });
        }
</script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>
