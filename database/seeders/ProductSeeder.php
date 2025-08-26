<?php

	namespace Database\Seeders;

	use Illuminate\Database\Seeder;
	use Illuminate\Support\Facades\DB;

	class ProductSeeder extends Seeder
	{
		public function run(): void
		{
			DB::table('products')->insert([
				[
					'title' => 'Laptop Dell XPS 13',
					'description' => 'Компактный ноутбук для работы и учебы.',
					'image' => 'https://via.placeholder.com/150',
					'created_at' => now(),
					'updated_at' => now(),
				],
				[
					'title' => 'iPhone 15 Pro',
					'description' => 'Смартфон с камерой профессионального уровня.',
					'image' => 'https://via.placeholder.com/150',
					'created_at' => now(),
					'updated_at' => now(),
				],
				[
					'title' => 'Sony WH-1000XM5',
					'description' => 'Наушники с шумоподавлением.',
					'image' => 'https://via.placeholder.com/150',
					'created_at' => now(),
					'updated_at' => now(),
				],
			]);
		}
	}
