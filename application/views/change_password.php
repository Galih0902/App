<div class="content">
                    <div class="intro-y flex items-center mt-8">
                        <h2 class="text-lg font-medium mr-auto">
                            Change Password
                        </h2>
                    </div>
                    <div class="grid grid-cols-12 gap-6">
                        <!-- BEGIN: Profile Menu -->
                        <div class="col-span-12 lg:col-span-4 2xl:col-span-3 flex lg:block flex-col-reverse">
                            <div class="intro-y box mt-5">
                                <div class="relative flex items-center p-5">
                                    <div class="w-12 h-12 image-fit">
                                        <img class="rounded-full" src="<?= base_url('asset') ?>/user.png">
                                    </div>
                                    <div class="ml-4 mr-auto">
                                        <div class="font-medium text-base"><?php echo $this->session->userdata('nama_user') ?></div>
                                        <div class="text-slate-500"><?php echo $this->session->userdata('email') ?></div>
                                    </div>
                                </div>
                                <div class="p-5 border-t border-slate-200/60 dark:border-darkmode-400 flex">
                                    
                                </div>
                            </div>
                        </div>
                        <!-- END: Profile Menu -->
                        <div class="col-span-12 lg:col-span-8 2xl:col-span-9">
                            <!-- BEGIN: Change Password -->
                            <div class="intro-y box lg:mt-5">
                                <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                                    <h2 class="font-medium text-base mr-auto">
                                        Change Password
                                    </h2>
                                </div>
                                <div class="p-5">
                                    <form action="<?= site_url('change_password/process') ?>" method="post">
                                   
                                    <div class="mt-1">
                                        <label for="change-password-form-2" class="form-label">New Password</label>
                                        <input id="change-password-form-2" type="password" name="new_password" class="form-control" autocomplete="off">
                                    </div>
                                    <?= form_error('new_password', '<div class="text-danger small ml-2 mt-2">', '</div>') ?>
                                    <div class="mt-3 mb-4">
                                        <label for="change-password-form-3" class="form-label">Confirm New Password</label>
                                        <input id="change-password-form-3" name="confirm_password" type="password" class="form-control" autocomplete="off">
                                    </div>
                                    <?= form_error('confirm_password', '<div class="text-danger small ml-2 mt-2">', '</div>') ?>
                                    <button type="submit" class="btn btn-primary mt-4">Change Password</button>
                                    </form>
                                </div>
                            </div>
                            <!-- END: Change Password -->
                        </div>
                    </div>
                </div>