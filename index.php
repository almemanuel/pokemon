<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokemon</title>

    <link rel="shortcut icon" href="https://cdn-icons.flaticon.com/png/512/1169/premium/1169608.png?token=exp=1646680846~hmac=85f7e84b6b9e2398cbfe9ee5cf3179c9" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@200;400&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php
        function getPokemon($url){
            $curl = curl_init($url);
            curl_setopt_array($curl, [
                CURLOPT_RETURNTRANSFER => 1,
            ]);
            $res_body = curl_exec($curl);
            $res_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            curl_close($curl);

            if($res_code == 200) {
                $pokemons = json_decode($res_body);
                return $pokemons->pokemon;
            } return ["pokemon" => []];
        }

        function showPokemons($pokemons){
            foreach($pokemons as $pokemon){ ?>
                <div>
                    <img src="<?= $pokemon->img ?>" alt="<?= $pokemon->name ?>" >
                    <h1><?= $pokemon->name ?></h1>
                    <?php foreach($pokemon->type as $type) { ?>
                        <button class="<?= $type ?>"><?= $type ?></button>
                    <?php } ?>
                </div>
            <?php }
        }

        $url = 'https://www.canalti.com.br/api/pokemons.json';
        $pokemons = getPokemon($url);
        showPokemons($pokemons);

    ?>

</body>
</html>