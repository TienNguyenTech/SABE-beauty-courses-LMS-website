<!DOCTYPE html>
<html>
<head>
    <title>404 - Page Not Found</title>
    <style>
        body { text-align: center; font-family: Arial, sans-serif; }
        h1 { font-size: 48px; margin-top: 20px; }
        p { font-size: 18px; }
        a { color: #007bff; text-decoration: none; }
    </style>
</head>
<body>
    <h1>404</h1>
    <p>The page you are looking for could not be found.</p>
    <a href="<?= $this->Url->build('/') ?>">Go to Homepage</a>
</body>
</html>
