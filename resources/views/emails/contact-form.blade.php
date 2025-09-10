<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Contact Form Submission</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: linear-gradient(45deg, #667eea, #764ba2); color: white; padding: 20px; text-align: center; }
        .content { background: #f9f9f9; padding: 20px; }
        .field { margin-bottom: 15px; }
        .label { font-weight: bold; color: #555; }
        .value { margin-top: 5px; }
        .footer { text-align: center; padding: 20px; color: #666; font-size: 12px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>New Contact Form Submission</h2>
        </div>
        
        <div class="content">
            <div class="field">
                <div class="label">Name:</div>
                <div class="value">{{ $contact->name }}</div>
            </div>
            
            <div class="field">
                <div class="label">Email:</div>
                <div class="value">{{ $contact->email }}</div>
            </div>
            
            @if($contact->phone)
            <div class="field">
                <div class="label">Phone:</div>
                <div class="value">{{ $contact->phone }}</div>
            </div>
            @endif
            
            @if($contact->company)
            <div class="field">
                <div class="label">Company:</div>
                <div class="value">{{ $contact->company }}</div>
            </div>
            @endif
            
            @if($contact->service)
            <div class="field">
                <div class="label">Service Interested In:</div>
                <div class="value">{{ $contact->service }}</div>
            </div>
            @endif
            
            <div class="field">
                <div class="label">Message:</div>
                <div class="value">{{ $contact->message }}</div>
            </div>
            
            <div class="field">
                <div class="label">Submitted At:</div>
                <div class="value">{{ $contact->created_at->format('F j, Y g:i A') }}</div>
            </div>
        </div>
        
        <div class="footer">
            <p>This email was sent from your website contact form.</p>
            <p>You can reply directly to this email to respond to {{ $contact->name }}.</p>
        </div>
    </div>
</body>
</html>