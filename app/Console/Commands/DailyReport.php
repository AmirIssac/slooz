<?php

namespace App\Console\Commands;

use App\DayReport;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;


class DailyReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:daily-report';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create report to daily payments';

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
        /*
        // init the report first to get the id of report
        $report = new DayReport();
        $report->save();
        $orders = DB::table('orders')->where('order_status_id','5')->where('takedByDailyReport' ,'0')->get();   // 5 for delievered oreder
            if($orders){  // found it 
                            DB::table('orders')->where('order_status_id','5')->where('takedByDailyReport' ,'0')
                            ->update(['daily_report_id'=>$report->id,'takedByDailyReport' => '1']);
                         }
                         */

                         // init the report first to get the id of report
                        $report = new DayReport();
                        $report->save();
                        $payments = DB::table('payments')->where('status' , 'Paid')->where('taked_by_daily_report' ,'0')->get();
                        if($payments){
                            DB::table('payments')->where('status' , 'Paid')->where('taked_by_daily_report' ,'0')->update(['day_report_id'=>$report->id,'taked_by_daily_report'=>'1']);
                        }
                    }
                
    }

