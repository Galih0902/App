<div class="content">
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 2xl:col-span-9">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: Notification -->
                <div class="col-span-12 mt-6 -mb-6 intro-y">
                    <div class="alert alert-dismissible show box bg-primary text-white flex items-center mb-6" role="alert">
                        <span>Do you want to enter the Dashboard page ? <a href="#" class="underline ml-1">Please Activate the Account First</a>.</span>
                        <button type="button" class="btn-close text-white" data-tw-dismiss="alert" aria-label="Close"> <i data-lucide="x" class="w-4 h-4"></i> </button>
                    </div>
                </div>



                <!-- END: Ads 1 -->
                <!-- BEGIN: Ads 2 -->
                <div class="col-span-12 lg:col-span-12 mt-2">
                    <?php foreach ($user as $row) : ?>
                        <div class="box p-8 relative overflow-hidden intro-y">
                            <div class="text-primary dark:text-white text-xl -mt-3"><span class="font-medium">Hallo,</span> <?php echo $this->session->userdata('nama_user') ?></div>
                            <div class="text-slate-500 mt-2">Silahkan Anda melakukan aktivasi account terlebih dahulu dengan klik tombol aktivasi dibawah ini.</div>
                            <a href="<?= site_url('publisher/activation/' . $row->id_user) ?>" class="btn w-32 bg-primary text-white mt-6 sm:mt-10">Aktivasi</a>
                            <img class="absolute top-0 right-0 mt-1 -mr-12" src="<?= site_url('asset') ?>/admin/dist/images/phone-illustration.svg">
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>