<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Test para el controlador HelloController, la ruta /hello/{name}
 */
class HelloTest extends WebTestCase
{
    /**
     * Prueba si el mensaje predefinido que envía el controlador es correcto
     */
    public function testHelloDefault(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/hello');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('body', 'Hello World');
    }

    /**
     * Prueba si el mensaje devuelto cuando se envía el parámetro es el correcto
     */
    public function testHelloCustom(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/hello/Magdiel');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('body', 'Hello Magdiel');
    }
}
