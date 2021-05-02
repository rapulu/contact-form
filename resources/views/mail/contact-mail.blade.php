<!DOCTYPE html>
<html lang="en" xmlns="https://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="x-apple-disable-message-reformatting">
    <title></title>

</head>
<body >

    <p>Name: {{ $contactForm->name }}</p>

    <p>Email: {{ $contactForm->email }}</p>

    <p>Message: {{ $contactForm->message }}</p>

    @isset($contactForm->file)
    <p>Document: <a href='{{ asset('/storage/') .'/'. $contactForm->file }}'>Link</a></p>
    @endisset
</body>
</html>
