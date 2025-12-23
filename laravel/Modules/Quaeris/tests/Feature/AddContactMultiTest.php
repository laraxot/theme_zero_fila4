<?php


declare(strict_types=1);

namespace Modules\Quaeris\Tests\Feature;

use Modules\Quaeris\Tests\TestCase;
use Illuminate\Support\Facades\File;
use Modules\Camping\Models\Operation;
use Modules\User\Models\User;

uses(TestCase::class);

/**
 * ./vendor/bin/pest ./Modules/Quaeris/Tests/Feature/AddContactMultiTest.php
 */
it('add contact multi', function () {
    $user = User::firstWhere(['email' => 'marco.sottana@gmail.com']);

    // $response = $this->postJson('/api/user/login', [
    //     'email' => $user->email,
    //     'password' => $user->password,
    // ]);

    // $response->assertStatus(200);
    // $response->assertJsonStructure([
    //     'access_token',
    //     'token_type',
    //     'expires_in',
    // ]);
    $this->actingPassport($user);
    /*
    $response = $this->get('/api/v2/user');
    $response->assertJson([
        'data' => [
            'id' => $user->id,
        ],
    ]);
    $response->assertStatus(200);
    */
    $url = '/api/quaeris/add-contact-multi';

    $contacts = [
        [
            'survey_pdf_id' => '16',
            'email' => 'vair81@gmail.com',
            'language' => 'it',
            'usesleft' => '1',

            'first_name' => '',
            'last_name' => '',
            'attribute_1' => 'Davide', // Cliente
            'attribute_2' => '18/04/24', // Data Richiesta
            'attribute_3' => '3791339157', // tel. mobile
            'attribute_4' => '0423763916', // tel. principale
            'attribute_5' => 'C00099138', // num account
            'attribute_6' => 'Adesione fondo perdita', // tipologia richiesta
            'attribute_7' => 'Modifica Indirizzo POD', // sotto tipologia
            'attribute_8' => 'altro testo', // Classificazione richiesta
            'attribute_9' => 'web', // origine
            'attribute_10' => 'altro nome', // nome segnalatore
            'attribute_11' => 'qualifica segnalatore', // qualifica segnalatore
            'attribute_12' => 'cellulare segnalatore', // cellulare segnalatore
            'attribute_13' => 'telefono segnalatore', // telefono segnalatore
            'attribute_14' => 'altraemail@mail.com', // email segnalatore
        ],
        [
            'survey_pdf_id' => '16',
            'email' => 'malebestia@yahoo.it',
            'language' => 'it',
            'usesleft' => '1',

            'first_name' => '',
            'last_name' => '',
            'attribute_1' => 'Davide', // Cliente
            'attribute_2' => '18/04/24', // Data Richiesta
            'attribute_3' => '3791339157', // tel. mobile
            'attribute_4' => '0423763916', // tel. principale
            'attribute_5' => 'C00099138', // num account
            'attribute_6' => 'Adesione fondo perdita', // tipologia richiesta
            'attribute_7' => 'Modifica Indirizzo POD', // sotto tipologia
            'attribute_8' => 'altro testo', // Classificazione richiesta
            'attribute_9' => 'web', // origine
            'attribute_10' => 'altro nome', // nome segnalatore
            'attribute_11' => 'qualifica segnalatore', // qualifica segnalatore
            'attribute_12' => 'cellulare segnalatore', // cellulare segnalatore
            'attribute_13' => 'telefono segnalatore', // telefono segnalatore
            'attribute_14' => 'altraemail@mail.com', // email segnalatore
        ]
    ];

    $params = ['data' => json_encode($contacts)];

    $response = $this->call('POST', $url, $params);
    $response->dd();
    $response->dump();
    $response->assertStatus(200);

    //    ->assertJsonPath('meta.per_page', $params['per_page'])
    //    ->assertJsonPath('meta.current_page', $params['page']);


});
