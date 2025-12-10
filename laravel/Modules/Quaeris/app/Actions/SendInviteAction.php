<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Quaeris\Actions;

use Exception;
use Illuminate\Support\Facades\Notification;
use Modules\Notify\Notifications\ThemeNotification;
use Modules\Quaeris\Models\Contact;
use Spatie\QueueableAction\QueueableAction;
use TypeError;

class SendInviteAction
{
    use QueueableAction;

    /**
     * Execute the action.
     */
    public function execute(Contact $contact): void
    {
        $surveyPdf = $contact->surveyPdf;
        if ($surveyPdf === null) {
            throw new Exception('surveyPdf is null');
        }

        $view_params = $surveyPdf->toArray();
        $view_params['post_id'] = $contact->survey_pdf_id;
        $view_params['survey_id'] = (string) $surveyPdf->survey_id;
        $contact->attribute_2 = trans('quaeris::contact.attribute.2.' . $contact->attribute_2) ?? $contact->attribute_2;
        // $view_params['logo_src'] = $row->surveyPdf->logo_src;
        if ($contact->allow_multiple_invite === false && $contact->duplicate_count === 0) {
            Notification::send($contact, new ThemeNotification('survey_pdf', $view_params));
        }

        if ($contact->allow_multiple_invite === true) {
            try {
                Notification::send($contact, new ThemeNotification('survey_pdf', $view_params));
            } catch(Exception $e) {
            } catch(TypeError $e) {
            }
        }

        // Notification::send($row, new ThemeNotification('survey_pdf', $view_params));
        sleep(2);
    }
}
