<?php
namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
Product::create([
            'nama' => 'Apel',
            'deskripsi' => 'Apel merupakan jenis buah-buahan, atau buah yang dihasilkan dari pohon buah apel. Buah apel biasanya berwarna merah kulitnya jika masak dan (siap dimakan), namun bisa juga kulitnya berwarna hijau atau kuning. Kulit buahnya agak lembek dan daging buahnya keras.',
            'gambar' => 'https://media.suara.com/pictures/970x544/2015/10/20/o_1a220t3t51r0o2h7ih318031c9oa.jpg',
            'harga' => 30000,
            'stok' => 25,
            'kategori_id' => 1,
        ]);
Product::create([
            'nama' => 'Mangga',
            'deskripsi' => 'Buah mangga termasuk kelompok buah batu (drupa) yang berdaging, dengan ukuran dan bentuk yang sangat berubah-ubah bergantung pada macamnya',
            'gambar' => 'https://cdn-brilio-net.akamaized.net/community/2019/03/26/17915/image_1553582820_5c99cae47a271.jpg',
            'harga' => 25000,
            'stok' => 50,
            'kategori_id' => 1,
        ]);
Product::create([
            'nama' => 'Jeruk',
            'deskripsi' => 'Jeruk Manis merupakan jenis jeruk yang diduga berasal dari daerah antara Assam, India, Tiongkok selatan atau Asia Tenggara.[1] Pohon jeruk ini memiliki daun bersayap, berbau harum, pada ketiak daun terdapat duri dengan bunga putih kekuning-kuningan dan buah bulat, pada ujungnya terdapat lekukan-lekukan, rasanya manis, kulit buahnya sukar dikupas.',
            'gambar' => 'https://jubi.co.id/wp-content/uploads/2020/06/Buah-jeruk-Tempo.co_.jpg',
            'harga' => 20000,
            'stok' => 100,
            'kategori_id' => 1,
        ]);
Product::create([
            'nama' => 'Sayur Brokoli',
            'deskripsi' => 'Sayuran segar organik',
            'gambar' => 'https://asset.kompas.com/crops/m-YUetAhwbW20MG6s1FFh4UQO5c=/0x0:1000x667/750x500/data/photo/2021/05/27/60af45e4f39c8.jpg',
            'harga' => 15000,
            'stok' => 15,
            'kategori_id' => 2,
        ]);
Product::create([
            'nama' => 'Wortel',
            'deskripsi' => 'Sayuran organik segar',
            'gambar' => 'https://ecs7.tokopedia.net/blog-tokopedia-com/uploads/2018/05/Featured_Manfaat-Wortel-Sumber-Berbagai-Vitamin-Manfaat-Tak-Main-main.jpg',
            'harga' => 10000,
            'stok' => 10,
            'kategori_id' => 2,
        ]);
Product::create([
            'nama' => 'Daging Sapi',
            'deskripsi' => 'Daging sapi segar',
            'gambar' => 'https://res.cloudinary.com/dk0z4ums3/image/upload/v1605524896/attached_image/mengolah-daging-sapi-dengan-benar.jpg',
            'harga' => 50000,
            'stok' => 5,
            'kategori_id' => 3,
        ]);
Product::create([
            'nama' => 'Daging Ayam',
            'deskripsi' => 'Daging ayam segar',
            'gambar' => 'https://images.contentful.com/1cj2ge3ast5f/4ETq9ybsnjCsGaailYLOGH/cf7db5b91c85f4ea1e309905a9679809/Ayam_Utuh.jpeg',
            'harga' => 40000,
            'stok' => 10,
            'kategori_id' => 3,
        ]);
Product::create([
            'nama' => 'Jahe Merah',
            'deskripsi' => 'Jahe merah segar organik',
            'gambar' => 'https://d1bpj0tv6vfxyp.cloudfront.net/iniperbedaanjahemerahdanjahebiasahalodoc.jpg',
            'harga' => 12000,
            'stok' => 5,
            'kategori_id' => 4,
        ]);
Product::create([
            'nama' => 'Cengkeh',
            'deskripsi' => 'Cengkeh segar organik',
            'gambar' => 'https://cdn-2.tstatic.net/batam/foto/bank/images/ilustrasi-cengkeh1.jpg',
            'harga' => 50000,
            'stok' => 50,
            'kategori_id' => 4,
        ]);
    }
}
