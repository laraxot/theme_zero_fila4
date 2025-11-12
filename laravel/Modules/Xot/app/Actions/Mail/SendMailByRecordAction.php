<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Mail;

use InvalidArgumentException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;
use Modules\Notify\Datas\EmailData;
use Modules\Notify\Datas\SmtpData;
use Modules\Xot\Actions\Export\PdfByModelAction;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

class SendMailByRecordAction
{
    use QueueableAction;

    /**
     * Invia una mail utilizzando un record come dati.
     *
     * @param Model  $record    Il record da utilizzare come dati per la mail
     * @param string $mailClass La classe Mailable da utilizzare
     */
    public function execute(Model $record, string $mailClass): void
    {
        Assert::classExists($mailClass);
        // Expected an implementation of "Illuminate\Mail\Mailable". Got: "Modules\Performance\Mail\SchedaMail"
        // Assert::implementsInterface($mailClass, Mailable::class);

        // Utilizziamo il container per istanziare la classe Mailable
        // in modo che possa ricevere le dipendenze necessarie
        // @var Mailable $mail
        // $mail = app($mailClass, ['record' => $record]);
        //Mail::send($mail);
        //dddx(Mail::to($record)->send(new $mailClass($record)));
        //$res=Mail::to('marco.sottana@gmail.com')->send($mail);

        // Verifica che il model abbia le proprietà/metodi necessari
        if (($record->email ?? null) === null || empty($record->email)) {
            throw new InvalidArgumentException('Model must have email property');
        }

        if (!method_exists($record, 'option')) {
            throw new InvalidArgumentException('Model must implement option method');
        }

        if (!method_exists($record, 'myLogs')) {
            throw new InvalidArgumentException('Model must implement myLogs method');
        }

        $data = [
            'to' => $record->email,
            'subject' => $record->option('mail_oggetto'),
            'body_html' => $record->option('mail_testo'),
            'attachments' => [
                app(PdfByModelAction::class)->execute(
                    model: $record,
                    out: 'path',
                ),
            ],
        ];
        $emailData = EmailData::from($data);
        SmtpData::make()->send($emailData);

        $record
            ->myLogs()
            ->create([
                'act' => 'sendMail',
                'handle' => authId(),
            ]);
    }
}
