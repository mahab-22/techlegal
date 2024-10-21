<?php

function print_notifications($array) :void
{
    echo "<pre>";
    echo 'Результат выполнения метода :'.PHP_EOL;
    echo '*****************************************************'. '<br>';
    echo 'Время регистрации: ' . $array['regDate'] . '<br>';
    echo 'Номер уведомления о возникновении залога: ' . $array['id'].'<br>';
    echo 'Имущество: ' . $array['properties'][0]['vehicleProperty']['vin'] . '<br>';
    echo 'Залогодержатель: ' . $array['pledgees'][0]['organization']['name'] . '<br>';
    echo 'Залогодатель: ' . $array['pledgors'][0]['privatePerson']['name'] . '<br>';
    echo 'День рождения: ' . $array['pledgors'][0]['privatePerson']['birthday'] . '<br>';
    echo '====================================================='. '<br>';
}
