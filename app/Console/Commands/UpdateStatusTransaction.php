<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Helpers\MailHelper;

class UpdateStatusTransaction extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'UpdateStatusTransaction:updatestatustransaction';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update status transaction';

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
        //
        $currentDate = \Carbon\Carbon::now();
        $dataSendMai = \DB::table('transaction')->where('status', 4)->where('delivery_date',  '>', $currentDate)->get();

        if($dataSendMai) {
            \DB::table('transaction')->where('status', 4)->where('delivery_date' , '>', $currentDate)->update(['status' => 5]);
            foreach($dataSendMai as $mail)
            {
                MailHelper::sendMail($mail);
            }
        } else {

            $this->info('Không tồn tại đơn hàng nào phù hợp!');
        }
    }
}
