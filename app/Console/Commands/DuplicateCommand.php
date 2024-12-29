<?php

namespace App\Console\Commands;

use App\Jobs\DuplicateNodeJob;
use App\Models\Node;
use Exception;
use Illuminate\Console\Command;

class DuplicateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:duplicate {rootNode}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->info('Starting the duplication');
        $rootId = $this->argument('rootNode');

        try {
            $nodeRoot = Node::findOrFail($rootId);

            // Dispatch the root duplication job
            DuplicateNodeJob::dispatch($nodeRoot, $nodeRoot->parent_id);
            $this->info('Duplication job enqueued');
        } catch (Exception $e) {
            $this->info($e->getMessage());
        }
    }
}
