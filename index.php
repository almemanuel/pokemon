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
        function responseCode($url){
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_HEADER, true);    // we want headers
            curl_setopt($ch, CURLOPT_NOBODY, true);    // we don't need body
            $output = curl_exec($ch);
            $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
            return $httpcode;
        }

        function getPokemon($url){
            if(responseCode($url) == 200) {
                return json_decode(file_get_contents($url));
            } return ["!200" => "ERROR"];
        }

        $url = 'https://www.canalti.com.br/api/pokemons.json';
        $pokemons = getPokemon($url);

    ?>

    <pre>
        <?php print_r($pokemons); ?>
    </pre>

</body>
</html>