<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perhitungan NPV</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Kalkulator NPV</h1>
        <form action="table.php" method="post" class="mt-4">
            <div class="form-group">
                <label for="invest">Investasi awal :</label>
                <input type="number" class="form-control" name="invest" id="invest" placeholder="Rp.10000000" value="100000000">
            </div>
            <div class="form-group">
                <label for="rate">Keuntungan per tahun :</label>
                <input type="number" class="form-control" name="rate" id="rate" placeholder="Rp.10000000" value="30000000">
            </div>
            <div class="form-group">
                <label for="year">Jangka waktu :</label>
                <input type="number" class="form-control" name="year" id="year" placeholder="tahun" value="5">
            </div>
            <div class="form-group">
                <label for="discount">Discount Rate :</label>
                <div>
                    <input type="number" class="form-control" name="discount" id="discount" placeholder="__%" value="10">
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="hitung">Hitung</button>
        </form>
    </div>
</body>

</html>