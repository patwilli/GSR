<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="dist/css/style.css" rel="stylesheet">
    <link href="dist/css/form.css" rel="stylesheet">
    <title>SR PADME - Connexion </title>
</head>

<body>

    <div class="image-transparente">
        <h1 class="text-center titre-gras">SR-PADME</h1>
        <div class="login">
            <h1 class="text-center">Connectez-vous</h1>
            @if ($errors->has('login'))
                <div class="alert alert-danger" style="text-align: center;color:rgb(213, 37, 37);font-weight:bold">
                    <i>
                        {{ $errors->first('login') }}
                    </i>
                </div>
            @endif

            <form action="{{ route('connexion') }}" method="POST">
                @csrf
                <div class="form-group ">
                    <input class="form-control" type="text" id="login" name="login" placeholder="login"
                        required>

                </div>

                <div class="form-group ">
                    <input class="form-control" type="password" id="password" name="password"
                        placeholder="mot de passe" required>

                </div>

                <input class="btn btn-success w-100" type="submit" value="Se Connecter" name="" id="">

                <div class="form-group">
                    <a href="{{ route('password-forgot') }}">Mot de passe oublié ?</a>
                </div>



            </form>

        </div>
    </div>

</body>

</html>
