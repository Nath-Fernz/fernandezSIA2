<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<form action="/register" method="POST">
        @csrf
        
        <label for="fullname">First Name:</label><br>
        <input name="fullname" type="text" placeholder="AYAW KOL" required>

        <button type="submit">Register</button> 
    </form>
</body>
</html>