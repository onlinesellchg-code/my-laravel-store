<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'هدفون بی‌سیم مدل Pro X',
                'slug' => 'wireless-headphone-pro-x',
                'description' => 'هدفون بی‌سیم با کیفیت صدای مناسب.',
                'category' => 'دیجیتال',
                'emoji' => '🎧',
                'price' => 2450000,
                'old_price' => 2890000,
                'stock' => 15,
                'is_active' => true,
            ],
            [
                'name' => 'ساعت هوشمند سری 5',
                'slug' => 'smart-watch-series-5',
                'description' => 'ساعت هوشمند مناسب استفاده روزمره.',
                'category' => 'دیجیتال',
                'emoji' => '⌚',
                'price' => 3890000,
                'old_price' => 4250000,
                'stock' => 10,
                'is_active' => true,
            ],
            [
                'name' => 'ست ابزار 32 پارچه',
                'slug' => 'tool-set-32',
                'description' => 'ست کامل ابزار برای کارهای روزمره.',
                'category' => 'ابزار و تجهیزات',
                'emoji' => '🧰',
                'price' => 1790000,
                'old_price' => null,
                'stock' => 8,
                'is_active' => true,
            ],
            [
                'name' => 'قمقمه استیل ورزشی',
                'slug' => 'sport-steel-bottle',
                'description' => 'قمقمه استیل مناسب ورزش و سفر.',
                'category' => 'ورزش و سفر',
                'emoji' => '🥤',
                'price' => 690000,
                'old_price' => 790000,
                'stock' => 20,
                'is_active' => true,
            ],
            [
                'name' => 'چراغ مطالعه LED',
                'slug' => 'led-study-lamp',
                'description' => 'چراغ مطالعه کم‌مصرف و کاربردی.',
                'category' => 'خانه و آشپزخانه',
                'emoji' => '💡',
                'price' => 540000,
                'old_price' => null,
                'stock' => 12,
                'is_active' => true,
            ],
            [
                'name' => 'کوله‌پشتی روزمره',
                'slug' => 'daily-backpack',
                'description' => 'کوله‌پشتی مناسب استفاده روزمره.',
                'category' => 'ورزش و سفر',
                'emoji' => '🎒',
                'price' => 1290000,
                'old_price' => 1490000,
                'stock' => 14,
                'is_active' => true,
            ],
            [
                'name' => 'تیشرت نخی ساده',
                'slug' => 'simple-cotton-tshirt',
                'description' => 'تیشرت نخی راحت و سبک.',
                'category' => 'پوشاک',
                'emoji' => '👕',
                'price' => 490000,
                'old_price' => 590000,
                'stock' => 25,
                'is_active' => true,
            ],
            [
                'name' => 'اسپیکر قابل حمل',
                'slug' => 'portable-speaker',
                'description' => 'اسپیکر قابل حمل با صدای قدرتمند.',
                'category' => 'دیجیتال',
                'emoji' => '🔊',
                'price' => 1590000,
                'old_price' => null,
                'stock' => 9,
                'is_active' => true,
            ],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(
                ['slug' => $product['slug']],
                $product
            );
        }
    }
}
