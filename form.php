<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cenová nabídka</title>
</head>
<body style="background-color: blanchedalmond; color: black; text-align: center">
<h1> Kalkulace cenové nabídky:</h1>

    <form action="index.php"
          method="post"
          style="color: black">
        <table align="center">


        <?php
        foreach ($product->getProductsFromDatabase() as $item){
            echo '<tr>' . "\n";
            echo '<td align="left">' . $item['name'] . '</td>' . "\n";
            echo '<td align="right">' . $item['price'] . '</td>' . "\n";
            echo '<td align="right"><input type="number" oninput="calculate('. $item['id'] .', ' . $item['price'] . ', this.value)" name="quantity[]" min="0"></td>' . "\n";
            echo '<td align="right" class="total" id="sum-' . $item['id'] .'"></td>' . "\n";
            echo '</tr>' . "\n";
            echo '<input type="hidden" name="price[]" value="' . $item['price'] . '">' . "\n";
            echo '<input type="hidden" name="name[]" value="' . $item['name'] . '">' . "\n";
        }

        ?>
        </table>
        <div style="">Celková cena:</div>
        <span id="xy"></span> <span>Kč</span>
            <h4>Pro zaslání cenové nabídky vyplňte email</h4>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="@">

            <br>

        <br>

        <label>
            <input type="checkbox" id="checkbox" name="checkbox">
            Souhlasím se zpracováním osobních údajů
        </label>
        <br>
        <br>
        <input type="submit" value="Odeslat">
    </form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function calculate (id, price, quantity){
        var sum = price * quantity;
        document.getElementById('sum-' + id).innerText = sum;

        var total = 0;
        var collection = document.getElementsByClassName("total");

        for (var i = 0; i < collection.length; i++){
            var number = parseInt(collection[i].innerText);
            if (number) {
                total += number;
            }
        }
        console.log(total);
        document.getElementById("xy").innerHTML = total;

    }
</script>
</body>
</html>