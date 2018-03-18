<?php

namespace GiapHiep\Productcrud\Commands;

use Illuminate\Console\Command;
use Artisan;

class ProductcrudInstall extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'productcrud:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Product CRUD demo';

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
    	if ($this->confirm('Do you want to install it?', false)) {
            Artisan::call('vendor:publish',['--tag' => 'productcrud_migrations']);
	    	Artisan::call('vendor:publish',['--tag' => 'productcrud_views']);
	    	Artisan::call('migrate');

	    	$this->displayOutput();
        }
    	

    }

    protected function displayOutput()
    {
 		
        $message = [
            "=========================================================",
            "  ________.__                  ___ ___ .__               ",
            " /  _____/|__|____  ______    /   |   \|__| ____ ______  ",
            "/   \  ___|  \__  \ \____ \  /    ~    \  |/ __ \\____ \ ",
            "\    \_\  \  |/ __ \|  |_> > \    Y    /  \  ___/|  |_> >",
            " \______  /__(____  /   __/   \___|_  /|__|\___  >   __/ ",
            "        \/        \/|__|            \/         \/|__|    ",
            "                                                         ",
            "================ INSTALLATION COMPLETE ==================",
        ];
        $this->line($message);
    }
}
