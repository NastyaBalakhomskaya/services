<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EditDataOrder extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(private Order $order)
    {
        //
    }

    public function build()
    {
        return $this->subject('Order edit')
            ->view('emails.edit_order', ['title' => $this->order->title]);
    }
}
