<?php

namespace App\Jobs\User;

use App\Model\User;
use App\Repositories\Contracts\User\UserRepositoryInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateUser implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user, Array $jobData)
    {
        //
        $this->user = $user;
        $this->jobData = $jobData;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(UserRepositoryInterface $userRepo)
    {
        
        $userRepo->update($this->user["id"],[
            'name' => $this->jobData["name"],
            'email' => $this->jobData["email"]
        ]);

        return $userRepo->find($this->user["id"]);
    }
}
