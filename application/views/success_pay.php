<div class="content">
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Payment Notification
        </h2>
    </div>
    <!-- BEGIN: Profile Info -->
    <div class="intro-y box px-5 pt-5 mt-5">
        <div class="flex flex-col lg:flex-row border-b border-slate-200/60 dark:border-darkmode-400 pb-5 -mx-5">
            <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
                <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit relative">
                    <img alt="Midone - HTML Admin Template" class="rounded-full" src="<?= base_url('asset') ?>/pay.gif">
                </div>
                <div class="ml-8">
                    <div class="text-slate-500 font-medium text-lg text-dark">Congratulations, Payment Successfully!</div>
                    <a class="btn btn-sm btn-primary mt-4" href="<?= site_url('bill') ?>">Review Invoice</a>
                </div>
            </div>
        </div>
    </div>
</div>