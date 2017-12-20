<?php

namespace SouthernIns\Laravel\ArtisanCommands;

use Illuminate\Console\Command;

class UnserializeJson extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'unserialize:json {file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'unserialize Seralized json string in a given file';

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
    public function handle() {
        //
        $file = $this->argument( 'file' );

        $str = file_get_contents(  $file );
//        echo $str;

        $data = unserialize( $str );

//        echo  json_encode( $data );

        file_put_contents( "jsondata.json", json_encode( $data ) );


    }


}
