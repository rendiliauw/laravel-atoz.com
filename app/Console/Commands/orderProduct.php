<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Order;

class orderProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'order:product';

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
     * @return mixed
     */
    public function handle()
    {

       DB::table('orders')->where('status','=','UNPAID')->update(['status' => 'CANCELED']);


       
        
        // $order = Order::where('status','=','UNPAID')->all();

        // $awal= date_create($order->created_at);
        // $akhir= date_create('');
        // $diff = date_diff($awal,$akhir);
        // $task = $diff->format('%i');

        // if($task > 1){

        //     $order = Order::all();
        //     $order->status = 'CANCELED';
        //     $order->update();



        // }



    }
}
