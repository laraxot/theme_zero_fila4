<?php

declare(strict_types=1);

return [
    'questions' => [
        'who_is_service_for' => [
            'question' => [
                'label' => 'A chi é rivolto questo servizio?',
                'tooltip' => 'Target del servizio',
                'helper_text' => '',
            ],
            'answer' => [
                'label' => 'Il portale Salute Orale nasce per aiutare donne in stato di gravidanza con un ISEE inferiore a 20.000 euro. Ogni paziente ha diritto ad una sola visita per la durata del progetto.',
                'tooltip' => 'Dettagli sui requisiti di accesso',
                'helper_text' => '',
            ],
        ],
        'what_service_offers' => [
            'question' => [
                'label' => 'Cosa offre questo servizio?',
                'tooltip' => 'Servizi disponibili',
                'helper_text' => '',
            ],
            'answer' => [
                'label' => 'Il servizio fornisce una prima visita odontoiatrica completa (controllo+igiene) a titolo completamente gratuito per le pazienti in stato di gravidanza.',
                'tooltip' => 'Dettagli sui servizi offerti',
                'helper_text' => '',
            ],
        ],
        'how_to_access' => [
            'question' => [
                'label' => 'Da dove posso accedere al servizio?',
                'tooltip' => 'Modalità di accesso',
                'helper_text' => '',
            ],
            'answer' => [
                'label' => 'Il servizio è disponibile come webapp mobile first. Questo vuol dire che è disponibile liberamente sul web, non richiede di scaricare nulla, ed è accessibile via pc o smartphone.',
                'tooltip' => 'Informazioni tecniche di accesso',
                'helper_text' => '',
            ],
        ],
        'how_to_request' => [
            'question' => [
                'label' => 'Come posso chiedere una visita?',
                'tooltip' => 'Procedura per richiedere la visita',
                'helper_text' => '',
            ],
            'answer' => [
                'label' => 'Registrati e prenota la tua visita da questo portale. Assicurati di avere con te dati personali, autocertificazione ISEE e certificato medico di gravidanza.',
                'tooltip' => 'Documentazione necessaria',
                'helper_text' => '',
            ],
        ],
        'how_to_book' => [
            'question' => [
                'label' => 'Come prenoto un appuntamento?',
                'tooltip' => 'Modalità di prenotazione',
                'helper_text' => '',
            ],
            'answer' => [
                'label' => 'Una volta registrata potrai cercare tutti gli studi dentistici attivi all\'interno di un\'area precisa e scegliere quello migliore in base a posizione e disponibilità oraria.',
                'tooltip' => 'Sistema di ricerca e prenotazione',
                'helper_text' => '',
            ],
        ],
        'location_choice' => [
            'question' => [
                'label' => 'Devo prenotare uno studio vicino a casa mia?',
                'tooltip' => 'Flessibilità nella scelta dello studio',
                'helper_text' => '',
            ],
            'answer' => [
                'label' => 'Puoi prenotare il tuo appuntamento dove vuoi, a patto di riuscire a raggiungere lo studio in tempo per la tua visita.',
                'tooltip' => 'Libertà di scelta geografica',
                'helper_text' => '',
            ],
        ],
        'appointment_rejected' => [
            'question' => [
                'label' => 'Cosa succede se l\'appuntamento viene rifiutato?',
                'tooltip' => 'Gestione dei rifiuti',
                'helper_text' => '',
            ],
            'answer' => [
                'label' => 'Può essere che il dentista rifiuti il tuo appuntamento. Non preoccuparti: potrai prenotare un nuovo appuntamento cambiando orario, dentista o area di ricerca.',
                'tooltip' => 'Alternative in caso di rifiuto',
                'helper_text' => '',
            ],
        ],
        'cannot_attend' => [
            'question' => [
                'label' => 'Cosa devo fare se non posso andare ad un appuntamento già accettato?',
                'tooltip' => 'Gestione delle cancellazioni',
                'helper_text' => '',
            ],
            'answer' => [
                'label' => 'Se non riesci ad andare ad un appuntamento già confermato, contatta il medico appena possibile (almeno 24h prima dell\'appuntamento) e informalo della tua assenza! In questo modo potrai prenotare una nuova visita. Troverai i suoi contatti (telefono e mail) all\'interno della tua scheda appuntamento.',
                'tooltip' => 'Procedura di cancellazione',
                'helper_text' => '',
            ],
            'warning' => [
                'label' => 'MANCARE UN APPUNTAMENTO SENZA CONTATTARE IL MEDICO IMPEDISCE DI ACCEDERE NUOVAMENTE AL SERVIZIO.',
                'tooltip' => 'Conseguenze di no-show',
                'helper_text' => '',
            ],
        ],
    ],
]; 