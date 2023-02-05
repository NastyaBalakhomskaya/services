<?php

namespace App\Jobs;

use App\Mail\EditDataOrder;
use App\Models\Order;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class EditDataOrderEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Order $order): void
    {
        $users = User::all();
        foreach ($users as $user) {
            if ($order->user_id !== $user->id) {
                Mail::to($user->email)->send(new EditDataOrder($order));
            }
        }
    }
}
