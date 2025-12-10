<?php

declare(strict_types=1);
// File: Laravel/Modules/CloudStorage/Services/GoogleDriveService.php

namespace Modules\CloudStorage\Services;

use Exception;
use Google\Client;
use Google\Service\Drive;
use Webmozart\Assert\Assert;

class GoogleDriveService
{
    protected Client $client;
    protected Drive $driveService;

    public function __construct()
    {
        $this->client = new Client();
        Assert::string($client_id = config('services.google.client_id'));
        Assert::string($client_secret = config('services.google.client_secret'));
        Assert::string($redirect = config('services.google.redirect'));
        Assert::isArray($scopes = config('services.google.scopes'));

        $this->client->setClientId($client_id);
        $this->client->setClientSecret($client_secret);
        $this->client->setRedirectUri($redirect);
        $this->client->setScopes($scopes);
        $this->client->setAccessType('offline');

        $user = auth()->user();
        if (null == $user) {
            throw new Exception('Utente non autenticato');
        }

        if ($token = $user->getProviderField('google', 'token')) {
            $this->client->setAccessToken($token);
        }

        $this->driveService = new Drive($this->client);
    }

    /**
     * Summary of getFiles.
     *
     * @return array
     */
    public function getFiles()
    {
        return $this->driveService->files->listFiles([
            'fields' => 'files(id, name, mimeType, modifiedTime, size)',
            'q' => "'root' in parents and trashed = false",
        ])->getFiles();
    }
}
