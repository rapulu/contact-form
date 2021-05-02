<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Contact form</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    </head>
    <body class="antialiased">
        <section style="padding-top:60px">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <div class="card">
                            <div class="card-header">
                                Contact me
                            </div>
                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                @if (session('chill'))
                                    <div class="alert alert-warning" role="alert">
                                        {{ session('chill') }}
                                    </div>
                                @endif
                                <form action="{{ route('send.form') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name">First Name</label>
                                        <input type="text" name="name" placeholder="Your name.." class="form-control" value="{{ @old('name') }}">
                                        @if ($errors->has('name'))
                                            <div style="color: red">{{ $errors->first('name') }}</div>
                                        @endif
                                    </div>

                                    <div class="mb-3">
                                        <label for="email">Email</label>
                                        <input type="text" name="email" placeholder="Your email" class="form-control" value="{{ @old('email') }}">
                                        @if ($errors->has('email'))
                                            <div style="color: red">{{ $errors->first('email') }}</div>
                                        @endif
                                    </div>

                                    <div class="mb-3">
                                        <label for="message">Message</label>
                                        <textarea name="message" placeholder="Write something.." class="form-control">{{ @old('message') }}</textarea>
                                        @if ($errors->has('message'))
                                            <div style="color: red">{{ $errors->first('message') }}</div>
                                        @endif
                                    </div>

                                    <div class="mb-3">
                                        <label for="File">File</label>
                                        <input type="file" name="file" class="form-control">
                                        @if ($errors->has('file'))
                                            <div style="color: red">{{ $errors->first('file') }}</div>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
        </section>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    </body>
</html>
