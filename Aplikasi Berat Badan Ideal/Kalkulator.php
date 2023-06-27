<?php
function calculateIdealWeight($height, $gender)
{
    if ($gender == 'male') {
        $idealWeight = (float)$height - 100;
    } elseif ($gender == 'female') {
        $idealWeight = (float)$height - 110;
    } else {
        return "Invalid gender.";
    }

    return $idealWeight;
}

function calculateCategory($actualWeight, $idealWeight)
{
    if ($actualWeight > $idealWeight + 10) {
        return "Obesitas";
    } elseif ($actualWeight < $idealWeight - 10) {
        return "Stunting";
    } else {
        return "Normal";
    }
}

if (isset($_POST['submit'])) {
    $height = $_POST['height'];
    $gender = $_POST['gender'];
    $actualWeight = $_POST['actualWeight'];

    $idealWeight = calculateIdealWeight($height, $gender);
    $category = calculateCategory($actualWeight, $idealWeight);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator Berat Badan Ideal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            background-image: url('Background.jpg');
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffb3b3;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            background-color:#;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="radio"] {
            margin-right: 5px;
        }
Kalkulator Berat Badan Ideal

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color:#604020;
            border: none;
            color:  #fff;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color:#cc0000;
        }

        .result {
            margin-top: 20px;
            padding: 10px;
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .category {
            font-weight: bold;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Kalkulator Berat Badan Ideal</h2>
        <form method="POST" action="">
            <label for="height">Tinggi Badan (cm):</label>
            <input type="text" id="height" name="height" required><br><br>

            <label>Jenis Kelamin:</label>
            <input type="radio" id="male" name="gender" value="male" required>
            <label for="male">Laki-laki</label>
            <input type="radio" id="female" name="gender" value="female" required>
            <label for="female">Perempuan</label><br><br>

            <label for="actualWeight">Berat Badan Sekarang (kg):</label>
            <input type="text" id="actualWeight" name="actualWeight" required><br><br>

            <input type="submit" name="submit" value="Hitung">
        </form>

        <?php if (isset($idealWeight) && isset($category)) : ?>
            <div class="result">
                <div>Berat badan ideal Anda adalah: <?php echo $idealWeight; ?> kg</div>
                <div class="category">Kategori: <?php echo $category; ?></div>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>