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
    public function setUp()
    {
        $this->signup = new Signup() ;
    }

    public function test_passwordLessThanSixChars()
    {
        $this->assertFalse($this->signup->check_password("jor"), "passwordLessThanSixChars") ;
    }

    public function test_passwordMoreThanSixChars()
    {
        $this->assertFalse($this->signup->check_password("i*am*a*legend"), "passwordMoreThanSixChars") ;
    }

    public function test_passwordMoreThanSixCharsWithLettersAndNumbers()
    {
        $this->assertTrue($this->signup->check_password("azerty1234"), "passwordMoreThanSixCharsWithLettersAndNumbers") ;
    }

    public function test_emptyName()
    {
        $this->assertFalse($this->signup->check_name(""), "emptyName");
    }

    public function test_nameWithNumber()
    {
        $this->assertFalse($this->signup->check_name("jordy1234"), "nameWithNumber") ;
    }

    public function test_nameEqualJordy()
    {
        $this->assertTrue($this->signup->check_name("jordy"), "nameEqualJordy") ;
    }
}