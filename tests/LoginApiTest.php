<?php
namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class LoginApiTest extends WebTestCase
{
    public function testLoginCheck()
    {
        $client = static::createClient();

        $username = 'contact2@moimeme.fr';
        $password = 'nono2';

        $payload = [
            'username' => $username,
            'password' => $password,
        ];

        $client->request('POST', '/login_check', [], [], ['CONTENT_TYPE' => 'application/json'], json_encode($payload));

        $response = $client->getResponse();

        // Vérifiez le code de réponse HTTP
      	// assetSame permets de vérfier que le type et la valeur des 2 valeurs passées sont identiques
      	// ici que 200 == code HTTP de la réponse du point d'API
        $this->assertSame(200, $response->getStatusCode());
    }
}