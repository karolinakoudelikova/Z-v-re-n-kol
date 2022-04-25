<?php

class Emailer
{
    public function sendEmail($email, $name, $price, $quantity) {
        $text = "Dobrý den, zasíláme Vám cenovou nabídku \n\n";
        $total = 0;

        foreach ($quantity as $k => $q){
            if ($q > 0) {
                $sum = $q * $price[$k];
                $text .= $name[$k] . ": " . $q . " ks -> " . $price[$k] . " Kč/ks, celkem: ". $sum . " Kč\n";
                $total += $sum;
            }
        }

        $text .= "\nCelková cena: " . $total . " Kč";
        $text .= "\nV případě zájmu nám napište na email xyz@gmail.com nebo zavolejte na číslo 713245567.";
        $text .= "\nPřejeme vám hezký den, vaše Počítače.cz";
        $result = mail($email,"Cenová nabídka",$text);

        if ($result === true){
            echo "Cenová nabídka byla úspěšně odeslána.";
        }
        else {
            echo "Něco se nepovedlo, zkuste to prosím znovu.";
        }
    }

}