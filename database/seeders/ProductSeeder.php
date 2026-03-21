<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Brand;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $products = [
            [
                'name' => 'Nike Air Force 1 07 All White',
                'brand_id' => 1,
                'description' => 'Biểu tượng thời trang đường phố, chất liệu da cao cấp, đế đệm Air êm ái.',
                'price' => 2900000,
                'stock' => 50,
                'image' => 'af1white.jpg'
            ],
            [
                'name' => 'Adidas Superstar Core Black',
                'brand_id' => 2,
                'description' => 'Mẫu giày mũi vỏ sò huyền thoại, phong cách cổ điển không lỗi mốt.',
                'price' => 2400000,
                'stock' => 30,
                'image' => 'superstarblack.jpg'
            ],
            [
                'name' => 'Nike Air Jordan 1 Low Panda',
                'brand_id' => 1,
                'description' => 'Phối màu trắng đen kinh điển, cực kỳ dễ phối đồ và được săn đón.',
                'price' => 3500000,
                'stock' => 15,
                'image' => 'jordanpanda.jpg'
            ],
            [
                'name' => 'Adidas Ultraboost Light',
                'brand_id' => 2,
                'description' => 'Dòng giày chạy bộ siêu nhẹ với công nghệ đệm Boost hoàn trả năng lượng.',
                'price' => 4200000,
                'stock' => 20,
                'image' => 'ultraboost.jpg'
            ],
            [
                'name' => 'New Balance 550 White Grey',
                'brand_id' => 3,
                'description' => 'Thiết kế retro bóng rổ thập niên 80, mang lại vẻ ngoài thanh lịch.',
                'price' => 3200000,
                'stock' => 12,
                'image' => 'balence550.jpg'
            ],
            [
                'name' => 'Giày Samba OG',
                'brand_id' => 2,
                'description' => 'Ra đời trên sân bóng, giày Samba là biểu tượng kinh điển của phong cách đường phố.',
                'price' => 2700000,
                'stock' => 13,
                'image' => 'sambaog.jpg'
            ],
            [
                'name' => 'Dây giày JEWELACE',
                'brand_id' => 2,
                'description' => 'Dây giày Jewelace được thiết kế để tăng thêm nét thanh lịch cho đôi giày của bạn.',
                'price' => 350000,
                'stock' => 13,
                'image' => 'daygiayjewelace.jpg'
            ],
            [
                'name' => 'Giày Taekwondo Mei',
                'brand_id' => 2,
                'description' => 'Đôi Giày Taekwondo Mei mang hơi thở đầu những năm 2000 đến hiện tại, kết hợp thiết kế di sản với phong cách hiện đại.',
                'price' => 2400000,
                'stock' => 13,
                'image' => 'teakwondomei.jpg'
            ],
            [
                'name' => 'Giày Tokyo',
                'brand_id' => 2,
                'description' => 'Mang đậm hơi thở thập niên 70 và phong cách cổ điển sân khấu, đôi giày adidas này là lựa chọn lý tưởng cho mọi hành trình.',
                'price' => 2400000,
                'stock' => 13,
                'image' => 'giaytokyo.jpg'
            ],
            [
                'name' => 'Giày GRAND COURT 3.0',
                'brand_id' => 2,
                'description' => 'Hướng tới tương lai cùng Giày Grand Court 3.0, nơi phong cách classic hòa quyện cùng sự đổi mới.',
                'price' => 200000,
                'stock' => 13,
                'image' => 'grandcourt.jpg'
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
