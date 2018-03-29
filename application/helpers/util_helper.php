<?php
/**
 * Created by PhpStorm.
 * User: jordy
 * Date: 27/03/18
 * Time: 21:46
 */

defined('BASEPATH') OR exit('No direct script access allowed');
defined('VENDOR') OR exit('No direct script access allowed');

require_once VENDOR."autoload.php" ;

use Guzzle\Http\Client ;
use Guzzle\Http\Exception\RequestException ;

/**
 * Cette fonction récupère depuis cbankin_rest_api à une URL, des données.
 * @param array $params Un tableau de paramettre à deux clé, url et token.
 * @param string $method La méthode HTTP à utiliser.
 * @return array|bool|float|int|null|string
 */
function getDataFromAPI(string $method='GET',array $params = ['url'=>'localhost:8181', 'token'=>'23321425024549421161211921618911418213413092729622315176208194194234106118104173101211616736141415951461566075101219662762140166180182112771166623369121591147657224'])
{
    $request = null ;
    $response = null ;
    try
    {
        $client = new Client() ;
        $token['token'] = (array_key_exists('token', $params)) ? json_encode($params['token']):null ;
        $request = $client->createRequest($method, $params['url'], [], $token) ;
        $response = $request->send() ;
        return $response->json() ;
    }
    catch(RequestException $re)
    {
        echo $re->getMessage().'<br/>' ;
    }
    return null ;
}

/**
 * Cette fonction vérifie si un nom contient des caractères illégaux.
 * @param string $name
 * @return bool
 */
function check_name(string $name): bool
{
    return preg_match("/^[a-zA-Z]+$/", $name) ;
}

/**
 * Cette fonction vérifie la robustesse des mot de passe.
 * Mot de passe de six caractères alphanumériques minimum
 * @param string $password
 * @return bool.
 */
function check_password(string $password): bool
{
    $num = 0;
    $char = 0;
    if(strlen($password) < 6)
    {
        return FALSE;
    }
    $char_array = str_split($password) ;
    foreach ($char_array as $char)
    {
        if(is_int((int)$char))
        {
            $num += 1 ;
        }
        else
        {
            $char += 1 ;
        }
    }
    return ($num > 0 && $char > 0) ;
}