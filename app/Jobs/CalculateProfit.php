<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CalculateProfit implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    private $user_id;
    private $item_id;
    private $count;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user_id, $item_id, $count)
    {
        $this->user_id = $user_id;
        $this->item_id = $item_id;
        $this->count   = $count;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $users_money = DB::table('users')->where('id', $this->user_id)->get()[0]->money;

        $items_profit = DB::table("hayp_items")->where("id", $this->item_id)->get()[0]->profit_pro_hour;
        for ($i = 0; $i < $count; $i++) {
            DB::table("users")->where("id", $this->user_id)->update(["money" => $users_money + $items_profit]);
        }
    }
}
