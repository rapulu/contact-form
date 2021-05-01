<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <style>
            /* Style inputs with type="text", select elements and textareas */
            input[type=text], select, textarea {
            width: 100%; /* Full width */
            padding: 12px; /* Some padding */
            border: 1px solid #ccc; /* Gray border */
            border-radius: 4px; /* Rounded borders */
            box-sizing: border-box; /* Make sure that padding and width stays in place */
            margin-top: 6px; /* Add a top margin */
            margin-bottom: 16px; /* Bottom margin */
            resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
            }

            /* Style the submit button with a specific background color etc */
            input[type=submit] {
            background-color: #04AA6D;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            }

            /* When moving the mouse over the submit button, add a darker green color */
            input[type=submit]:hover {
            background-color: #45a049;
            }

            /* Add a background color and some padding around the form */
            .container {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
            }
        </style>
    </head>
    <body class="antialiased">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="container">
            <form action="{{ route('send.form') }}" method="post" enctype="multipart/form-data">
              @csrf
              <label for="name">First Name</label>
              <input type="text" id="name" name="name" placeholder="Your name..">

              <label for="email">Email</label>
              <input type="text" id="email" name="email" placeholder="Your email">

              <label for="message">Message</label>
              <textarea id="message" name="message" placeholder="Write something.." style="height:200px"></textarea>

              <label for="File">File</label>
              <input type="file" id="file" name="file">
              <br/><br/>
              <input type="submit" value="Submit">
            </form>
          </div>
    </body>
</html>
