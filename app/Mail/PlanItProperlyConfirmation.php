<?php

namespace App\Mail;

use App\Models\ServiceRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;

class PlanItProperlyConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public ServiceRequest $serviceRequest)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Plan It Properly request received',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.plan-properly.confirmation',
            with: [
                'serviceRequest' => $this->serviceRequest,
                'firstName' => Str::of($this->serviceRequest->name)->before(' '),
            ],
        );
    }
}
