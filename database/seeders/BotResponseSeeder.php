<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BotResponseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $list = array([
            "hi" => "Hello!","hi" => "hello!",
            "apakah artree tersedia dalam berbagai rasa" => "ya, artree tersedia dalam rasa kismis, kacang tanah, kacang almond, kelapa, kacang mete, dan nanas.",
            "apakah artree mengandung protein" => "ya, artree adalah snack protein yang mengandung tinggi protein.",
            "apa manfaat mengkonsumsi artree" => "mengkonsumsi artree dapat membantu memenuhi kebutuhan protein harian anda dan memberikan energi yang tahan lama.",
            "apakah artree cocok untuk diet rendah karbohidrat" => "ya, artree cocok untuk diet rendah karbohidrat karena kandungan karbohidratnya yang rendah.",
            "berapa kalori dalam satu bungkus artree" => "setiap bungkus artree mengandung sekitar 150-170 kalori, tergantung pada varian rasa.",
            "apakah artree mengandung gluten" => "tidak, artree tidak mengandung gluten sehingga cocok untuk konsumen yang sensitif terhadap gluten.",
            "apakah artree aman dikonsumsi oleh vegetarian" => "ya, artree aman dikonsumsi oleh vegetarian karena tidak mengandung produk hewani.",
            "apakah artree mengandung pemanis buatan" => "tidak, artree tidak mengandung pemanis buatan. produk ini diperkaya dengan bahan alami untuk memberikan rasa yang lezat.",
            "apakah artree bisa dikonsumsi oleh anak-anak" => "ya, artree dapat dikonsumsi oleh anak-anak. namun, perhatikan ukuran porsi dan sesuaikan dengan kebutuhan mereka.",
            "apa keunggulan artree dibandingkan dengan snack lainnya" => "artree memiliki keunggulan sebagai snack protein yang rendah karbohidrat, bebas gluten, dan mengandung bahan-bahan alami.",
            "apakah artree tersedia dalam kemasan yang lebih besar" => "saat ini, artree hanya tersedia dalam kemasan standar. namun, kami sedang mempertimbangkan untuk merilis kemasan yang lebih besar di masa depan.",
            "di mana saya bisa membeli artree" => "anda dapat membeli artree di toko-toko makanan sehat terdekat atau melalui situs web resmi kami.",
            "apakah artree tersedia untuk pengiriman internasional" => "ya, kami menyediakan pengiriman internasional untuk artree. silakan cek situs web kami untuk informasi lebih lanjut tentang negara yang dilayani.",
            "apakah artree mengandung kolesterol" => "artree tidak mengandung kolesterol, sehingga aman dikonsumsi oleh individu yang perlu mengontrol asupan kolesterol.",
            "apakah artree memiliki tanggal kedaluwarsa" => "ya, setiap kemasan artree memiliki tanggal kedaluwarsa yang tercetak pada kemasan. pastikan untuk memeriksa tanggal kedaluwarsa sebelum mengonsumsinya.",
            "apakah artree mengandung kacang-kacangan" => "ya, artree mengandung kacang tanah, kacang almond, kacang mete, dan juga kismis.",
            "apakah artree cocok untuk orang dengan alergi kacang" => "artree tidak cocok untuk orang dengan alergi kacang, karena mengandung kacang-kacangan. disarankan untuk memeriksa daftar bahan sebelum mengonsumsinya.",
            "apakah artree tersedia dalam varian rasa lainnya" => "saat ini, artree hanya tersedia dalam varian rasa kismis, kacang tanah, kacang almond, kelapa, kacang mete, dan nanas. kami terus mengembangkan rasa baru di masa depan.",
            "apakah artree mengandung bahan pewarna atau pengawet" => "artree tidak mengandung bahan pewarna atau pengawet tambahan. kami hanya menggunakan bahan alami untuk memberikan rasa dan kelezatan yang optimal.",
            "apakah artree mengandung gula tambahan" => "artree mengandung sedikit gula tambahan. sebagian besar gula dalam artree berasal dari bahan-bahan alami seperti kismis dan nanas.",
            "berapa lama artree bisa disimpan setelah dibuka" => "setelah dibuka, disarankan untuk mengonsumsi artree dalam waktu 1-2 hari untuk menjaga kesegaran dan kualitasnya.",
            "apakah artree mengandung lemak" => "artree mengandung lemak sehat dari bahan-bahan seperti kacang-kacangan dan kelapa. lemak ini penting untuk kesehatan tubuh.",
            "apakah artree mengandung gula alami" => "artree mengandung gula alami dari bahan-bahan seperti kismis dan nanas. kami tidak menambahkan gula tambahan.",
            "apakah artree cocok untuk mereka yang sedang menjalani program penurunan berat badan" => "ya, artree cocok untuk mereka yang sedang menjalani program penurunan berat badan karena rendah kalori, rendah karbohidrat, dan tinggi protein.",
            "apakah artree aman untuk dikonsumsi oleh mereka yang memiliki diabetes" => "artree dapat dikonsumsi oleh mereka yang memiliki diabetes, tetapi tetap perlu memperhatikan asupan karbohidrat dan mengonsultasikan dengan dokter atau ahli gizi terlebih dahulu.",
            "apa itu kismis" => "Kismis adalah buah kering yang terbuat dari anggur yang telah dikeringkan. Biasanya, anggur jenis hitam atau hijau digunakan untuk membuat kismis.",
            "apa manfaat kismis" => "Kismis kaya akan serat, antioksidan, dan nutrisi seperti zat besi dan kalium. Konsumsi kismis dapat membantu meningkatkan pencernaan, menjaga kesehatan jantung, dan meningkatkan sistem kekebalan tubuh.",
            "apakah kacang tanah dan kacang almond sama" => "Tidak, kacang tanah dan kacang almond berbeda. Kacang tanah sebenarnya adalah kacang legum, sedangkan kacang almond adalah kacang biji. Kacang tanah memiliki kulit yang harus dikupas sebelum dikonsumsi, sementara kacang almond biasanya dikonsumsi tanpa kulitnya.",
            "apa manfaat kacang tanah" => "Kacang tanah mengandung banyak protein, serat, dan lemak sehat. Mereka juga kaya akan vitamin dan mineral, seperti vitamin E, magnesium, dan folat. Konsumsi kacang tanah secara moderat dapat membantu menjaga kesehatan jantung dan meningkatkan keseimbangan gula darah.",
            "manfaat kacang almond" => "Kacang almond adalah sumber yang baik untuk vitamin E, magnesium, dan lemak sehat seperti asam lemak tak jenuh tunggal. Mereka dapat membantu meningkatkan kesehatan jantung, mengendalikan berat badan, dan meningkatkan fungsi otak.",
            "apa manfaat kelapa" => "Kelapa mengandung banyak mineral, seperti kalium, magnesium, dan fosfor. Air kelapa kaya akan elektrolit alami dan dapat membantu menghidrasi tubuh. Daging kelapa mengandung serat dan lemak sehat. Kelapa juga mengandung asam lemak laurik yang diketahui memiliki efek antimikroba.",
            "apa manfaat kacang mete" => "Kacang mete mengandung lemak sehat, serat, vitamin, dan mineral seperti magnesium dan tembaga. Mereka dapat membantu menjaga kesehatan jantung, memperkuat sistem kekebalan tubuh, dan meningkatkan kesehatan tulang.",
            "apa itu nanas" => "Nanas adalah buah tropis yang berasal dari tanaman Ananas comosus. Buah ini memiliki rasa manis dan asam yang khas, serta dagingnya berwarna kuning.",
            "apa manfaat nanas" => "Nanas mengandung enzim bromelain yang dapat membantu meningkatkan pencernaan dan mengurangi peradangan. Buah ini juga mengandung vitamin C, mangan, dan serat. Konsumsi nanas dapat membantu menjaga kesehatan sistem pencernaan, meningkatkan kekebalan tubuh, dan mendukung kesehatan tulang.",
        ]);
        $i = 1;
        foreach ($list[0] as $question => $response) {
            DB::table('botresponse')->insert(
                [
                    'id' => $i,
                    'question' => $question,
                    'response' => $response
                ]
            );
            $i++;
        }
    }
}
