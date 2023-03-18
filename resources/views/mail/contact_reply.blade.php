<!DOCTYPE html>
<html lang="en" xmlns="https://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="x-apple-disable-message-reformatting">
</head>
<body>
<div role="article" aria-roledescription="email" lang="en">
    <div>
        <div>Hello {{ $contactReplyMail['name'] }} !</div><br><br>
        <div>You ask a question to BootBox Team</div>
        <div>{{$contactReplyMail['question']}}</div><br><br>
        <div>Reply:</div>
        <div>{{$contactReplyMail['content']}}</div><br><br>
        <div>Thank You for contacting us,</div>
    </div>
</div>
</body>
</html>
