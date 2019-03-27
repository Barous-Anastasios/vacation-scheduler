<?php

use App\Status;
use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = ['pending', 'approved', 'rejected'];
        foreach ($statuses as $s)
        {
            $status = new Status;
            $status->name = $s;
            $status->save();
        }
    }
}
