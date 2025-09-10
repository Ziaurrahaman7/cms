<?php

namespace App\Http\Controllers;

use App\Models\ContactForm;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'company' => 'nullable|string|max:255',
            'service' => 'nullable|string|max:255',
            'message' => 'required|string|max:2000',
        ]);

        $contact = ContactForm::create($request->all());

        // Send email notification
        try {
            $adminEmail = \App\Models\SiteSetting::get('contact_email', 'admin@example.com');
            
            Mail::send('emails.contact-form', ['contact' => $contact], function ($message) use ($adminEmail, $contact) {
                $message->to($adminEmail)
                        ->subject('New Contact Form Submission - ' . $contact->name)
                        ->replyTo($contact->email, $contact->name);
            });
        } catch (\Exception $e) {
            // Log error but don't fail the form submission
            \Log::error('Failed to send contact email: ' . $e->getMessage());
        }

        return back()->with('success', 'Thank you for your message! We will get back to you soon.');
    }
}