<!DOCTYPE html>
<html>
<head>
  <title>Upload your files</title>
</head>
<body>
<?php
if ($_SERVER['REQUEST_URI'] === '/') {
    echo "<a href='/welcome'>welcome</a>"; 
    echo "<br>";
    echo "<a href='/not-found'>not-found</a>";
} elseif ($_SERVER['REQUEST_URI'] === '/welcome') {
    echo "<a href='/'>main</a>";
} else {
    echo "Page not found. <a href='/'>main</a>";
}
?>
</body>
</html>