<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Document</title>
</head>
<body>
    <?php
    function alert($title, $text, $icon,$redirect) { 
        echo '<script>
            Swal.fire({
                title: "' . $title . '",
                text: "' . $text . '",
                icon: "' . $icon . '"
            }).then(function() {
                window.location.href = "' . $redirect . '";
            });
        </script>';
    }
    ?>
</body>
</html>


