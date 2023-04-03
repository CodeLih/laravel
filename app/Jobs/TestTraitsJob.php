<?php

namespace App\Job;

use App\Http\Traits\Dog;
use Illuminate\Console\Command;

class TestTraitsJob extends Command
{
    public function __construct()
    {
        parent::__construct();

    }

    use Dog;
    public function say() {
        echo "this is testtraitsjob";
    }

    public function handle()
    {
        $this->say();
        $this->eat();

    }

}
