<?php

namespace Database\Seeders\Seeder;

use Illuminate\Database\Seeder;
use App\Models\User as UserModel;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class User extends Seeder
{
    /**
     * Seed the app's database with the default user
     */
    public function run(): void
    {
        try {
            UserModel::factory()->default()->create();
        } catch (QueryException $exception) {
            Log::error(
                'Error during seeding with the default user',
                [
                    'message' => $exception->getMessage(),
                ]
            );
        }
    }
}
