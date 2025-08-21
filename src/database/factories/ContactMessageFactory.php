<?php

namespace Database\Factories;

use App\Models\ContactMessage;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactMessageFactory extends Factory

{
/**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
protected $model = ContactMessage::class;




    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'last_name' => $this->faker->lastName,
            'first_name' => $this->faker->firstName,
            'gender' => $this->faker->randomElement(['male', 'female']),
            'email' => $this->faker->safeEmail,
            'tel' => $this->faker->numerify('0#########'),  // 電話番号例
            'address' => $this->faker->address,
            'type' => Category::inRandomOrder()->first()->id,
            'message' => $this->faker->text(120),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
