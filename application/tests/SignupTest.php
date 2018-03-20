<?php
/**
 * Created by PhpStorm.
 * User: jordy
 * Date: 18/03/18
 * Time: 21:36
 */

defined('BASEPATH') OR exit('No direct script access allowed');
defined('VENDOR') OR exit('No direct script access allowed');

/**
 * Class SignupTest
 * Cette classe effectue le test de la classe Signup.
 */
class SignupTest extends TestCase
{
    private $signup ;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->signup = new Signup() ;
    }

    /**
     * @test
     */
    public function passwordLessThanSixChars()
    {
        $this->assertFalse($this->signup->check_password("jor"), "passwordLessThanSixChars") ;
    }
}