@extends('layouts.app')

@section('content')
<style>
    body {
        background: url('/images/background-coklat.jpg') no-repeat center center fixed;
        background-size: cover;
        position: relative;
        z-index: 0;
        color: #f5deb3;
        font-family: 'Lora', serif;
        }

    body::before {
        content: "";
        position: fixed;
        top: 0; left: 0;
        width: 100%; height: 100%;
        background-color: rgba(44, 33, 20, 0.75); /* overlay coklat gelap transparan */
        z-index: -1;
    }

    h2 {
        color: #deb887;
        text-align: center;
        margin-bottom: 2rem;
        text-shadow: 1px 1px 4px #4b3b2b;
    }

    .card {
        background-color: rgba(75, 59, 43, 0.85);
        border: none;
        color: #f5deb3;
        transition: transform 0.2s, box-shadow 0.2s;
        border-radius: 12px;
        box-shadow: 0 0 10px #5a4220;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(90, 66, 32, 0.8);
    }

    .card-title {
        font-size: 1.2rem;
        font-weight: bold;
        color: #ffdead;
    }

    .card-text {
        font-size: 0.95rem;
        color: #ffe4b5;
    }

    .btn-success {
        background-color: #8b5e3c;
        border: none;
        color: white;
        font-weight: bold;
        box-shadow: 0 4px 6px #5a4220;
        transition: background-color 0.3s ease;
    }

    .btn-success:hover {
        background-color: #a6754f;
        box-shadow: 0 6px 10px #7a5230;
    }

    .btn-primary {
        background-color: #deb887;
        border: none;
        color: #3e2723;
        font-weight: bold;
        display: block;
        width: 200px;
        margin: 0 auto;
        text-align: center;
        margin-top: 40px;
        box-shadow: 0 4px 6px #5a4220;
    }

    .btn-primary:hover {
        background-color: #cdaa7d;
        box-shadow: 0 6px 10px #7a5230;
    }
</style>


<div class="container testimonial-section">
    <h1>Apa Kata Mereka?</h1>

    <div class="row row-cols-1 row-cols-md-2 g-4">

        <!-- Testimoni 1 -->
        <div class="col">
            <div class="card card-testimonial shadow-lg h-100">
                <div class="row g-0 align-items-center">
                    <div class="col-md-3 d-flex align-items-center justify-content-center p-3">
                        <img src="https://i.pravatar.cc/100?img=1" alt="Budi" class="rounded-circle img-fluid testimonial-img">
                    </div>
                    <div class="col-md-9">
                        <div class="card-body">
                            Kopi Noir rasanya unik dan tempatnya cozy!
                        </div>
                        <div class="card-footer">
                            - Budi, Medan
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Testimoni 2 -->
        <div class="col">
            <div class="card card-testimonial shadow-lg h-100">
                <div class="row g-0 align-items-center">
                    <div class="col-md-3 d-flex align-items-center justify-content-center p-3">
                        <img src="https://i.pravatar.cc/100?img=5" alt="Sari" class="rounded-circle img-fluid testimonial-img">
                    </div>
                    <div class="col-md-9">
                        <div class="card-body">
                            Barista ramah dan cepat, recommended banget!
                        </div>
                        <div class="card-footer">
                            - Sari, Jakarta
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Testimoni 3 -->
        <div class="col">
            <div class="card card-testimonial shadow-lg h-100">
                <div class="row g-0 align-items-center">
                    <div class="col-md-3 d-flex align-items-center justify-content-center p-3">
                        <img src="https://i.pravatar.cc/100?img=11" alt="Andi" class="rounded-circle img-fluid testimonial-img">
                    </div>
                    <div class="col-md-9">
                        <div class="card-body">
                            Tempatnya nyaman buat kerja, dan kopinya selalu fresh.
                        </div>
                        <div class="card-footer">
                            - Andi, Surabaya
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Testimoni 4 -->
        <div class="col">
            <div class="card card-testimonial shadow-lg h-100">
                <div class="row g-0 align-items-center">
                    <div class="col-md-3 d-flex align-items-center justify-content-center p-3">
                        <img src="https://i.pravatar.cc/100?img=18" alt="Lina" class="rounded-circle img-fluid testimonial-img">
                    </div>
                    <div class="col-md-9">
                        <div class="card-body">
                            Suka banget sama aroma kopi Noir, beda dari yang lain!
                        </div>
                        <div class="card-footer">
                            - Lina, Bandung
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection