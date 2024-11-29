<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator PHP</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    
    <div id="container">
    <h1>Kalkulator PHP (Basic X,X)</h1>


    <section>
    <h2>Aritmatika</h2>

    <form method="POST" action="index.php" id="Aritmatika">
        <fieldset>
        <legend>Penjumlahan</legend>
        <input type="hidden" name="form_name" value="Penjumlahan">
        <input type="number" name="bilangan1" placeholder="X1" required>
        <input type="number" name="bilangan2" placeholder="X2" required>
        <input type="submit" value="Hitung">
        </fieldset>
    </form>

    <?php

    include_once "KalkulatorAritmatika/Operation.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $a = $_POST['bilangan1'];
        $b = $_POST['bilangan2'];  
        
        $formName = $_POST['form_name'];

        if ($formName == 'Penjumlahan'){
            $result = new a\Operation($a, $b);
            echo $result->addition();
        }        
    }
    ?>

    <form method="POST" action="index.php" id="Aritmatika">
        <fieldset>
        <legend>Pengurangan</legend>
        <input type="hidden" name="form_name" value="Pengurangan">
        <input type="number" name="bilangan1" placeholder="X1" required>
        <input type="number" name="bilangan2" placeholder="X2" required>
        <input type="submit" value="Hitung">
        </fieldset>
    </form>

    <?php

    include_once "KalkulatorAritmatika/Operation.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $a = $_POST['bilangan1'];
        $b = $_POST['bilangan2'];  
        
        $formName = $_POST['form_name'];

        if ($formName == 'Pengurangan'){
            $result = new a\Operation($a, $b);
            echo $result->subtraction();
        }        
    }
    ?>


    <form method="POST" action="index.php" id="Aritmatika">
        <fieldset>
        <legend>Pembagian</legend>
        <input type="hidden" name="form_name" value="Pembagian">
        <input type="number" name="bilangan1" placeholder="X1" required>
        <input type="number" name="bilangan2" placeholder="X2" required>
        <input type="submit" value="Hitung">
        </fieldset>
    </form>

    <?php

    include_once "KalkulatorAritmatika/Operation.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $a = $_POST['bilangan1'];
        $b = $_POST['bilangan2'];  
        
        $formName = $_POST['form_name'];

        if ($formName == 'Pembagian'){
            $result = new a\Operation($a, $b);
            echo $result->division();
        }        
    }
    ?>

    <form method="POST" action="index.php" id="Aritmatika">
        <fieldset>  
        <legend>Perkalian</legend>
        <input type="hidden" name="form_name" value="Perkalian">
        <input type="number" name="bilangan1" placeholder="X1" required>
        <input type="number" name="bilangan2" placeholder="X2" required>
        <input type="submit" value="Hitung">
        </fieldset>  
    </form>

    <?php

    include_once "KalkulatorAritmatika/Operation.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $a = $_POST['bilangan1'];
        $b = $_POST['bilangan2'];  
        
        $formName = $_POST['form_name'];

        if ($formName == 'Perkalian'){
            $result = new a\Operation($a, $b);
            echo $result->multiplication();
        }        
    }
    ?>

    </section>



    <section>
    <h2>Operasi Lanjutan</h2>

    <form method="POST" action="index.php" id="Operasi lanjutan">
        <fieldset>
        <legend>Modulus</legend>
        <input type="hidden" name="form_name" value="Modulus">
        <input type="number" name="bilangan1" placeholder="X1" required>
        <input type="number" name="bilangan2" placeholder="X2" required>
        <input type="submit" value="Hitung">
        </fieldset>
    </form>

    <?php

    include_once "KalkulatorLanjutan/Operation.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $a = $_POST['bilangan1'];
        $b = $_POST['bilangan2'];  
        
        $formName = $_POST['form_name'];

        if ($formName == 'Modulus'){
            $result = new b\Operation($a, $b);
            echo $result->modulus();
        }        
    }
    ?>


    <form method="POST" action="index.php" id="Operasi lanjutan">
        <fieldset>  
        <legend>Eksponen</legend>
        <input type="hidden" name="form_name" value="Kuadrat">
        <input type="number" name="bilangan1" placeholder="X" required>
        <input type="number" name="bilangan2" placeholder="Pangkat" required>
        <input type="submit" value="Hitung">
        </fieldset>  
    </form>

    <?php

    include_once "KalkulatorLanjutan/Operation.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $a = $_POST['bilangan1'];
        $b = $_POST['bilangan2'];  
        
        $formName = $_POST['form_name'];

        if ($formName == 'Kuadrat'){
            $result = new b\Operation($a, $b);
            echo $result->pow();
        }        
    }
    ?>

    </section>
    </div>

    
</body>
</html>
