<?php

namespace Tests\Unit;

use App\Actions\EmailFilterAction;
use PHPUnit\Framework\TestCase;

class ClassifiedEmailTest extends TestCase
{
    /**
     * @dataProvider dataset
     */
    public function test_can_replace_classified_words_with_asterisk($email, $classifiedWords, $expectedFlag): void
    {
        $cleanedEmail = EmailFilterAction::handle($classifiedWords, $email);

        $this->assertEquals($cleanedEmail['has_classified_words'], $expectedFlag);
    }

    public static function dataset()
    {
        $paragraph = 'In the quaint town of Willowbrook, nestled amidst rolling hills and whispering forests, there stood an old, forgotten mansion. Its stone walls held secrets of a bygone era, and its towering turrets seemed to reach for the heavens, as if longing to touch the stars.

        Legend had it that the mansion once belonged to the illustrious Montgomery family, known for their wealth and extravagance. But as time passed, the family faded into obscurity, and the mansion fell into disrepair, its once-grand halls now shrouded in shadows.';

        return [
            [
                $paragraph,
                ['forgotten mansion'],
                true
            ],
            [
                $paragraph,
                [' forgotten mansion'],
                true
            ],
            [
                $paragraph,
                ['In the quaint town of Willowbrook'],
                true
            ],
            [
                $paragraph,
                ['whispering forests'],
                true,
            ],
            [
                $paragraph,
                ['Willowbrook, nestled'],
                true
            ],
            [
                $paragraph,
                ['Willowbrook,'],
                false
            ],
            [
                $paragraph,
                ['fine'],
                false,
            ],
            [
                $paragraph,
                ['lus', 'roll', '', null, 'ed am'],
                false,
            ],
        ];
    }
}
