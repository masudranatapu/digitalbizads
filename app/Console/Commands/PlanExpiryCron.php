<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class PlanExpiryCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'expiry:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Dates
        $currentDate = Carbon::now();
        $expiryDate = Carbon::now()->addDays(7);

        // Get expiry customers
        $users = DB::table('users')->where('status', 1)->whereBetween('plan_validity', [$currentDate, $expiryDate])->get();

        // Check customers
        if ($users != null) {
            for ($i = 0; $i < count($users); $i++) {

                // Email message
                $details = [
                    'name' => $users[$i]->name,
                    'email' => $users[$i]->email,
                ];

                // Send email
                $mail = false;
                try {
                    Mail::to($users[$i]->email)->send(new \App\Mail\ExpiryPlanMail($details));
                    $mail = true;
                } catch (\Exception $e) {
                }

                $this->info('Email sent to All Users');
            }
        }
    }
}
