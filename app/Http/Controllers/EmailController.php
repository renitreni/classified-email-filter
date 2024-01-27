<?php

namespace App\Http\Controllers;

use App\Actions\EmailFilterAction;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function index()
    {
        return view('email', ['cleanedEmail' => '', 'hasClassifiedWords' => '']);
    }

    public function clean(Request $request)
    {
        $classified = explode(',', $request->input('classified'));

        $cleanedEmail = EmailFilterAction::handle($classified, $request->input('email'));

        return view('email', [
            'cleanedEmail' => $cleanedEmail['email'],
            'hasClassifiedWords' => $cleanedEmail['has_classified_words'],
        ]);
    }
}
