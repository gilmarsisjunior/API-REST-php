<?php
require_once('../vendor/autoload.php');

//retorna a url
if ($_GET['url']) {
    $url = $_GET['url'];
    $url = explode('/', $url);

    //testa se o usuário está buscando um serviço de api
    if ($url[0] === 'api') {
        array_shift($url);

        //prepara pra instanciar a classe UserService
        $services = 'App\Services\\' . ucfirst($url[0] . 'Service');
        $method = strtolower($_SERVER['REQUEST_METHOD']);   
        
        //corta a posição da uri para chegar no id do usuário
        array_shift($url);

        try {

            $response =  call_user_func_array(array(new $services, $method), $url);
            //Chama os métodos passando o parâmetro "$url" que no caso agora é o id od usuário

            echo '<pre>';
            print_r($response);
            echo '<pre/>';

            } 
            catch (\Exception $e) {
                echo  $json = json_encode(array(
                    'status' => 'falha',
                    'data'  => $e->getMessage()
                    ), JSON_UNESCAPED_UNICODE);
            }
            }
} else {
    echo 'url inválida';
}


