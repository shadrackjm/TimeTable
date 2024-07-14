<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VenueMail extends Mailable
{
    use Queueable, SerializesModels;

    public $venue;
    public $type;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($venue, $type)
    {
        $this->venue = $venue;
        $this->type = $type;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Venue Notification')
                    ->markdown('emails.venue')
                    ->with([
                        'venue' => $this->venue,
                        'type' => $this->type
                    ]);
    }
}
