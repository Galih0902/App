<div class="content">
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Update Product
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6">
        <!-- END: Profile Menu -->
        <div class="col-span-12 lg:col-span-12 2xl:col-span-9">
            <!-- BEGIN: Display Information -->
            <div class="intro-y box lg:mt-5">
                <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        Display Information
                    </h2>
                </div>
                <div class="p-5">
                    <div class="flex flex-col-reverse xl:flex-row flex-col">
                        <?php foreach ($product as $row) : ?>
                            <div class="flex-1 mt-6 xl:mt-0">
                                <form action="<?= site_url('admin/product/insert_update') ?>" method="post">
                                    <div class="grid grid-cols-12 gap-x-5">
                                        <div class="col-span-12 2xl:col-span-6">
                                            <div>
                                                <label for="update-profile-form-1" class="form-label">Display Name</label>
                                                <input type="hidden" name="id_brg" value="<?= $row->id_brg ?>">
                                                <input id="update-profile-form-1" type="text" class="form-control" name="nama_brg" value="<?= $row->nama_brg ?>">
                                            </div>
                                            <div class="mt-3">
                                                <label for="update-profile-form-2" class="form-label">Categories</label>
                                                <select id="category" name="kategori" class="form-select">
                                                    <option selected hidden value="<?= $row->kategori ?>"><?= $row->kategori ?></option>
                                                    <option value="T-Shirt">T-Shirt</option>
                                                    <option value="Jacket">Jacket</option>
                                                    <option value="Shoes">Shoes</option>
                                                    <option value="Electronic">Electronic</option>
                                                    <option value="Kids &amp; Baby">Kids &amp; Baby</option>
                                                    <option value="Fashion &amp; Make Up">Fashion &amp; Make Up</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-span-12 2xl:col-span-6">
                                            <div class="mt-3 2xl:mt-0">
                                                <label for="update-profile-form-3" class="form-label">Product Stock</label>
                                                <input id="update-profile-form-1" type="number" class="form-control" name="stok" value="<?= $row->stok ?>">
                                            </div>
                                            <div class="mt-3">
                                                <label for="update-profile-form-4" class="form-label">Product Price</label>
                                                <input id="update-profile-form-4" type="number" class="form-control" name="harga" value="<?= $row->harga ?>">
                                            </div>
                                        </div>
                                        <div class="col-span-12">
                                            <div class="mt-3">
                                                <label for="update-profile-form-5" class="form-label">Product Description</label>
                                                <textarea id="update-profile-form-5" class="form-control" name="keterangan" value="<?= $row->keterangan ?>"><?= $row->keterangan ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-20 mt-3">Save</button>
                                </form>
                            </div>
                            <div class="w-52 mx-auto xl:mr-0 xl:ml-6">
                                <div class="border-2 border-dashed shadow-sm border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                    <div class="h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                        <img class="rounded-md" alt="Midone - HTML Admin Template" src="<?= base_url() . '/uploads/' . $row->gambar ?>">
                                        <div title="Remove this profile photo?" class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2"> <i data-lucide="x" class="w-4 h-4"></i> </div>
                                    </div>
                                    <div class="mx-auto cursor-pointer relative mt-5">
                                        <button type="button" class="btn btn-primary w-full">Product Image</button>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>