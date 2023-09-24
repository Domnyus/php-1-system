<?php
try {
    if (isset($_POST["textarea"])) {
        $text = htmlspecialchars($_POST["textarea"]);
        $file = fopen("./files/{$_POST["filename"]}.txt", 'w');
        fwrite($file, $text);
        fclose($file);
    }

    if (isset($_FILES["image"])) {
        $dir = "./files/";
        $file = $dir . date("Y_m_d_H_i") ."_" .basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $file);
    }
} catch (Exception $err) {
    echo $err;
}
?>

<!DOCTYPE html>
<html lang=pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Bootstrap/css/bootstrap.css">
    <script src="../Bootstrap/js/bootstrap.js"></script>
    <title>File</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>File upload</h1>
            </div>
            <div class="col-12">
                <form method="post" enctype="multipart/form-data" class="row" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="col-12">
                        <input type="text" name="filename" id="filename" placeholder="Text name file here">
                    </div>
                    <div class="col-12">
                        <textarea name="textarea" id="textarea" cols="30" rows="5" required placeholder="Text here"></textarea>
                    </div>
                    <div class="col-12">
                        <input type="file" name="image" id="image" required>
                    </div>
                    <div class="col-12">
                        <input type="submit" name="submit" value="Enviar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>