<?php
session_start();
$guest = true;
require_once '../mainconfig.php';
include_once '../layouts/header.php';
?>

            <div class="content-body">
                <!-- search header -->
                <section id="faq-search-filter">
                    <div class="demo-spacing-0">
                    <div class="card faq-search" style="background-image: url('../assets/images/banner/banner.png')">
                        <div class="card-body text-center">
                            <!-- main title -->
                            <h2 class="text-primary">Ada pertanyaan?</h2>

                            <!-- subtitle -->
                            <p class="card-text mb-2">atau ketik pada kolom pencarian dibawah ini untuk menemukan bantuan yang Kamu butuhkan dengan cepat</p>

                            <!-- search input -->
                            <form class="faq-search-input">
                                <div class="input-group input-group-merge">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i data-feather="search"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Search faq..." />
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
                <!-- /search header -->

                                    <!-- frequent answer and question  collapse  -->
                                    <div class="collapse-margin collapse-icon mt-3" id="faq-payment-qna">
                                        <div class="card">
                                            <div class="card-header" id="paymentOne" data-toggle="collapse" role="button" data-target="#faq-payment-one" aria-expanded="false" aria-controls="faq-payment-one">
                                                <span class="lead collapse-title">Apakah sudah tersedia fitur Topup otomatis?</span>
                                            </div>

                                            <div id="faq-payment-one" class="collapse" aria-labelledby="paymentOne" data-parent="#faq-payment-qna">
                                                <div class="card-body">
                                                    Kami menyediakan fitur Topup otomatis jadi Kamu tidak perlu khawatir dan tanpa perlu menunggu Konfirmasi dari admin lagi.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="paymentTwo" data-toggle="collapse" role="button" data-target="#faq-payment-two" aria-expanded="true" aria-controls="faq-payment-two">
                                                <span class="lead collapse-title">Bagaimana cara melakukan order ?</span>
                                            </div>
                                            <div id="faq-payment-two" class="collapse show" aria-labelledby="paymentTwo" data-parent="#faq-payment-qna">
                                                <div class="card-body">
                                                    Untuk melakukan order Kamu masuk ke halaman Game, Silahkan pilih Produk sesuai kebutuhan Kamu.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="paymentFive" data-toggle="collapse" role="button" data-target="#faq-payment-five" aria-expanded="false" aria-controls="faq-payment-five">
                                                <span class="lead collapse-title">
                                                   Bagaimana cara berjualan produk?
                                                </span>
                                            </div>
                                            <div id="faq-payment-five" class="collapse" aria-labelledby="paymentFive" data-parent="#faq-payment-qna">
                                                <div class="card-body">
                                                    Kamu bisa melakukan promosi melalui sosial media ataupun teman/suadara Kamu, dan ambil keuntungan dari website kami.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="paymentnine" data-toggle="collapse" role="button" data-target="#faq-payment-nine" aria-expanded="false" aria-controls="faq-payment-nine">
                                                <span class="lead collapse-title">Saya ingin berjualan dan ambil produk/layanan dari sini apakah bisa?</span>
                                            </div>
                                            <div id="faq-payment-nine" class="collapse" aria-labelledby="paymentnine" data-parent="#faq-payment-qna">
                                                <div class="card-body">
                                                    Tentu saja bisa, karena kami menyedikan layanan dan memudahkan pengguna untuk transaksi.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="paymentTeen" data-toggle="collapse" role="button" data-target="#faq-payment-Teen" aria-expanded="false" aria-controls="faq-payment-Teen">
                                                <span class="lead collapse-title">Status sudah sukses namun produk tidak masuk?</span>
                                            </div>
                                            <div id="faq-payment-Teen" class="collapse" aria-labelledby="paymentTeen" data-parent="#faq-payment-qna">
                                                <div class="card-body">
                                                    Untuk proses biasanya 1 - 5 menit (tergantung server) kadang fast kadang low,  jika sudah melewati batas waktu tadi harap segera hubungi kami.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="paymentSix" data-toggle="collapse" role="button" data-target="#faq-payment-six" aria-expanded="false" aria-controls="faq-payment-six">
                                                <span class="lead collapse-title">Jika ada kendala dengan layanan bagaimana?</span>
                                            </div>
                                            <div id="faq-payment-six" class="collapse" aria-labelledby="paymentSix" data-parent="#faq-payment-qna">
                                                <div class="card-body">
                                                    Kamu bisa hubungi kami melalui menu kontak kami, hubungi sesuai jadawal yang tertara.
                                                </div>
                                            </div>
                                        </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                <!-- contact us -->
                <section class="faq-contact">
                    <div class="row mt-5 pt-75">
                        <div class="col-12 text-center">
                            <h2>Sudah jelas pertanyaan diatas?</h2>
                            <p class="mb-3">
                                Jika masih kurang jelas bisa menghubungi kami, melalui menu <b>Kontak Kami!</b>
                            </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--/ contact us -->

            </div>
        </div>
    </div>
    <!-- END: Content-->
<?php include_once '../layouts/footer1.php'; ?>