<div class="content">
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Cart Details
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <a href="<?= site_url('dashboard/clear') ?>" class="btn btn-primary shadow-md mr-2">Clear Cart</a>
            <a href="<?= site_url('dashboard') ?>" class="btn btn-danger shadow-md mr-2">Continue Shopping</a>
        </div>
    </div>
    <!-- BEGIN: Transaction Details -->
    <div class="intro-y grid grid-cols-11 gap-5 mt-5">

        <div class="col-span-12 lg:col-span-12 2xl:col-span-8">
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">Order Details</div>
                    <a href="<?= site_url('dashboard/checkout') ?>" class="flex items-center ml-auto btn btn-primary shadow-md mr-2"><i data-lucide="activity" class="w-4 h-4 mr-2"></i>&nbsp;CHECKOUT </a>
                </div>
                <div class="overflow-auto lg:overflow-visible -mt-3">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="whitespace-nowrap">
                                    <input class="form-check-input" type="checkbox">
                                </th>
                                <th class="whitespace-nowrap !py-5">Product Item</th>
                                <th class="whitespace-nowrap text-right">Harga</th>
                                <th class="whitespace-nowrap text-right">Jumlah Barang</th>
                                <th class="whitespace-nowrap text-right">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($this->cart->contents() as $items) : ?>
                                <tr>
                                    <td><a href="<?= site_url('dashboard/delete/' . $items['rowid']) ?>"><i data-lucide="trash-2" class="w-4 h-4"></i></a></td>
                                    <td class="!py-4">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 image-fit zoom-in">
                                                <img alt="Midone - HTML Admin Template" class="rounded-lg border-2 border-white shadow-md tooltip" src="<?= base_url() . '/uploads/' . $items['options']['gambar']; ?>" title="Uploaded at 8 December 2021">
                                            </div>
                                            <a href="" class="font-medium whitespace-nowrap ml-4"><?= $items['name']; ?></a>
                                        </div>
                                    </td>
                                    <td class="text-right">Rp. <?= number_format($items['price'], 0, ',', '.') ?></td>
                                    <td class="text-right"><?= number_format($items['qty'], 0, ',', '.') ?></td>
                                    <td class="text-right">Rp. <?= number_format($items['subtotal'], 0, ',', '.') ?></td>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td colspan="4"></td>
                                <td class="text-right"><strong>Rp. <?= number_format($this->cart->total(), 0, ',', '.') ?>,-</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Transaction Details -->
</div>