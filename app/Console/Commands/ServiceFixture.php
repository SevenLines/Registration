<?php

namespace App\Console\Commands;

use App\Service;
use App\SubService;
use Illuminate\Console\Command;

class ServiceFixture extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'custom:service_create {m_command} {alias}';

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

    public function _create() {
        $services = json_decode( file_get_contents("services.json"), true);
        foreach($services as $key => $value) {
            $service = new Service;
            $service->title = $value['title'];
            $service->alias = $value['alias'];
            $service->image = $value['image'];
            $service->description = '';
            $service->save();

            foreach($value['services'] as $sub) {
                $subService = new SubService;
                $subService->title = $sub['title'];
                $subService->price = $sub['price'];
                $subService->service_id = $service->id;
                $subService->documents = join(';', $sub['documents']);
                $subService->save();
            }
        }
    }

    public function _show($alias) {
        $info = Service::whereAlias($alias)->with("subServices")->first();
        foreach ($info->subServices as $s) {
            $this->info($s->title);
        }
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $command = $this->argument("m_command");
        $alias = $this->argument("alias");

        switch ($command) {
            case "create": return $this->_create(); break;
            case "show": return $this->_show($alias); break;
        }
    }
}
