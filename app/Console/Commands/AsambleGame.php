<?php

namespace App\Console\Commands;

use App\Enums\Clubs;
use App\Models\Attender;
use App\Models\User;
use App\Services\SmsService;
use Illuminate\Console\Command;

class AsambleGame extends Command
{

    private $smsService;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'game:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run the Asamble Game';

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
        $this->info('Game started.');

        // Toplamda en yüksek katılımcısı olan külüp bul.
        // attenderstan bul.

        $clubs = Attender::all()->countBy('club')->sort()->reverse()->take(5);
        $allClubs = Clubs::getClubs();
        unset($allClubs[1]);
        $clubMessages = [];

        foreach ($clubs as $clubId => $attenderCount) {
            $clubMessages[] = sprintf('%s (%s)', $allClubs[$clubId], $attenderCount);
        }

        $clubMessages = sprintf('En çok katılım gösteren kulüpler:\n%s', implode('\n', $clubMessages));
        $users = User::all();



        foreach ($users as $user) {
            $this->smsService->send($user->mobile , $clubMessages);
            $this->info(sprintf('Phone: %s, Message: %s', $user->mobile, $clubMessages));
        }

        return 0;
    }
}
