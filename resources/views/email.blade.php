<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>

    <link href="{{ asset('build/assets/app-zfdx4vdl.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('clean') }}" method="POST">
                            @csrf
                            <div class="d-flex flex-column">
                                <div class="mb-3">
                                    <label>Classified words / phrases.</label>
                                    <input name="classified" class="form-control">
                                    <div class="form-text">Separate with comma for mutiple words.</div>
                                </div>
                                <div class="mb-3">
                                    <label>E-mail Body</label>
                                    <textarea name="email" class="form-control"></textarea>
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-primary">Submit</button>
                                </div>
                                <div class="mb-3">
                                    <h3>Result</h3>
                                    @if (is_bool($hasClassifiedWords))
                                        @if ($hasClassifiedWords)
                                            Has classified words. <i class="bi bi-x-circle-fill text-danger"></i>
                                        @else
                                            Has no classified words. <i
                                                class="bi bi-check-circle-fill text-success"></i>
                                        @endif
                                    @endif
                                    <p>{{ $cleanedEmail }}</p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

</html>
