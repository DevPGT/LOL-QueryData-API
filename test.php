<?php 
	$api_key = "RGAPI-02d841ce-7f3c-44e9-9bd0-12f28b982f2b";
	$sum_id = "20971688";
	$country_code = "br1";
        $url_mastery = 'https://'.$country_code.'.api.riotgames.com/lol/champion-mastery/v3/champion-masteries/by-summoner/'. $sum_id .'?api_key='. $api_key;
        $url_m_encoded = file_get_contents($url_mastery);
        $json_m = json_decode($url_m_encoded);
        $all_champs = count($json_m); 
        $count = 0;
        echo "<b><br><h3>Champion Mastery</b></h3><br>";
        $champs_url = 'https://'.$country_code.'.api.riotgames.com/lol/static-data/v3/champions?locale=pt_BR&tags=info&dataById=true&api_key='.$api_key;
        $champ_name = file_get_contents($champs_url);
        $champ = json_decode($champ_name);
        while($count != $all_champs){
        $champ_now = $champ->{'data'}->{$count}->{'championId'};
            if($json_m[$count]->{'chestGranted'} == 1){
                $chest_return = 'Já Adquirido';
            }else{$chest_return = "Não Adquirido";}
            echo "
            <br>Champion ID: <b>" . $json_m[$count]->{'championId'}." </b>NOME<b alt='teste'> ".$champ_now.
            "</b> Pontuaçao:<b alt='123 x 3'>". $json_m[$count]->{'championPoints'}.
            "</b> Level:<b>". $json_m[$count]->{'championLevel'}.
            "</b> Chest:<b>". $chest_return;   
            $count++; 
        }
?>