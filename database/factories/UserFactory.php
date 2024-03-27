<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', // 12345656
            'remember_token' => Str::random(10),
            'role_id' => Role::where('name', 'user')->first()->id,
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (User $user) {
            // Tạo một số dữ liệu giả cho Role
            $roles = ['admin', 'editor', 'viewer'];

            foreach ($roles as $roleName) {
                Role::factory()->create(['name' => $roleName]);
            }

            // Cập nhật role_id cho User
            $randomRoleId = Role::where('name', 'user')->first()->id;
            $user->update(['role_id' => $randomRoleId]);
        });
    }

    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}