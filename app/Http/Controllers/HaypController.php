<?php

namespace App\Http\Controllers;

use App\HaypItems as Item;
use App\Jobs\CalculateProfit;
use App\UsersItems;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HaypController extends Controller
{
    /**
     * only registred users can by or see hayp program
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * show index page of hayps
     * @return [type] [description]
     */
    public function showIndex()
    {
        $items = DB::table('hayp_items')->get();
        return view('hayp.index', [
            'items' => $items,
        ]);
    }

    /**
     * User by item. It save to database
     * @param  integer $id items id
     * @return redirect     redirects user back
     */
    public function buyItem($id)
    {
        //registred user by
        $user_id     = Auth::user()->id;
        $items_price = DB::table("hayp_items")->where('id', $id)->get()[0]->price;

        if (Auth::user()->money < $items_price) {
            return redirect()->back();
        }

        if (DB::table('users_items')->where([['user_id', $user_id], ['item_id', $id]])->count() === 0) {
            $usersItem          = new UsersItems();
            $usersItem->user_id = $user_id;
            $usersItem->item_id = $id;
            $usersItem->save();
        } else {
            $c = DB::table('users_items')->where([['user_id', $user_id], ['item_id', $id]])->get()[0]->count;
            // dd($c);

            DB::table('users_items')->where([['user_id', $user_id], ['item_id', $id]])->update(['count' => ++$c]);
        }

        DB::table("users")->where('id', Auth::user()->id)->update(['money' => Auth::user()->money - $items_price]);

        return redirect()->back();
    }

    public function showMyHayp()
    {
        //array of items to display in blade template
        $items = [];
        //in `users_items` table i store only ids. I need values
        $items_list = DB::table("users_items")->where('user_id', Auth::user()->id)->get();



        foreach ($items_list as $i) {
            $item    = DB::table('hayp_items')->where('id', $i->item_id)->get()[0];
            $items[] = $item;
        }
        // $total_count = $this->totalCountItems($items_list);

        return view('hayp.my', [
            'items' => $items_list,
          ]);

    }

    /**
     * let see all users items
     * @return [type] [description]
     */
    public function showUsersItems()
    {
        //array of items to display in blade template
        $items = [];
        //in `users_items` table i store only ids. I need values
        $items_list = DB::table("users_items")->where('user_id', Auth::user()->id)->get();
        foreach ($items_list as $i) {
            $item    = DB::table('items')->where('id', $i->item_id)->get()[0];
            $items[] = $item;
        }
        return view("base_site.items-users", [
            'items' => $items,
        ]);
    }

    /**
     * items in one time steps make money. Demo function to calculate profit.
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function toWork($id)
    {
        $date = Carbon::now()->addMinutes(60);
        Queue::later($date, new CalculateProfit(Auth::user()->id, $id));

        return redirect()->back();
    }

    // ---------------------
    // HELPERS
    // ---------------------

    public function totalCountItems($items)
    {
        $count = 0;
        foreach ($items as $item) {
          dd($items);
            $count += $item->count;
        }
        return $count;
    }
}
