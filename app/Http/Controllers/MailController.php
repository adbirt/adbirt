<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;

class MailController extends Controller
{

    // var ?string $adminEmail = 'info@adbirt.com';
    var ?string $adminEmail = 'danroyaleffiong@gmail.com';

    public function __construct()
    {
    }

    public function handleContactForm(Request $req)
    {
        $input = $req->all();

        if (isset($input['_token'])) {
            unset($input['_token']);
        }

        $fromName = $input['fromName'];
        $fromEmail = $this->adminEmail;
        $toEmail = $input['toEmail'];
        $subject = $input['subject'];
        $body = $input['body'];

        return $this->sendMail($fromName, $fromEmail, $toEmail, $subject, $body);
    }

    public function sendMail(string $fromEmail, string $fromName, string $toEmail, string $subject, string $body)
    {

        try {
            if (isset($fromEmail) && isset($fromName) && isset($toEmail) && isset($subject) && isset($body)) {
                $data['heading'] = $subject;
                $data['TextToClient'] = $body;

                Mail::send('email.mail', $data, function ($message) use ($toEmail, $subject, $fromName, $fromEmail) {
                    $message->from($fromEmail ?? $this->adminEmail, $fromName);
                    $message->to($toEmail)->subject($subject);
                });

                return response()->json(['status' => 200, 'message' => 'Mail sent successfully']);
            }

            return response()->json(['status' => 400, 'message' => 'Missing parameters']);
        } catch (\Throwable $th) {
            return response()->json(['status' => 500, 'message' => "An error occurred: {$th->getMessage()}"]);
        }
    }
}
