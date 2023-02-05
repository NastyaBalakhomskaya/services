<?php

namespace App\Console\Commands;

use App\Mail\EmailConfirm;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class NotifyVerificationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:notify-verification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notify Verification User';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::query()->whereNull('email_verified_at')->all();

        if (! $users->count()) {
            $this->warn('Verified users');

            return self::FAILURE;
        }

        foreach ($users as $user) {
            Mail::to($user->email)->send(new EmailConfirm($user));
        }
        $this->info('Successfully sent');

        return $this::SUCCESS;
    }
}
