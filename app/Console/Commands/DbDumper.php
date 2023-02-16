<?php

namespace App\Console\Commands;

use App\Classes\DumpDatabase;
use Illuminate\Console\Command;

class DbDumper extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dumper:db {user} {password} {db} {external} {type=0} {host?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Backup and restore database';

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
     * @return int
     */
    public function handle()
    {
        $arguments = $this->arguments();
        $dumper = new DumpDatabase($arguments['user'], $arguments['db'], $arguments['password'], (int) $arguments['type']);
        $dumper->externalDbFileDirectory = $arguments['external'];

        if ($arguments['host']) {
            $dumper->hostName = $arguments['host'];
        }

        $dumper->execute();
    }
}
