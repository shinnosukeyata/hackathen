<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Hacka-Then</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">


    </head>
    <body>
    @extends('layouts.app')

    @section('content')
    <div class="container">
    <div class="text-center">You can make repository and invite your Hackathon member easily.</div>
    <div class="row">
      <div class="col-md-offset-4 col-md-3">
	<a class="btn btn-primary" href="{{ route('login.github') }}">GitHub login</a>
      </div>
    </div>
    </div>
    @endsection

    </body>
</html>
