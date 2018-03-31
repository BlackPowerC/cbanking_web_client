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

use GuzzleHttp\Client;
use \GuzzleHttp\Exception\ClientException ;

/**
 * Cette fonction fait une requête GET vers mon API.
 * @param string $uri L'url de base de l'API.
 * @param string $path Le chemin de la ressource.
 * @throws Exception
 * @return array ['status', 'json'], La clé clé json est un json décodé.
 */
function get(string $uri, string $path)
{
    try
    {
        $client = new Client(['base_uri'=>$uri]) ;
        $request = $client->request('GET', $path) ;

        return [
            'status'=>$request->getStatusCode(),
            'json'=>json_decode((string) $request->getBody(), TRUE)
        ] ;
    }
    catch (ClientException $exception)
    {
        throw new Exception($exception->getMessage()) ;
    }
}

/**
 * Cette fonction fait une requête POST vers mon API.
 * @param string $uri L'url de base de l'API.
 * @param string $path Le chemin de la ressource.
 * @param array $body Le corps de la requête
 * @throws Exception
 * @return array ['status', 'json'], La clé clé json est un json décodé.
 */
function post(string $uri, string $path, array $body)
{
    try
    {
        $client = new Client(['base_uri'=>$uri]) ;
        $request = $client->request('POST', $path, ['json'=>$body]) ;

        return [
            'status'=>$request->getStatusCode(),
            'json'=>json_decode((string) $request->getBody(), TRUE)
        ] ;
    }
    catch (ClientException $exception)
    {
        throw new Exception($exception->getMessage()) ;
    }
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