<?php

/**
 * https://api.limesurvey.org/classes/remotecontrol_handle.html#method_import_question.
 */

declare(strict_types=1);

namespace Modules\Quaeris\Services;

// use Illuminate\Database\Eloquent\Collection;
use Exception;
use Modules\Limesurvey\Actions\GetParticipantModelBySurveyIdAction;
use Modules\Quaeris\Models\Contact;
use org\jsonrpcphp\JsonRPCClient;
use function Safe\json_encode;

/**
 * ---
 */
class LimeJsonService
{
    public string $url = '';

    public string $username = '';

    public string $password = '';

    public string $surveyId = '';

    public string $sessionKey = '';

    /**
     * @var array<string>
     */
    public array $vars = [];

    public string $interval;
    private static ?self $instance = null;

    public function __construct()
    {
        $url = config('quaeris.limesurvey.api.url') ?? config('quaeris.limesurvey.url');
        if (! is_string($url)) {
            throw new Exception('['.__LINE__.']['.__FILE__.']');
        }

        $this->url = $url;
        $username = config('quaeris.limesurvey.api.username') ?? config('quaeris.limesurvey.username');
        if (! is_string($username)) {
            throw new Exception('['.__LINE__.']['.__FILE__.']');
        }

        $this->username = $username;
        $password = config('quaeris.limesurvey.api.password') ?? config('quaeris.limesurvey.password');
        if (! is_string($password)) {
            throw new Exception('['.__LINE__.']['.__FILE__.']');
        }

        $this->password = $password;
    }

    public function __destruct()
    {
        // ---
    }

    public static function getInstance(): self
    {
        if (! self::$instance instanceof \Modules\Quaeris\Services\LimeJsonService) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public static function make(): self
    {
        return static::getInstance();
    }

    // public function setInterval(string $interval): self
    // {
    //     $this->interval = $interval;

    //     return $this;
    // }

    // public function getInterval(): string
    // {
    //     if (! empty($this->vars['interval'])) {
    //         $this->interval = $this->vars['interval'];
    //     } else {
    //         $this->interval = 'now()-interval 3 month';
    //     }

    //     return $this->interval;
    // }

    public function setSurveyId(string $surveyId): self
    {
        $this->surveyId = $surveyId;

        return $this;
    }

    public function getSurveyId(): string
    {
        if (isset($this->vars['survey_id'])) {
            $this->surveyId = $this->vars['survey_id'];
        }

        return $this->surveyId;
    }

    // public function mergeVars(array $vars): self
    // {
    //     $this->vars = array_merge($this->vars, $vars);

    //     return $this;
    // }

    // public function getVars(): array
    // {
    //     return $this->vars;
    // }

    /**
     * @param array<mixed> $data
     *
     * @return array<mixed>
     */
    public function addParticipants(array $data): array
    {
        // [ {"email":"me@example.com","lastname":"Bond","firstname":"James"},
        // {"email":"me2@example.com","attribute_1":"example"} ]

        $jsonRPCClient = $this->getJSONRPCClient();
        /** @phpstan-ignore-next-line */
        $responses = $jsonRPCClient->add_participants($this->sessionKey, $this->surveyId, $data, true);
        // Returns the inserted data including additional new information like the Token entry ID and the token string.
        // In case of errors in some data, return it in errors.
        /** @phpstan-ignore-next-line */
        $jsonRPCClient->release_session_key($this->sessionKey);

        return $responses;
    }

    public function activateTokens(): string
    {
        $jsonRPCClient = $this->getJSONRPCClient();
        /** @phpstan-ignore-next-line */
        $responses = $jsonRPCClient->activate_tokens($this->sessionKey, $this->surveyId);
        // Returns the inserted data including additional new information like the Token entry ID and the token string.
        // In case of errors in some data, return it in errors.
        /** @phpstan-ignore-next-line */
        $jsonRPCClient->release_session_key($this->sessionKey);

        return $responses;
    }

    public function getJSONRPCClient(): JsonRPCClient
    {
        $jsonRPCClient = new JsonRPCClient($this->url);
        /** @phpstan-ignore-next-line */
        $this->sessionKey = $jsonRPCClient->get_session_key($this->username, $this->password);

        if (is_array($this->sessionKey)) {
            header('Content-type: application/json');
            echo json_encode($this->sessionKey, JSON_THROW_ON_ERROR);
            exit;
        }

        return $jsonRPCClient;
    }

    /**
     * Undocumented function.
     */
    public function updateContactToken(Contact $contact): string
    {
        // dddx($row);

        if ($contact->token !== null) {
            return $contact->token;
        }

        $data = [
            'firstname' => $contact->first_name,
            'lastname' => $contact->last_name,
            'email' => $contact->email,
            'attribute_1' => $contact->attribute_1,
            'attribute_2' => $contact->attribute_2,
            'attribute_3' => $contact->mobile_phone, // come convenzione hanno scelto l'attributo 3 come cellulare
            // 'attribute_3' => $row->attribute_3,
            'attribute_4' => $contact->attribute_4,
            'attribute_5' => $contact->attribute_5,
            'attribute_6' => $contact->attribute_6,
            'attribute_7' => $contact->attribute_7,
            'attribute_8' => $contact->attribute_8,
            'attribute_9' => $contact->attribute_9,
            'attribute_10' => $contact->attribute_10,
            'attribute_11' => $contact->attribute_11,
            'attribute_12' => $contact->attribute_12,
            'attribute_13' => $contact->attribute_13,
            'attribute_14' => $contact->attribute_14,
            'language' => $contact->language,
            // 'usesleft' => $row->usesleft,
            'usesleft' => 1,
        ];
        // "status" => "No survey participants table"
        $res = $this->addParticipants([$data]);
        // dddx($res);
        if (isset($res['status']) && $res['status'] === 'No survey participants table') {
            $res = $this->activateTokens();
            $res = $this->addParticipants([$data]);
        }

        $token = $res[0]['token'] ?? null;

        if ($token === null) {
            // $msg = print_r($res, true);

            // throw new Exception($msg);
            if (isset($res[0]['errors'])) {
                echo '<pre>[' . $contact->id . ']' . print_r($res[0]['errors'], true) . '</pre>';
            } else {
                echo '<pre>[' . $contact->id . ']' . print_r($res, true) . '</pre>';
            }

            return '';
        }

        $contact->update(
            [
                'token' => $token,
            ]
        );

        // $lime = LimeModelService::make()->setSurveyId($this->getSurveyId());
        // $u = $lime->getParticipants();

        $u = app(GetParticipantModelBySurveyIdAction::class)->execute($this->getSurveyId());
        $u_fields = $u->getFillable();

        $data1 = collect(array_keys($data))->intersect($u_fields)->all();
        $data2 = collect($data)->only($data1)->all();

        if (count($data2) > 3) {
            $u->where($data2)
                ->where('token', '!=', $token)->delete();
        }

        return $token;
    }

    /* --deprecated
    public function deleteParticipantByToken(string $token): void {
        $lime = LimeModelService::make()->setSurveyId($this->getSurveyId());
        $u = $lime->getParticipants();
        $u->where('token', $token)->delete();
    }
    */
}
