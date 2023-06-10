<!-- BEGIN: Content -->
<div class="content">
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 2xl:col-span-9">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: Notification -->
                <div class="col-span-12 mt-6 -mb-6 intro-y">
                    <div class="alert alert-dismissible show box bg-primary text-white flex items-center mb-6" role="alert">
                        <span>Hallo selamat datang, <b><?= $this->session->userdata('nama_user') ?></b> Silahkan kelola dashboard toko online Anda.</span>
                        <button type="button" class="btn-close text-white" data-tw-dismiss="alert" aria-label="Close"> <i data-lucide="x" class="w-4 h-4"></i> </button>
                    </div>
                </div>
                <!-- BEGIN: Notification -->
                <!-- BEGIN: General Report -->

                <!-- END: Visitors -->
                <!-- BEGIN: Users By Age -->

                <div class="col-span-12 sm:col-span-6 lg:col-span-4 xl:col-span-4 mt-2 lg:mt-6 xl:mt-2">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Grafik Pesanan
                        </h2>
                        <a href="" class="ml-auto text-primary truncate"></a>
                    </div>
                    <div class="report-box-2 intro-y mt-5">
                        <div class="box p-5">
                            <ul class=" nav nav-pills w-4/5 bg-slate-100 dark:bg-black/20 rounded-md mx-auto " role="tablist">
                                <li id="active-users-tab" class="nav-item flex-1" role="presentation">
                                    <button class="nav-link w-full py-1.5 px-2 active" data-tw-toggle="pill" data-tw-target="#active-users" type="button" role="tab" aria-controls="active-users" aria-selected="true"> Orders Review </button>
                                </li>
                            </ul>
                            <div class="tab-content mt-6">
                                <div class="tab-pane active" id="active-users" role="tabpanel" aria-labelledby="active-users-tab">
                                    <div class="relative">
                                        <div class="h-[208px]">
                                            <div id="chartdiv"></div>
                                        </div>

                                    </div>
                                    <div class="w-52 sm:w-auto mx-auto mt-5">
                                        <div class="flex items-center">
                                            <div class="w-2 h-2 bg-pending rounded-full mr-3"></div>
                                            <span class="truncate">PESANAN BELUM DIBAYAR</span> <span class="font-medium ml-auto"><?= $pending; ?> Orders</span>
                                        </div>
                                        <div class="flex items-center mt-4">
                                            <div class="w-2 h-2 bg-success rounded-full mr-3"></div>
                                            <span class="truncate">PESANAN SUDAH TERBAYAR</span> <span class="font-medium ml-auto"><?= $sukses; ?> Orders</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-span-12 sm:col-span-6 lg:col-span-4 xl:col-span-8 mt-2 lg:mt-6 xl:mt-2">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Pesanan Masuk
                        </h2>
                        <a href="" class="ml-auto text-primary truncate"></a>
                    </div>
                    <div class="mt-5">
                        <?php foreach ($bill as $row) : ?>
                            <div class="intro-y">
                                <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                                    <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                                        <img src="<?= base_url('asset') ?>/user.png">
                                    </div>
                                    <div class="ml-4 mr-auto">
                                        <div class="font-medium"><b>#<?= $row->order_id ?></b> | <?= $row->name ?></div>
                                        <div class="text-slate-500 text-xs mt-0.5"><?= date("d F Y H:i:s", strtotime($row->transaction_time)); ?></div>
                                    </div>
                                    <div class="py-1 px-2 rounded-full text-xs bg-danger text-white cursor-pointer font-medium">Menunggu Pembayaran</div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <a href="<?= site_url('admin/invoice') ?>" class="intro-y w-full block text-center rounded-md py-4 border border-dotted border-slate-400 dark:border-darkmode-300 text-slate-500">View More</a>
                    </div>
                </div>
                <!-- END: Users By Age -->


            </div>
        </div>
    </div>
</div>
<!-- END: Content -->
</div>
</div>