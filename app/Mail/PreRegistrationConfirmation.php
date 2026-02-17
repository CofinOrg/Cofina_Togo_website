<?php

namespace App\Mail;

use App\Models\PreRegistration;
use App\Models\ServiceProduct;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PreRegistrationConfirmation extends Mailable
{
    use SerializesModels;

    public PreRegistration $preRegistration;
    public ?ServiceProduct $product;

    /**
     * Create a new message instance.
     */
    public function __construct(PreRegistration $preRegistration)
    {
        $this->preRegistration = $preRegistration;
        $this->product = $preRegistration->product;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Confirmation de votre pré-inscription - COFINA Togo',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.pre-registration-confirmation',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
