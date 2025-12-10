<?php

declare(strict_types=1);

namespace Modules\Quaeris\Tests\Feature;

use ArtMin96\FilamentJet\FilamentJet;
use Modules\Quaeris\Models\Customer;
use Modules\Quaeris\Models\SurveyPdf;
use Modules\User\Models\User;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class AddContactTest2 extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        parent::setUpBeforeClass();
    }

    protected function setUp(): void
    {
        parent::setUp();
    }

    #[Test]
    public function falseLogin(): void
    {
        $this->post('/api/user/logout');

        $data = [
            'email' => 'ciccioengrassia@gmail.com',
            'password' => '123456',
        ];

        $response = $this->post('/api/user/login', $data);
        // dd($response);
        // $response->assertJsonPath('status', '404');
        $response->assertStatus(404);
    }

    #[Test]
    public function login(): void
    {
        $this->post('/api/user/logout');

        $user = User::factory()->create();

        // qui creo il token per il nuovo utente
        $this->artisan(
            'passport:client',
            ['--name' => config('app.name'), '--personal' => null]
        )->assertSuccessful();

        $data = [
            'email' => $user->email,
            'password' => 'password',
        ];

        $response = $this->json('POST', '/api/user/login', $data, ['Accept' => 'application/json']);

        // $response->assertJsonPath('status', '200');
        $response->assertStatus(200)
            ->assertJsonStructure([
                'success',
                'message',
                'data' => [
                    'token',
                    'name',
                ],
            ]);

        $user->delete();
    }

    #[Test]
    public function addContactWithoutTeam(): void
    {
        $this->post('/api/user/logout');

        $user = User::factory()->create();

        // qui creo il token per il nuovo utente
        $this->artisan(
            'passport:client',
            ['--name' => config('app.name'), '--personal' => null]
        )->assertSuccessful();

        $data = [
            'email' => $user->email,
            'password' => 'password',
        ];

        $response = $this->json('POST', '/api/user/login', $data, ['Accept' => 'application/json']);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'success',
                'message',
                'data' => [
                    'token',
                    'name',
                ],
            ]);

        $token = $response->decodeResponseJson()['data']['token'];

        // $team = app(FilamentJet::teamModel())->factory()->create();
        $team = app(Customer::class)->factory()->create();
        // dddx($team);
        $surveyPdf = app(SurveyPdf::class)->factory()->create();

        $user->teams()->attach($team);
        $team->surveyPdfs()->save($surveyPdf);
        // dddx($user->teams);
        $datas = [
            'survey_pdf_id' => $surveyPdf->id,
            'mobile_phone' => '321456789',
            'email' => 'test@email.com',
            'language' => 'it',
            'usesleft' => 1,

            'first_name' => 'Giacomooooo',
            'last_name' => 'Giocomooooo',
            'attribute_1' => '123',
            'attribute_2' => '123',
            'attribute_3' => '123',
        ];

        $response = $this->withHeader('Authorization', 'Bearer ' . $token)
            ->json('post', '/api/quaeris/add-contact', $datas);

        $response->assertStatus(200); // l'account appena creato ha un team associato

        $surveyPdf->delete();
        $team->delete();
        $user->delete();
    }

    // #[Test]
    // public function login2WithTeam(): void
    // {
    //     $this->post('/api/user/logout');

    //     $user = User::factory()->create();

    //     // qui creo il token per il nuovo utente
    //     $this->artisan(
    //         'passport:client',
    //         ['--name' => config('app.name'), '--personal' => null]
    //     )->assertSuccessful();

    //     $data = [
    //         'email' => $user->email,
    //         'password' => 'password',
    //     ];

    //     $response = $this->json('POST', '/api/user/login', $data, ['Accept' => 'application/json']);

    //     // $response->assertJsonPath('status', '200');
    //     $response->assertStatus(200)
    //         ->assertJsonStructure([
    //             'success',
    //             'message',
    //             'data' => [
    //                 'token',
    //                 'name',
    //             ],
    //         ]);

    //     $token = $response->decodeResponseJson()['data']['token'];

    //     // $team = app(FilamentJet::teamModel())->factory()->create();
    //     $team = app(Customer::class)->factory()->create();
    //     // dddx($team);
    //     $surveyPdf = app(SurveyPdf::class)->factory()->create();

    //     $user->teams()->attach($team);
    //     $team->surveyPdfs()->save($surveyPdf);
    //     // dddx($user->teams);
    //     $datas = [
    //         'survey_pdf_id' => $surveyPdf->id,
    //         'mobile_phone' => '321456789',
    //         'email' => 'test@email.com',
    //         'language' => 'it',
    //         'usesleft' => 1,

    //         'first_name' => 'Giacomooooo',
    //         'last_name' => 'Giocomooooo',
    //         'attribute_1' => '123',
    //         'attribute_2' => '123',
    //         'attribute_3' => '123',
    //     ];

    //     $response = $this->withHeader('Authorization', 'Bearer ' . $token)
    //         ->json('post', '/api/quaeris/add-contact', $datas);

    //     // dddx([
    //     //     'user_name' => $user->name,
    //     //     'surveyPdfs_ids' => $team->surveyPdfs->modelKeys(),
    //     //     '$surveyPdf->id' =>$surveyPdf->id,
    //     //     'user->teams->modelKeys()' => $user->teams->modelKeys(),
    //     //     'surveyPdfs_idss' => SurveyPdf::whereIn('customer_id', $user->teams->modelKeys())->get()->modelKeys(),
    //     //     'response' => $response,
    //     //     'data' => $datas
    //     // ]);

    //     $response->assertStatus(200); // l'account appena creato ha un team associato

    //     $surveyPdf->delete();
    //     $team->delete();
    //     $user->delete();

    // }

    // /**
    //  * @test
    //  */
    // public function addContactWithoutLogin()
    // {
    //     $response = $this->post('/api/add-contact');
    //     // $response->assertStatus(302);
    //     $response->assertStatus(404);
    // }

    // /**
    //  * @test
    //  */
    // #[Test]
    // public function addContactWithLoginWithoutTeam(): never
    // {
    //     $this->post('/api/user/logout');
    //     $users = [
    //         [
    //             'email' => 'malebestia@yahoo.it',
    //             'password' => 'quaeris31021',
    //         ],

    //     ];

    //     $user = $users[0];

    //     $response = $this->post('/api/user/login', $user);

    //     $token = $response->decodeResponseJson()['data']['token'];

    //     $data = [
    //         'survey_pdf_id' => '22',
    //         'mobile_phone' => '321456789',
    //         'email' => 'test@email.com',
    //         'language' => 'it',
    //         'usesleft' => 1,

    //         'first_name' => 'Giacomo',
    //         'last_name' => 'Giocomo',
    //         'attribute_1' => '123',
    //         'attribute_2' => '123',
    //         'attribute_3' => '123',
    //     ];

    //     $response = $this->withHeader('Authorization', 'Bearer ' . $token)
    //         ->json('post', '/api/quaeris/add-contact', $data);
    //     dd($response);
    //     // $response->assertJsonPath('success', true);
    //     $response->assertStatus(200);
    // }
}
