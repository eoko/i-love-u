<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <script src="http://code.jquery.com/jquery-1.9.0rc1.js"></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .btn-circle {
                width: 30px;
                height: 30px;
                text-align: center;
                padding: 6px 0;
                font-size: 12px;
                line-height: 1.42;
                border-radius: 15px;
            }

            .badge {
                position: relative;
                top: -8px;
                left: -12px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    bouh !
                </div>

                <div class="links">
                    <button id="love-button" class="btn btn-circle">
                        <span class="glyphicon glyphicon-heart"></span>
                    </button>
                    <span id="love-count" class="badge"></span>
                </div>
            </div>
        </div>
        <script type="application/javascript">
            $().ready(function() {

                peopleLoveCount();
                meLoveCount();
                setInterval('peopleLoveCount();',5000);

                $('#love-button').click( loveClick );
            });

            function peopleLoveCount(){
                $.ajax({
                    method: "GET",
                    url: "/api/loves?metaonly=true",
                    statusCode: {
                        200: function (data) {
                            if (data['count']) {
                                $('#love-count').html(data['count']);
                            }
                        }
                    }
                });
            }

            function loveClick(){
                $.ajax({
                    method: "POST",
                    url: "/api/loves",
                    statusCode: {
                        200: function (data) {
                            $('#love-button').removeClass('btn-primary');
                            $('#love-button').addClass('btn-danger');
                        },
                        412: function (jqXHR, textStatus) {
                           alert('Already exist.')
                        }
                    }
                });
            }

            function meLoveCount(){
                $.ajax({
                    method: "GET",
                    url: "/api/me/i-am-in-love",
                    statusCode: {
                        200: function () {
                            $('#love-button').addClass('btn-danger');
                        },
                        404: function () {
                            $('#love-button').addClass('btn-primary');
                        }
                    }
                });
            }
        </script>
    </body>
</html>
