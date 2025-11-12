<?php

declare(strict_types=1);

return [
    /*
    |--------------------------------------------------------------------------
    | Informative GDPR e Privacy
    |--------------------------------------------------------------------------
    */
    'doctor_privacy_policy' => [
        'title' => [
            'label' => 'INFORMATIVA SUL TRATTAMENTO DEI DATI PERSONALI',
            'tooltip' => 'Informazioni sul trattamento dei dati per i dottori',
            'helper_text' => 'Informativa privacy conforme al GDPR per operatori sanitari',
        ],
        'subtitle' => [
            'label' => 'Dedicata alle gestanti',
            'tooltip' => 'Informativa specifica per donne in gravidanza',
            'helper_text' => 'Sezione dedicata ai trattamenti per le pazienti gestanti',
        ],
        'premise' => [
            'title' => [
                'label' => 'Premessa',
                'tooltip' => 'Introduzione all\'informativa',
                'helper_text' => 'Contesto generale del trattamento dati',
            ],
            'description' => [
                'label' => 'L\'informativa descrive le caratteristiche dei trattamenti svolti da Fondazione ANDI E.T.S. sui suoi dati personali nell\'ambito del Progetto "Salute Ora" e le indica i diritti che la normativa le garantisce.',
                'tooltip' => 'Scopo dell\'informativa privacy',
                'helper_text' => 'Descrizione dei trattamenti dati nel progetto Salute Ora',
            ],
        ],
        'personal_data' => [
            'title' => [
                'label' => 'Dati personali',
                'tooltip' => 'Categoria dei dati raccolti',
                'helper_text' => 'Tipologie di informazioni personali trattate',
            ],
            'collection_question' => [
                'label' => 'Quali dati personali raccogliamo?',
                'tooltip' => 'Domanda sui dati raccolti',
                'helper_text' => 'Elenco delle categorie di dati personali oggetto di trattamento',
            ],
            'collection_intro' => [
                'label' => 'Fondazione ANDI ETS raccoglie i seguenti dati:',
                'tooltip' => 'Introduzione all\'elenco dei dati',
                'helper_text' => 'Premessa alla lista delle tipologie di dati raccolti',
            ],
            'types' => [
                'identification_contact' => [
                    'label' => 'Dati identificativi e di contatto',
                    'tooltip' => 'Nome, cognome, indirizzo, telefono, email',
                    'helper_text' => 'Informazioni per l\'identificazione e il contatto della persona',
                ],
                'isee_indicators' => [
                    'label' => 'Dati relativi all\'ISEE e ai relativi indicatori',
                    'tooltip' => 'Informazioni economiche per la valutazione dei requisiti',
                    'helper_text' => 'Dati economici necessari per verificare l\'idoneità al progetto',
                ],
                'pregnancy_condition' => [
                    'label' => 'Dati relativi alla sua condizione di gravidanza',
                    'tooltip' => 'Informazioni sullo stato di gravidanza',
                    'helper_text' => 'Dati specifici relativi alla gravidanza della paziente',
                ],
                'medical_history' => [
                    'label' => 'Dati relativi all\'anamnesi',
                    'tooltip' => 'Storia clinica e medica',
                    'helper_text' => 'Informazioni sulla storia medica e clinica della paziente',
                ],
                'oral_health' => [
                    'label' => 'Dati relativi alla sua salute orale',
                    'tooltip' => 'Stato di salute dentale e orale',
                    'helper_text' => 'Informazioni specifiche sulla condizione orale e dentale',
                ],
                'prevention_habits' => [
                    'label' => 'Dati relativi alle sue abitudini di prevenzione e cura dell\'igiene orale',
                    'tooltip' => 'Abitudini di igiene dentale',
                    'helper_text' => 'Informazioni sulle pratiche di prevenzione e igiene orale',
                ],
            ],
        ],
        'purposes' => [
            'title' => [
                'label' => 'Per quali finalità utilizziamo i suoi dati personali?',
                'tooltip' => 'Scopi del trattamento dati',
                'helper_text' => 'Finalità per cui vengono utilizzati i dati personali',
            ],
            'intro' => [
                'label' => 'Trattiamo i dati personali per le seguenti finalità:',
                'tooltip' => 'Introduzione alle finalità del trattamento',
                'helper_text' => 'Premessa all\'elenco degli scopi del trattamento',
            ],
            'list' => [
                'eligibility_assessment' => [
                    'label' => 'Valutare i requisiti per la partecipazione al progetto "Salute Ora" (la legittimazione del trattamento si fonda sull\'esecuzione di obblighi normativi e sull\'articolo 9, par. 2 lettera g, ovvero per il perseguimento di interessi pubblici)',
                    'tooltip' => 'Verifica dei requisiti di accesso al progetto',
                    'helper_text' => 'Controllo dell\'idoneità a partecipare al progetto sanitario',
                ],
                'payment_processing' => [
                    'label' => 'Procedere al pagamento del compenso dell\'odontoiatra (la legittimazione del trattamento si fonda sull\'esecuzione di obblighi normativi)',
                    'tooltip' => 'Gestione dei pagamenti ai dentisti',
                    'helper_text' => 'Processo di remunerazione per le prestazioni erogate',
                ],
                'data_collection_research' => [
                    'label' => 'Raccogliere i dati relativi all\'anamnesi e alle prestazioni svolte dall\'odontoiatra per verificare il corretto svolgimento del progetto e per anonimizzare i dati perché poi vengano utilizzati per motivi di studio e di ricerca (la legittimazione del trattamento si fonda sull\'articolo 9, par. 2 lettera g, ovvero per il perseguimento di interessi pubblici)',
                    'tooltip' => 'Raccolta dati per controllo qualità e ricerca',
                    'helper_text' => 'Utilizzo dei dati per verifiche di qualità e scopi di ricerca scientifica',
                ],
            ],
        ],
    ],

    'patient_privacy_policy' => [
        'title' => [
            'label' => 'Informativa Privacy per i Pazienti',
            'tooltip' => 'Informazioni sulla privacy per le pazienti',
            'helper_text' => 'Informativa GDPR dedicata alle pazienti del progetto',
        ],
        'gdpr_notice' => [
            'label' => 'Informativa ai sensi dell\'art. 13 del Regolamento UE 2016/679 (GDPR)',
            'tooltip' => 'Riferimenti normativi GDPR',
            'helper_text' => 'Base normativa dell\'informativa privacy',
        ],
        'data_controller' => [
            'title' => [
                'label' => 'Titolare del Trattamento',
                'tooltip' => 'Soggetto responsabile del trattamento',
                'helper_text' => 'Identificazione del titolare del trattamento dati',
            ],
        ],
        'processing_purpose' => [
            'title' => [
                'label' => 'Finalità del Trattamento',
                'tooltip' => 'Scopi per cui vengono trattati i dati',
                'helper_text' => 'Obiettivi del trattamento dei dati personali',
            ],
            'purposes' => [
                'healthcare_services' => [
                    'label' => 'Erogazione dei servizi sanitari richiesti',
                    'tooltip' => 'Prestazioni mediche e odontoiatriche',
                    'helper_text' => 'Servizi sanitari offerti nel progetto',
                ],
                'appointment_management' => [
                    'label' => 'Gestione delle prenotazioni e degli appuntamenti',
                    'tooltip' => 'Sistema di prenotazione visite',
                    'helper_text' => 'Organizzazione degli appuntamenti con gli operatori',
                ],
                'legal_compliance' => [
                    'label' => 'Adempimento degli obblighi di legge e fiscali',
                    'tooltip' => 'Conformità normativa',
                    'helper_text' => 'Rispetto degli obblighi legali e amministrativi',
                ],
                'service_communications' => [
                    'label' => 'Comunicazioni relative ai servizi sottoscritti',
                    'tooltip' => 'Informazioni sui servizi attivi',
                    'helper_text' => 'Comunicazioni inerenti i servizi utilizzati',
                ],
                'service_improvement' => [
                    'label' => 'Miglioramento dei servizi offerti',
                    'tooltip' => 'Ottimizzazione della qualità dei servizi',
                    'helper_text' => 'Sviluppo e miglioramento dell\'offerta sanitaria',
                ],
                'promotional_communications' => [
                    'label' => 'Previo consenso, invio di newsletter e comunicazioni promozionali',
                    'tooltip' => 'Marketing e comunicazioni promozionali',
                    'helper_text' => 'Attività di marketing solo previa autorizzazione',
                ],
            ],
        ],
        'legal_basis' => [
            'title' => [
                'label' => 'Base Giuridica del Trattamento',
                'tooltip' => 'Fondamento legale del trattamento',
                'helper_text' => 'Giustificazione normativa per il trattamento dei dati',
            ],
        ],
        'data_categories' => [
            'title' => [
                'label' => 'Categorie di Dati Trattati',
                'tooltip' => 'Tipologie di informazioni raccolte',
                'helper_text' => 'Classificazione dei dati personali oggetto di trattamento',
            ],
            'types' => [
                'personal_details' => [
                    'label' => 'Dati anagrafici (nome, cognome, data di nascita, codice fiscale)',
                    'tooltip' => 'Informazioni anagrafiche di base',
                    'helper_text' => 'Dati identificativi della persona',
                ],
                'contact_information' => [
                    'label' => 'Informazioni di contatto (indirizzo, email, telefono)',
                    'tooltip' => 'Modalità di contatto',
                    'helper_text' => 'Dati per la comunicazione con la paziente',
                ],
                'health_data' => [
                    'label' => 'Dati sanitari (anamnesi, diagnosi, trattamenti)',
                    'tooltip' => 'Informazioni mediche e sanitarie',
                    'helper_text' => 'Dati relativi alla salute e alle cure mediche',
                ],
                'administrative_fiscal' => [
                    'label' => 'Dati amministrativi e fiscali',
                    'tooltip' => 'Informazioni per gli adempimenti amministrativi',
                    'helper_text' => 'Dati necessari per pratiche amministrative e fiscali',
                ],
            ],
        ],
        'processing_methods' => [
            'title' => [
                'label' => 'Modalità di Trattamento e Conservazione',
                'tooltip' => 'Come vengono gestiti e conservati i dati',
                'helper_text' => 'Metodologie di trattamento e policy di conservazione',
            ],
        ],
        'data_subject_rights' => [
            'title' => [
                'label' => 'Diritti dell\'Interessato',
                'tooltip' => 'Diritti garantiti dal GDPR',
                'helper_text' => 'Diritti riconosciuti alle persone sui propri dati',
            ],
            'rights' => [
                'access' => [
                    'label' => 'Accesso ai dati personali',
                    'tooltip' => 'Diritto di conoscere quali dati sono trattati',
                    'helper_text' => 'Possibilità di ottenere informazioni sui dati trattati',
                ],
                'rectification' => [
                    'label' => 'Rettifica o cancellazione degli stessi',
                    'tooltip' => 'Diritto di correggere o eliminare i dati',
                    'helper_text' => 'Possibilità di modificare o rimuovere i propri dati',
                ],
                'processing_restriction' => [
                    'label' => 'Limitazione del trattamento',
                    'tooltip' => 'Diritto di limitare l\'utilizzo dei dati',
                    'helper_text' => 'Possibilità di restringere il trattamento dei dati',
                ],
                'data_portability' => [
                    'label' => 'Portabilità dei dati',
                    'tooltip' => 'Diritto di ottenere i dati in formato trasferibile',
                    'helper_text' => 'Possibilità di ricevere i dati in formato strutturato',
                ],
                'objection' => [
                    'label' => 'Opposizione al trattamento',
                    'tooltip' => 'Diritto di opporsi al trattamento',
                    'helper_text' => 'Possibilità di rifiutare determinati trattamenti',
                ],
                'consent_withdrawal' => [
                    'label' => 'Revoca del consenso',
                    'tooltip' => 'Diritto di ritirare il consenso',
                    'helper_text' => 'Possibilità di revocare il consenso precedentemente dato',
                ],
            ],
        ],
    ],
]; 