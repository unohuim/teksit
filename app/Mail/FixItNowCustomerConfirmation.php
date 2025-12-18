<?php

namespace App\Mail;

use App\Models\ServiceRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;

class FixItNowCustomerConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public ServiceRequest $serviceRequest)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Fix request received — we’re on it',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.fix-now.customer-confirmation',
            with: [
                'serviceRequest' => $this->serviceRequest,
                'firstName' => Str::of($this->serviceRequest->name)->before(' '),
            ],
        );
    }
}
