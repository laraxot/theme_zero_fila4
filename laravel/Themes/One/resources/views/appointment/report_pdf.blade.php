<page backtop="20mm" backbottom="10mm" backleft="15mm" backright="15mm">
    <page_header>
        <table style="width: 100%; font-size: 10px; border-bottom: 1px solid #000000;">
            <tr>
                <td style="text-align: left; width: 33%;">
                    {{ $appointment->studio->name ?? 'SaluteOra' }}
                </td>
                <td style="text-align: center; width: 34%;">
                    <strong>@lang('pub_theme::appointment.report.ready_title')</strong>
                </td>
                <td style="text-align: right; width: 33%;">
                    {{ now()->format('d/m/Y H:i') }}
                </td>
            </tr>
        </table>
    </page_header>

    <page_footer>
        <table style="width: 100%; font-size: 8px; color: #666;">
            <tr>
                <td style="text-align: left; width: 33%;">
                    Doc. {{ now()->format('Y') }}/{{ str_pad($appointment->id, 4, '0', STR_PAD_LEFT) }}
                </td>
                <td style="text-align: center; width: 34%;">
                    @lang('pub_theme::common.Project')
                </td>
                <td style="text-align: right; width: 33%;">
                    @lang('pub_theme::common.page') [[page_cu]]/[[page_nb]]
                </td>
            </tr>
        </table>
    </page_footer>

    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            font-size: 10px;
            line-height: 1.3;
        }

        h1 {
            font-size: 16px;
            color: #0066CC;
            text-align: center;
            margin: 10px 0;
            border-bottom: 2px solid #0066CC;
            padding-bottom: 5px;
        }

        h2 {
            font-size: 14px;
            color: #0066CC;
            margin: 15px 0 8px 0;
            padding: 5px;
            background-color: #f0f7ff;
            border-left: 4px solid #0066CC;
        }

        h3 {
            font-size: 12px;
            color: #009246;
            margin: 10px 0 5px 0;
            background-color: #f0fff4;
            padding: 3px 5px;
            border-left: 3px solid #009246;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }

        table.info td {
            border: 1px solid #ddd;
            padding: 6px;
            vertical-align: top;
        }

        table.info .label {
            background-color: #f8f9fa;
            font-weight: bold;
            color: #666;
            width: 30%;
            font-size: 9px;
        }

        table.info .value {
            font-size: 10px;
        }

        .emergency {
            background-color: #ffe6e8;
            color: #ce2b37;
            padding: 8px;
            margin: 10px 0;
            border-left: 4px solid #ce2b37;
            font-weight: bold;
        }

        .status {
            padding: 2px 6px;
            font-size: 8px;
            font-weight: bold;
            text-transform: uppercase;
            border: 1px solid;
        }

        .status-scheduled {
            background-color: #e6f0ff;
            color: #0066cc;
            border-color: #0066cc;
        }

        .status-confirmed {
            background-color: #e6f7ed;
            color: #009246;
            border-color: #009246;
        }

        .status-completed {
            background-color: #f0f0f0;
            color: #666;
            border-color: #999;
        }

        .status-cancelled {
            background-color: #ffe6e8;
            color: #ce2b37;
            border-color: #ce2b37;
        }

        .status-pending {
            background-color: #fff3e6;
            color: #ff8c00;
            border-color: #ff8c00;
        }

        .yes-no {
            padding: 2px 5px;
            font-size: 8px;
            font-weight: bold;
            text-transform: uppercase;
            border: 1px solid;
        }

        .yes {
            background-color: #e6f7ed;
            color: #009246;
            border-color: #009246;
        }

        .no {
            background-color: #ffe6e8;
            color: #ce2b37;
            border-color: #ce2b37;
        }

        .medical-item {
            background-color: #f9f9f9;
            border-left: 3px solid #009246;
            padding: 6px;
            margin-bottom: 8px;
        }

        .medical-question {
            font-weight: bold;
            color: #333;
            margin-bottom: 3px;
            font-size: 9px;
        }

        .medical-answer {
            color: #666;
            font-size: 8px;
        }

        .detail-box {
            background-color: #f8f9fa;
            border: 1px solid #ddd;
            padding: 4px;
            margin-top: 3px;
            font-size: 8px;
        }

        .detail-label {
            font-weight: bold;
            color: #0066cc;
        }

        .studio-box {
            background-color: #e6f0ff;
            border: 2px solid #0066cc;
            padding: 8px;
            margin: 10px 0;
        }

        .notes-box {
            background-color: #fff3e6;
            border: 2px solid #ff8c00;
            padding: 8px;
            margin: 10px 0;
        }
    </style>

    <!-- Header principale -->
    <h1>@lang('pub_theme::appointment.report.pdf_title') #{{ str_pad($appointment->id, 6, '0', STR_PAD_LEFT) }}</h1>

    <!-- Alert emergenza -->
    @if ($appointment->emergency)
        <div class="emergency">
            @lang('pub_theme::appointment.report.labels.emergency_label'): @lang('saluteora::appointment.fields.emergency.label')
        </div>
    @endif

    <!-- Informazioni appuntamento -->
    <h2>@lang('pub_theme::appointment.report.sections.appointment_info')</h2>
    <table class="info">
        <tr>
            <td class="label">@lang('pub_theme::appointment.report.labels.date')</td>
            <td class="value">{{ $appointment->starts_at?->format('d/m/Y') }}</td>
            <td class="label">@lang('pub_theme::appointment.report.labels.time')</td>
            <td class="value">{{ $appointment->starts_at?->format('H:i') }} </td>
        </tr>

    </table>

    <!-- Informazioni paziente -->
    <h2>@lang('pub_theme::appointment.report.sections.patient_info')</h2>
    <table class="info">
        <tr>
            <td class="label">@lang('pub_theme::appointment.report.labels.full_name')</td>
            <td class="value">{{ $appointment->patient->full_name ?? 'N/A' }}</td>
        </tr>
        @if ($appointment->patient->email)
            <tr>
                <td class="label">@lang('pub_theme::appointment.report.labels.email')</td>
                <td class="value">{{ $appointment->patient->email }}</td>
            </tr>
        @endif
        @if ($appointment->patient->phone)
            <tr>
                <td class="label">@lang('pub_theme::appointment.report.labels.phone')</td>
                <td class="value">{{ $appointment->patient->phone }}</td>
            </tr>
        @endif
        @if ($appointment->patient->date_of_birth)
            <tr>
                <td class="label">@lang('pub_theme::appointment.report.labels.date_of_birth')</td>
                <td class="value">{{ $appointment->patient->date_of_birth->format('d/m/Y') }}</td>
            </tr>
        @endif
    </table>

    <!-- Informazioni medico -->
    <h2>@lang('pub_theme::appointment.report.sections.doctor_info')</h2>
    <table class="info">
        <tr>
            <td class="label">@lang('pub_theme::appointment.report.labels.full_name')</td>
            <td class="value">{{ $appointment->doctor->full_name ?? 'N/A' }}</td>
        </tr>
        @if ($appointment->doctor->email)
            <tr>
                <td class="label">@lang('pub_theme::appointment.report.labels.email')</td>
                <td class="value">{{ $appointment->doctor->email }}</td>
            </tr>
        @endif
        @if ($appointment->doctor->phone)
            <tr>
                <td class="label">@lang('pub_theme::appointment.report.labels.phone')</td>
                <td class="value">{{ $appointment->doctor->phone }}</td>
            </tr>
        @endif
        @if (isset($appointment->doctor->specialization))
            <tr>
                <td class="label">@lang('pub_theme::appointment.report.labels.specialization')</td>
                <td class="value">{{ $appointment->doctor->specialization }}</td>
            </tr>
        @endif
    </table>
    @if ($appointment->studio)
        <!-- Informazioni studio -->
        <div class="studio-box">
            <h3>@lang('pub_theme::appointment.report.sections.studio_info')</h3>
            <table class="info">
                <tr>
                    <td class="label">@lang('pub_theme::appointment.report.labels.studio_name')</td>
                    <td class="value">{{ $appointment->studio->name ?? 'N/A' }}</td>
                </tr>
                @if ($appointment->studio->full_address)
                    <tr>
                        <td class="label">@lang('pub_theme::appointment.report.labels.address')</td>
                        <td class="value">{{ $appointment->studio->full_address }}</td>
                    </tr>
                @endif
                @if ($appointment->studio->phone)
                    <tr>
                        <td class="label">@lang('pub_theme::appointment.report.labels.phone')</td>
                        <td class="value">{{ $appointment->studio->phone }}</td>
                    </tr>
                @endif
                @if ($appointment->studio->email)
                    <tr>
                        <td class="label">@lang('pub_theme::appointment.report.labels.email')</td>
                        <td class="value">{{ $appointment->studio->email }}</td>
                    </tr>
                @endif
            </table>
        </div>
    @endif
    <!-- Note appuntamento -->
    @if ($appointment->notes)
        <div class="notes-box">
            <h3>@lang('pub_theme::appointment.report.sections.notes')</h3>
            <p>{{ $appointment->notes }}</p>
        </div>
    @endif

    <!-- Referto medico -->
    @if ($appointment->report)


        <h1>@lang('pub_theme::appointment.report.sections.medical_report')</h1>

        <!-- Dolore a bocca o denti -->
        <div class="medical-item">
            <div class="medical-question">@lang('saluteora::report.fields.has_mouth_or_teeth_pain.label')</div>
            <div class="medical-answer">
                <span class="yes-no {{ $appointment->report->has_mouth_or_teeth_pain ? 'yes' : 'no' }}">
                    {{ $appointment->report->has_mouth_or_teeth_pain ? trans('pub_theme::common.yes') : trans('pub_theme::common.no') }}
                </span>
                @if ($appointment->report->has_mouth_or_teeth_pain && $appointment->report->mouth_teeth_pain_frequency)
                    <div class="detail-box">
                        <span class="detail-label">@lang('pub_theme::appointment.report.labels.frequency'):</span>
                        {{ $appointment->report->mouth_teeth_pain_frequency }}
                    </div>
                @endif
            </div>
        </div>

        <!-- Informazioni gravidanza -->
        @if ($appointment->report->pregnancy_month || $appointment->report->pregnancy_week)
            <div class="medical-item">
                <div class="medical-question">@lang('pub_theme::appointment.report.labels.pregnancy_info')</div>
                <div class="medical-answer">
                    @if ($appointment->report->pregnancy_month)
                        <div><span class="detail-label">@lang('pub_theme::appointment.report.labels.month'):</span>
                            {{ $appointment->report->pregnancy_month }}</div>
                    @endif
                    @if ($appointment->report->pregnancy_week)
                        <div><span class="detail-label">@lang('pub_theme::appointment.report.labels.week'):</span>
                            {{ $appointment->report->pregnancy_week }}</div>
                    @endif
                </div>
            </div>
        @endif

        <!-- Igiene dentale -->
        @if ($appointment->report->teeth_brushing_frequency)
            <div class="medical-item">
                <div class="medical-question">@lang('saluteora::report.fields.teeth_brushing_frequency.label')</div>
                <div class="medical-answer">{{ $appointment->report->teeth_brushing_frequency }}</div>
            </div>
        @endif

        <!-- Fumo -->
        <div class="medical-item">
            <div class="medical-question">@lang('saluteora::report.fields.smokes.label')</div>
            <div class="medical-answer">
                <span class="yes-no {{ $appointment->report->smokes ? 'yes' : 'no' }}">
                    {{ $appointment->report->smokes ? trans('pub_theme::common.yes') : trans('pub_theme::common.no') }}
                </span>
            </div>
        </div>

        <!-- Visite dentistiche annuali -->
        <div class="medical-item">
            <div class="medical-question">@lang('saluteora::report.fields.visits_dentist_yearly.label')</div>
            <div class="medical-answer">
                <span class="yes-no {{ $appointment->report->visits_dentist_yearly ? 'yes' : 'no' }}">
                    {{ $appointment->report->visits_dentist_yearly ? trans('pub_theme::common.yes') : trans('pub_theme::common.no') }}
                </span>
            </div>
        </div>

        <!-- Malattie -->
        <div class="medical-item">
            <div class="medical-question">@lang('saluteora::report.fields.has_diseases.label')</div>
            <div class="medical-answer">
                <span class="yes-no {{ $appointment->report->has_diseases ? 'yes' : 'no' }}">
                    {{ $appointment->report->has_diseases ? trans('pub_theme::common.yes') : trans('pub_theme::common.no') }}
                </span>
                @if ($appointment->report->has_diseases && $appointment->report->specify_diseases)
                    <div class="detail-box">
                        <span class="detail-label">@lang('pub_theme::appointment.report.labels.details'):</span>
                        {{ print_r($appointment->report->specify_diseases, true) }}
                    </div>
                @endif
            </div>
        </div>

        <!-- Regole alimentari -->
        <div class="medical-item">
            <div class="medical-question">@lang('saluteora::report.fields.follows_diet_rules.label')</div>
            <div class="medical-answer">
                <span class="yes-no {{ $appointment->report->follows_diet_rules ? 'yes' : 'no' }}">
                    {{ $appointment->report->follows_diet_rules ? trans('pub_theme::common.yes') : trans('pub_theme::common.no') }}
                </span>
            </div>
        </div>

        <!-- Utilizzo ASL -->
        <div class="medical-item">
            <div class="medical-question">@lang('saluteora::report.fields.uses_asl_clinic_for_dental_care.label')</div>
            <div class="medical-answer">
                <span class="yes-no {{ $appointment->report->uses_asl_clinic_for_dental_care ? 'yes' : 'no' }}">
                    {{ $appointment->report->uses_asl_clinic_for_dental_care ? trans('pub_theme::common.yes') : trans('pub_theme::common.no') }}
                </span>
            </div>
        </div>

        <!-- Denti mancanti -->
        <div class="medical-item">
            <div class="medical-question">@lang('saluteora::report.fields.missing_teeth.label')</div>
            <div class="medical-answer">
                <span class="yes-no {{ $appointment->report->missing_teeth ? 'yes' : 'no' }}">
                    {{ $appointment->report->missing_teeth ? trans('pub_theme::common.yes') : trans('pub_theme::common.no') }}
                </span>
                @if ($appointment->report->missing_teeth)
                    @if ($appointment->report->specify_missing_teeth)
                        <div class="detail-box">
                            <span class="detail-label">@lang('pub_theme::appointment.report.labels.specify'):</span>
                            {{ print_r($appointment->report->specify_missing_teeth, true) }}
                        </div>
                    @endif
                    @if ($appointment->report->more_info_missing_teeth)
                        <div class="detail-box">
                            <span class="detail-label">@lang('pub_theme::appointment.report.labels.additional_info'):</span>
                            {{ $appointment->report->more_info_missing_teeth }}
                        </div>
                    @endif
                @endif
            </div>
        </div>

        <!-- Denti cariati -->
        <div class="medical-item">
            <div class="medical-question">@lang('saluteora::report.fields.decayed_teeth.label')</div>
            <div class="medical-answer">
                <span class="yes-no {{ $appointment->report->decayed_teeth ? 'yes' : 'no' }}">
                    {{ $appointment->report->decayed_teeth ? trans('pub_theme::common.yes') : trans('pub_theme::common.no') }}
                </span>
                @if ($appointment->report->decayed_teeth)
                    @if ($appointment->report->specify_decayed_teeth)
                        <div class="detail-box">
                            <span class="detail-label">@lang('pub_theme::appointment.report.labels.specify'):</span>
                            {{ print_r($appointment->report->specify_decayed_teeth, true) }}
                        </div>
                    @endif
                    @if ($appointment->report->more_info_decayed_teeth)
                        <div class="detail-box">
                            <span class="detail-label">@lang('pub_theme::appointment.report.labels.additional_info'):</span>
                            {{ $appointment->report->more_info_decayed_teeth }}
                        </div>
                    @endif
                @endif
            </div>
        </div>

        <!-- Protesi o impianti -->
        <div class="medical-item">
            <div class="medical-question">@lang('saluteora::report.fields.has_fixed_prosthesis_or_implants.label')</div>
            <div class="medical-answer">
                <span class="yes-no {{ $appointment->report->has_fixed_prosthesis_or_implants ? 'yes' : 'no' }}">
                    {{ $appointment->report->has_fixed_prosthesis_or_implants ? trans('pub_theme::common.yes') : trans('pub_theme::common.no') }}
                </span>
                @if ($appointment->report->has_fixed_prosthesis_or_implants)
                    @if ($appointment->report->specify_prosthesis_or_implants)
                        <div class="detail-box">
                            <span class="detail-label">@lang('pub_theme::appointment.report.labels.specify'):</span>
                            {{ print_r($appointment->report->specify_prosthesis_or_implants, true) }}
                        </div>
                    @endif
                    @if ($appointment->report->more_info_prosthesis)
                        <div class="detail-box">
                            <span class="detail-label">@lang('pub_theme::appointment.report.labels.additional_info'):</span>
                            {{ $appointment->report->more_info_prosthesis }}
                        </div>
                    @endif
                @endif
            </div>
        </div>

        <!-- Tartaro -->
        <div class="medical-item">
            <div class="medical-question">@lang('saluteora::report.fields.has_tartar.label')</div>
            <div class="medical-answer">
                <span class="yes-no {{ $appointment->report->has_tartar ? 'yes' : 'no' }}">
                    {{ $appointment->report->has_tartar ? trans('pub_theme::common.yes') : trans('pub_theme::common.no') }}
                </span>
                @if ($appointment->report->has_tartar)
                    @if ($appointment->report->specify_tartar)
                        <div class="detail-box">
                            <span class="detail-label">@lang('pub_theme::appointment.report.labels.specify'):</span>
                            {{ print_r($appointment->report->specify_tartar, true) }}
                        </div>
                    @endif
                    @if ($appointment->report->more_info_tartar)
                        <div class="detail-box">
                            <span class="detail-label">@lang('pub_theme::appointment.report.labels.additional_info'):</span>
                            {{ $appointment->report->more_info_tartar }}
                        </div>
                    @endif
                @endif
            </div>
        </div>

        <!-- Placca -->
        <div class="medical-item">
            <div class="medical-question">@lang('saluteora::report.fields.has_plaque.label')</div>
            <div class="medical-answer">
                <span class="yes-no {{ $appointment->report->has_plaque ? 'yes' : 'no' }}">
                    {{ $appointment->report->has_plaque ? trans('pub_theme::common.yes') : trans('pub_theme::common.no') }}
                </span>
                @if ($appointment->report->has_plaque)
                    @if ($appointment->report->specify_plaque)
                        <div class="detail-box">
                            <span class="detail-label">@lang('pub_theme::appointment.report.labels.specify'):</span>
                            {{ print_r($appointment->report->specify_plaque, true) }}
                        </div>
                    @endif
                    @if ($appointment->report->more_info_plaque)
                        <div class="detail-box">
                            <span class="detail-label">@lang('pub_theme::appointment.report.labels.additional_info'):</span>
                            {{ $appointment->report->more_info_plaque }}
                        </div>
                    @endif
                @endif
            </div>
        </div>

        <!-- Cure odontoiatriche aggiuntive -->
        @if ($appointment->report->needs_more_dental_care !== null)
            <div class="medical-item">
                <div class="medical-question">@lang('saluteora::report.fields.needs_more_dental_care.label')</div>
                <div class="medical-answer">
                    <span class="yes-no {{ $appointment->report->needs_more_dental_care ? 'yes' : 'no' }}">
                        {{ $appointment->report->needs_more_dental_care ? trans('pub_theme::common.yes') : trans('pub_theme::common.no') }}
                    </span>
                </div>
            </div>
        @endif

        <!-- Note aggiuntive -->
        @if ($appointment->report->further_notes)
            <div class="medical-item">
                <div class="medical-question">@lang('saluteora::report.fields.further_notes.label')</div>
                <div class="medical-answer">
                    <div class="detail-box">{{ $appointment->report->further_notes }}</div>
                </div>
            </div>
        @endif
    @endif

</page>
