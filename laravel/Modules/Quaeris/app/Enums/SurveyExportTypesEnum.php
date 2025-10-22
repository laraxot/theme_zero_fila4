<?php

declare(strict_types=1);

namespace Modules\Quaeris\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasDescription;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum SurveyExportTypesEnum: string implements HasColor, HasIcon, HasLabel, HasDescription
{
    case xls_alert = 'xls_alert';
    // 'xls_alert_user' => 'xls_alert_user', // lista feedback valutazione <6 per riga di domanda
    case xls_alert_user2 = 'xls_alert_user2';
    // 'xls_alert_user_all_answers' => 'xls_alert_user_all_answers', // lista feedback per riga di domanda
    case xls_answers_complete = 'xls_answers_complete';
    case xls_optout = 'xls_optout';
    case xls_contact_list = 'xls_contact_list';
    case pdf = 'pdf';

    public function getLabel(): string
    {
        return match ($this) {
            self::xls_alert => 'Lista feedback valutazione <6', // lista feedback valutazione <6
            // xls_alert_user => 'xls_alert_user', // lista feedback valutazione <6 per riga di domanda
            self::xls_alert_user2 => 'Lista feedback valutazione <6 per riga di domanda', // lista feedback valutazione <6 per riga di domanda
            // 'xls_alert_user_all_answers' => 'xls_alert_user_all_answers', // lista feedback per riga di domanda
            self::xls_answers_complete => 'Lista risposte complete', // select *
            self::xls_optout => 'Lista disiscritti', // lista disiscritti
            self::xls_contact_list => 'Lista contatti inseriti', // lista contatti inseriti
            self::pdf => 'Pdf',
        };
    }

    public function getDescription(): string
    {
        return match ($this) {
            self::xls_alert => 'Per intervallo di tempo selezionato', // lista feedback valutazione <6
            // xls_alert_user => 'xls_alert_user', // lista feedback valutazione <6 per riga di domanda
            self::xls_alert_user2 => 'Per intervallo di tempo selezionato', // lista feedback valutazione <6 per riga di domanda
            // 'xls_alert_user_all_answers' => 'xls_alert_user_all_answers', // lista feedback per riga di domanda
            self::xls_answers_complete => 'Per intervallo di tempo selezionato', // select *
            self::xls_optout => 'Per intervallo di tempo selezionato', // lista disiscritti
            self::xls_contact_list => 'Per intervallo di tempo selezionato', // lista contatti inseriti
            self::pdf => 'Versione pdf, per intervallo di tempo selezionato',
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::xls_alert => 'success', // lista feedback valutazione <6
            // xls_alert_user => 'xls_alert_user', // lista feedback valutazione <6 per riga di domanda
            self::xls_alert_user2 => 'success', // lista feedback valutazione <6 per riga di domanda
            // 'xls_alert_user_all_answers' => 'xls_alert_user_all_answers', // lista feedback per riga di domanda
            self::xls_answers_complete => 'success', // select *
            self::xls_optout => 'success', // lista disiscritti
            self::xls_contact_list => 'success', // lista contatti inseriti
            self::pdf => 'success',
        };
    }

    public function getIcon(): string
    {
        return match ($this) {
            self::xls_alert => 'heroicon-o-document-text', // lista feedback valutazione <6
            // xls_alert_user => 'xls_alert_user', // lista feedback valutazione <6 per riga di domanda
            self::xls_alert_user2 => 'heroicon-o-document-text', // lista feedback valutazione <6 per riga di domanda
            // 'xls_alert_user_all_answers' => 'xls_alert_user_all_answers', // lista feedback per riga di domanda
            self::xls_answers_complete => 'heroicon-o-document-text', // select *
            self::xls_optout => 'heroicon-o-document-text', // lista disiscritti
            self::xls_contact_list => 'heroicon-o-document-text', // lista contatti inseriti
            self::pdf => 'heroicon-o-document-text',
        };
    }
}
