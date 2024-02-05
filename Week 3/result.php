<!DOCTYPE>
<html>
    <head>
        <meta charset="utf-8">
        <title>Excel to HTML</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <style>
        *{
            padding: 0;
            margin: 0;
        }
        div{
            display: inline-block;
            position: relative;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border: 2px solid black;
            padding: 1rem;
        }
        p{
    
        }
    </style>
    </head>
    <body>
        <div action="result.php" method="POST">
            <h1 class="text-center mb-3">Submitted Entry</h1>
            <section class="row">
                <p class="col-6">Your Name (optional):</p>
                <p class="col-6"><?= $_POST['name'] ?></p>
                <p class="col-6">Courses Title:</p>
                <p class="col-6"><?= $_POST['course'] ?></p>
                <p class="col-6">Given Score (1-10):</p>
                <p class="col-6"><?= $_POST['score'] ?></p>
                <p class="col-6">Reason</p>
                <p class="col-12"><?= $_POST['reason'] ?></p>
            </section>
            <a href="info.php">Return</a>
        </div>
    </body>
</html>