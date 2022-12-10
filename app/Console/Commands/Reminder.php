<?php

namespace App\Console\Commands;

use App\Enums\Clubs;
use App\Models\Attender;
use App\Models\User;
use App\Services\SmsService;
use Illuminate\Console\Command;

class Reminder extends Command
{

    private $smsService;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reminder';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(SmsService $smsService)
    {
        parent::__construct();
        $this->smsService = $smsService;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Reminder started');

        $users = User::doesntHave('attender')->get();
        $message = 'Son 5 kisilik kontenjanımız kalmistir! Kuzeyde Yariyil Degerlendirme Zirvesinde bizimle olmak icin cok gec olmadan kaydini yaptir. kuzeydeyariyil.com.tr';

        foreach ($users as $user) {
            $this->smsService->send($user->mobile , $message);
            $this->info(sprintf('Phone: %s, Message: %s', $user->mobile, $message));
        }

        return 0;
    }
}
