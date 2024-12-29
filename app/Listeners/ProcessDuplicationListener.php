<?php

namespace App\Listeners;

use App\Events\ProcessDuplicationEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Console\Output\OutputInterface;

class ProcessDuplicationListener
{
    /**
     * Create the event listener.
     */
    public function __construct(){}

    /**
     * Handle the event.
     */
    public function handle(ProcessDuplicationEvent $event): void
    {

        $nodeId = $event->getNodeId();
        // register the log of node
        Log::channel('duplication')->info('Node duplicated successfully', [
            'node_id' => $nodeId,
            'timestamp' => now(),
        ]);
    }
}
