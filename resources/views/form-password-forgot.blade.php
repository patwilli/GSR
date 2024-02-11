<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="dist/css/style.css" rel="stylesheet">
    <link href="dist/css/form.css" rel="stylesheet">
    <title>Formulaire </title>
</head>

<body>

    <div class="login">
        <h1 class="text-center">Renseignez votre email</h1>
        @if ($errors->has('login'))
            <div class="alert alert-danger" style="text-align: center;color:rgb(213, 37, 37);font-weight:bold">
                <i>
                    {{ $errors->first('msg') }}
                </i>
            </div>
        @endif
        <form action="{{ route('updatePassword') }}" method="POST">
            @csrf
            <div class="form-group ">
                <input class="form-control" type="email" id="email" name="email" placeholder="email" required>
            </div>
            <input class="btn btn-success w-100" type="submit" value="ENVOYER" name="" id="">
        </form>

    </div>
</body>

</html>
