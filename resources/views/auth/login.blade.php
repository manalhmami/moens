<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        body {
            background-image: url('/storage/cour.jpg');
            background-size: 100% 100%;
            background-repeat: no-repeat;
            position: relative;

        }

        .vertical-center {
            min-height: 100%;
            /* Fallback for browsers do NOT support vh unit */
            min-height: 100vh;
            /* These two lines are counted as one :-)       */
            display: flex;
            align-items: center;
        }
    </style>


</head>

<body>

    <div class="vertical-center">
        <div class="container">
            <div class="row justify-content-center m-3">
                <div class="col-md-4 p-4  bg-transparent rounded">
                    <center>
                        <img src="{{ asset('/storage/ens-logo.png') }}" alt="logo" height="200px">
                    </center>
                    <h1 class="h3 text-center"> SE CONNECTER </h1>

                    <form method="POST" class="mt-3" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group ">
                            <label for="email" class=" col-form-label  text-white text-md-right">Adresse mail :</label>

                            <div class="">
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group  mt-4">
                            <label for="password" class="text-white col-form-label text-md-right">Mot de passe :</label>

                            <div class="">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row mb-0 mt-4">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn bg-primary text-white">
                                    Se connecter
                                </button>

                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</body>

</html>
