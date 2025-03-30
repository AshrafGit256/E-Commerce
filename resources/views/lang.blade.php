<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Google Translator in laravel</title>
</head>

<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h1>Laravel Google translate</h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2">
                        <strong>Select Language: </strong>
                    </div>
                    <div class="col-md-4">
                        <select class="form-select changeLang">
                            <option value="en" {{ session()->get('locale')=='en' ? 'selected' : '' }}>English</option>
                            <option value="fr" {{ session()->get('locale')=='fr' ? 'selected' : '' }}>French</option>
                            <option value="es" {{ session()->get('locale')=='es' ? 'selected' : '' }}>Spanish</option>
                        </select>
                    </div>
                </div>
                <h3>{{ GoogleTranslate::trans('Welcome to our channel', app()->getLocale()) }}</h3>
                <h3>{{ GoogleTranslate::trans('Hello world', app()->getLocale()) }}</h3>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <script>
        var url = "{{ route('changeLang') }}";
        $('.changeLang').change(function(event){
            window.location.href = url+"?lang="+$(this).val();
        });
    </script>
    
</body>

</html>