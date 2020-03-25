<?php


namespace App\Console\Commands;


use App\Entities\Symbol;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;

class SymbolCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:symbol';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Popula a base de respostas';

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
     * @param \App\DripEmailer $drip
     * @return mixed
     */

    public function handle()
    {

        $symbols = json_decode(file_get_contents(env('APP_URL') . "/results.json"), true);
        $model = new Symbol();
        Symbol\Data::truncate();
        $model->data()->truncate();
        $model->truncate();
        foreach ($symbols as $symbol => $data) {

            $dbSymbol = $model->create(['name' => $symbol]);
            $this->info('Criado objeto: ' . $symbol);
            $this->table(['white', 'grey', 'black', 'width', 'height'], $data);
            foreach($data as $value){
                $dbSymbol->data()->create($value);
            }


        }
    }
}
