<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\SystemSettingModel;

class OrderStatusMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $setting;

    /**
     * Create a new message instance.
     */
    public function __construct($order)
    {
        $this->order = $order; 
        $this->setting = SystemSettingModel::getSingle(); 
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->setting->website_name.'Order Status',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
           markdown: 'emails.order_status',
           with: [
                'order' => $this->order,
           ],
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        return [];
    }
}
