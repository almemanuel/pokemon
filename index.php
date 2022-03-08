<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokemon</title>

    <link rel="shortcut icon" href="https://cdn-icons.flaticon.com/png/512/1169/premium/1169608.png?token=exp=1646680846~hmac=85f7e84b6b9e2398cbfe9ee5cf3179c9" type="image/x-icon">

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

        $url = 'https://www.canalti.com.br/api/pokemons.json';
        $pokemons = getPokemon($url);

    ?>

    <pre>
        <?php print_r($pokemons); ?>
    </pre>
<!-- 
    foreach($pokemons as $pokemon){
        echo $pokemon->id;
        echo $pokemon->num;
        echo $pokemon->name;
        echo $pokemon->img;
        foreach($pokemon->type as $type){
            echo $type;
        }
        echo $pokemon->height;
        echo $pokemon->weight;
        echo $pokemon->candy;
        echo $pokemon->candy_count;
        echo $pokemon->egg;
        echo $pokemon->spawn_chance;
        echo $pokemon->abg_spawns;
        echo $pokemon->spawn_time;
        foreach($pokemon->multipliers as $multipliers) {
            echo $multipliers;
        }
        foreach($pokemon->weaknesses as $weakness) {
            echo $weakness;
        }
        foreach($pokemon->next_evolution as $next_evolution) {
            foreach($next_evolution as $next_evolution) {
                echo $next_evolution->num;
                echo $next_evolution->name;
            }
        }
    } -->

</body>
</html>