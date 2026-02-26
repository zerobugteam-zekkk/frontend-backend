<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ChatMessage;

class CleanOldChats extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clean:old-chats';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Hapus chat yang lebih lama dari 24 jam';

    /**
     * Execute the console command.
     */
    public function handle()
    {
         $deleted = ChatMessage::where('created_at', '<', now()->subHours(24))->delete();

        $this->info("Berhasil menghapus {$deleted} chat lama.");
        //
    }
}
