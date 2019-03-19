<?php

namespace App\Jobs\User;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Repositories\Contracts\User\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class CreateUser implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Array $jobData)
    {
        //
        $this->jobData = $jobData;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(UserRepositoryInterface $userRepo)
    {
        //Checking for Specific pre-conditions 
        //$this->verifyCompliance();

        return $userRepo->store([
            'name' => $this->jobData['name'],
            'email' => $this->jobData['email'],
            'password' => Hash::make($this->jobData['password'])
        ]);
    }
}
