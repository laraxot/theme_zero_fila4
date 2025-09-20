<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Limesurvey\Models\LimeSurvey;

class LimeSurveyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = LimeSurvey::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'owner_id' => $this->faker->randomNumber(5, false),
            'gsid' => $this->faker->randomNumber(5, false),
            'admin' => $this->faker->word,
            'active' => $this->faker->word,
            'expires' => $this->faker->dateTime,
            'startdate' => $this->faker->dateTime,
            'adminemail' => $this->faker->word,
            'anonymized' => $this->faker->word,
            'faxto' => $this->faker->word,
            'format' => $this->faker->format,
            'savetimings' => $this->faker->word,
            'template' => $this->faker->word,
            'language' => $this->faker->word,
            'additional_languages' => $this->faker->word,
            'datestamp' => $this->faker->word,
            'usecookie' => $this->faker->word,
            'allowregister' => $this->faker->word,
            'allowsave' => $this->faker->word,
            'autonumber_start' => $this->faker->randomNumber(5, false),
            'autoredirect' => $this->faker->word,
            'allowprev' => $this->faker->word,
            'printanswers' => $this->faker->word,
            'ipaddr' => $this->faker->word,
            'refurl' => $this->faker->word,
            'datecreated' => $this->faker->dateTime,
            'showsurveypolicynotice' => $this->faker->randomNumber(5, false),
            'publicstatistics' => $this->faker->word,
            'publicgraphs' => $this->faker->word,
            'listpublic' => $this->faker->word,
            'htmlemail' => $this->faker->word,
            'sendconfirmation' => $this->faker->word,
            'tokenanswerspersistence' => $this->faker->word,
            'assessments' => $this->faker->word,
            'usecaptcha' => $this->faker->word,
            'usetokens' => $this->faker->word,
            'bounce_email' => $this->faker->word,
            'attributedescriptions' => $this->faker->text,
            'emailresponseto' => $this->faker->text,
            'emailnotificationto' => $this->faker->text,
            'tokenlength' => $this->faker->randomNumber(5, false),
            'showxquestions' => $this->faker->word,
            'showgroupinfo' => $this->faker->word,
            'shownoanswer' => $this->faker->word,
            'showqnumcode' => $this->faker->word,
            'bouncetime' => $this->faker->randomNumber(5, false),
            'bounceprocessing' => $this->faker->word,
            'bounceaccounttype' => $this->faker->word,
            'bounceaccounthost' => $this->faker->word,
            'bounceaccountpass' => $this->faker->word,
            'bounceaccountencryption' => $this->faker->word,
            'bounceaccountuser' => $this->faker->word,
            'showwelcome' => $this->faker->word,
            'showprogress' => $this->faker->word,
            'questionindex' => $this->faker->randomNumber(5, false),
            'navigationdelay' => $this->faker->randomNumber(5, false),
            'nokeyboard' => $this->faker->word,
            'alloweditaftercompletion' => $this->faker->word,
            'googleanalyticsstyle' => $this->faker->word,
            'googleanalyticsapikey' => $this->faker->word,
        ];
    }
}
