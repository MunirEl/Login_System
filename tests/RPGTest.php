<?php
use PHPUnit\Framework\TestCase;
use App\VictimSelector;
use App\Conection;

final class ConectionTest extends TestCase
{
    public function testconect()
    {
        $usuario = "root";
        $password = "";
        $servidor = "localhost";
        $basededatos = "test";
        $connect= new Conection();
        $conectar= $connect->linking($servidor, $usuario, $password, $basededatos);
        echo $conectar;
        $this->assertSame('connected', $conectar);
        $this->assertTrue(true);
    }

}