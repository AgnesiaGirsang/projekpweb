@extends('layouts.app')

@section('content')
<style>
    body, html {
        height: 100%;
        margin: 0;
        font-family: 'Lora', serif;
        color: #f5f5dc;
    }

    body {
        background: url('/images/background-coklat.jpg') no-repeat center center fixed;
        background-size: cover;
        position: relative;
        z-index: 0;
    }

    body::before {
        content: "";
        position: fixed;
        top: 0; left: 0;
        width: 100%; height: 100%;
        background-color: rgba(30, 20, 10, 0.75);
        z-index: -1;
    }

    h5.card-title {
        color: #ffd700;
        text-shadow: 1px 1px 3px #5a4220;
        font-size: 1.3rem;
    }

    .card {
    background-color: rgba(60, 40, 25, 0.5); /* semi-transparent coklat gelap */
    border-radius: 20px;
    border: 1px solid rgba(255, 215, 0, 0.25); /* tipis kuning keemasan */
    box-shadow: 0 8px 24px rgba(255, 215, 0, 0.15); /* glow halus keemasan */
    backdrop-filter: blur(8px);
    transition: transform 0.35s ease, box-shadow 0.35s ease;
}

.card:hover {
    transform: translateY(-8px) scale(1.03);
    box-shadow: 0 15px 40px rgba(255, 215, 0, 0.4);
    border-color: rgba(255, 215, 0, 0.6);
}

.card-body {
    background: rgba(40, 25, 12, 0.6); /* lebih gelap dan transparan */
    border-radius: 16px;
    padding: 30px 28px;
    color: #fff1c1;
    box-shadow: 0 4px 16px rgba(30, 20, 10, 0.6);
    text-shadow: 0 0 6px rgba(255, 215, 0, 0.4);
}

.card-text {
    color: #fce8b2;
    font-size: 17px;
    line-height: 1.75;
    text-shadow: 0 0 4px rgba(50, 30, 10, 0.6);
}


    .object-fit-cover {
        object-fit: cover;
    }

    .rounded-start {
        border-radius: 12px 0 0 12px;
    }
</style>

{{-- Post 1 --}}
<div class="card mb-4">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="{{ asset('images/seduh.jpg') }}" 
                 class="img-fluid rounded-start h-100 object-fit-cover" 
                 alt="Cold Brew">
        </div>
        <div class="col-md-8 d-flex align-items-center">
            <div class="card-body">
                <h5 class="card-title">☕ Resep Kopi Susu Gula Aren ala Cafe, Bisa Dibuat di Rumah!</h5>
                <p class="card-text"> Lagi ngidam kopi kekinian tapi malas keluar rumah? Coba bikin Kopi Susu Gula Aren ala cafe sendiri di rumah!</p>
                <p> Bahan-bahannya simpel, yaitu: kopi hitam, gula aren cair, susu full cream, dan es batu. </p>
                <p> Cukup seduh kopi, tuang gula aren di dasar gelas, tambahkan es, susu, lalu tuangkan kopi perlahan di atasnya. </p>
                <p> Voila, kopi yang rasanya creamy, manis legit, dan segar siap diseruput! Lebih hemat, bisa bikin kapan aja, dan cocok buat temani kerja atau santai sore. </p>
                <p>  Kamu bisa tambah topping favorit biar makin spesial! </p>
                <p> Yuk jadi barista di rumah sendiri!</p>
            </div>
        </div>
    </div>
</div>

{{-- Post 2 --}}
<div class="card mb-4">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="{{ asset('images/sejarah.jpg') }}" 
                 class="img-fluid rounded-start h-100 object-fit-cover" 
                 alt="Sejarah Kopi">
        </div>
        <div class="col-md-8 d-flex align-items-center">
            <div class="card-body">
                <h5 class="card-title">📖 Sejarah Kopi</h5>
                <p class="card-text"> Tahukah kamu? Kopi pertama kali ditemukan di Ethiopia pada abad ke-9.</p>
                <p> Konon, seorang penggembala kambing bernama Kaldi menyadari kambingnya jadi lebih aktif setelah memakan buah kopi. Dari situ, kopi mulai dikenal, menyebar ke Timur Tengah, lalu ke Eropa dan seluruh dunia.</p>
                <p> Seiring waktu, kopi bukan hanya minuman, tapi juga bagian dari budaya dan gaya hidup. Dari warung kopi sederhana hingga cafe modern, kopi selalu punya tempat istimewa di hati para penikmatnya. </p>
            </div>
        </div>
    </div>
</div>
@endsection