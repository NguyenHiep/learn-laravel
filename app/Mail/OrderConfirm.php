<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Model\Orders;

class OrderConfirm extends Mailable
{
    use Queueable, SerializesModels;
    
    protected  $order;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Orders $order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.orders.confirm')->with(['order' => $this->order]);
    }
}
