<?php

namespace App\Actions;

class EmailFilterAction
{
    /**
     * Method that handles the filtering of classified words given in an array
     */
    public static function handle(array $classifiedWords, string $emailBody): array
    {
        $tempEmail = $emailBody; // Pass original e-mail to a variable for comparison.
        foreach ($classifiedWords as $word) {
            if ($word != '' && $word != null) { // No empty string and null values accepted.
                $emailBody = preg_replace('/\s'.$word.'[\s\,\.\?\!]/', '*****', $emailBody);
                // Replace classified words with asterisk using regular expression.
            }
        }

        return [
            'has_classified_words' => ($tempEmail != $emailBody), // Flag the email as classified of there is changes from the original email.
            'email' => $emailBody, // This is a filtered email
        ];
    }
}
