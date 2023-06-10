<div class="content">
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Profile Layout
        </h2>
    </div>
    <!-- BEGIN: Profile Info -->
    <div class="intro-y box px-5 pt-5 mt-5">
        <div class="flex flex-col lg:flex-row border-b border-slate-200/60 dark:border-darkmode-400 pb-5 -mx-5">
            <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
                <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit relative">
                    <img class="rounded-full" src="<?= base_url('asset') ?>/user.png">
                    <div class="absolute mb-1 mr-1 flex items-center justify-center bottom-0 right-0 bg-white rounded-full p-2"> <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-patch-check-fill text-success" viewBox="0 0 16 16">
                            <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z" />
                        </svg> </div>
                </div>
                <div class="ml-5">
                    <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg"><?php echo $this->session->userdata('nama_user') ?></div>
                    <div class="text-slate-500">Dell Store Customer</div>
                </div>
            </div>
            <div class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
                <div class="font-medium text-center lg:text-left lg:mt-3">Contact Details</div>
                <div class="flex flex-col justify-center items-center lg:items-start mt-4">
                    <div class="truncate sm:whitespace-normal flex items-center"> <i data-lucide="mail" class="w-4 h-4 mr-2"></i> <?php echo $this->session->userdata('email') ?> </div>
                    <div class="truncate sm:whitespace-normal flex items-center mt-3"> <i data-lucide="slack" class="w-4 h-4 mr-2"></i> Customer's </div>
                    <div class="truncate sm:whitespace-normal flex items-center mt-3 text-success"> <i data-lucide="alert-circle" class="w-4 h-4 mr-2 text-success"></i> <b>Akun Sudah Terverifikasi </b></div>
                </div>
            </div>
        </div>
        <ul class="nav nav-link-tabs flex-col sm:flex-row justify-center lg:justify-start text-center" role="tablist">
            <li id="dashboard-tab" class="nav-item" role="presentation"> <a href="javascript:;" class="nav-link py-4 active" data-tw-target="#dashboard" aria-controls="dashboard" aria-selected="true" role="tab"> Dashboard </a> </li>
            <li id="account-and-profile-tab" class="nav-item" role="presentation"> <a href="javascript:;" class="nav-link py-4" data-tw-target="#account-and-profile" aria-selected="false" role="tab"> Update Profile </a> </li>
        </ul>
    </div>
    <!-- END: Profile Info -->
    <div class="intro-y tab-content mt-5">
        <div id="dashboard" class="tab-pane active" role="tabpanel" aria-labelledby="dashboard-tab">
            <div class="grid grid-cols-12 gap-6">

                <!-- BEGIN: Work In Progress -->
                <div class="intro-y box col-span-12 lg:col-span-12">
                    <div class="flex items-center px-5 py-5 sm:py-0 border-b border-slate-200/60 dark:border-darkmode-400">
                        <h2 class="font-medium text-base mr-auto">
                            Menunggu Pembayaran
                        </h2>
                        <div class="dropdown ml-auto sm:hidden">
                            <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="more-horizontal" class="w-5 h-5 text-slate-500"></i> </a>
                            <div class="nav nav-tabs dropdown-menu w-40" role="tablist">
                                <ul class="dropdown-content">
                                    <li> <a id="work-in-progress-mobile-new-tab" href="javascript:;" data-tw-toggle="tab" data-tw-target="#work-in-progress-new" class="dropdown-item" role="tab" aria-controls="work-in-progress-new" aria-selected="true"></a> </li>
                                    <li> <a id="work-in-progress-mobile-last-week-tab" href="javascript:;" data-tw-toggle="tab" data-tw-target="#work-in-progress-last-week" class="dropdown-item" role="tab" aria-selected="false"></a> </li>
                                </ul>
                            </div>
                        </div>
                        <ul class="nav nav-link-tabs w-auto ml-auto hidden sm:flex" role="tablist">
                            <li id="work-in-progress-new-tab" class="nav-item" role="presentation"> <a href="javascript:;" class="nav-link py-5 active" data-tw-target="#work-in-progress-new" aria-controls="work-in-progress-new" aria-selected="true" role="tab"> </a> </li>
                            <li id="work-in-progress-last-week-tab" class="nav-item" role="presentation"> <a href="javascript:;" class="nav-link py-5" data-tw-target="#work-in-progress-last-week" aria-selected="false" role="tab"> </a> </li>
                        </ul>
                    </div>
                    <div class="p-5">
                        <div class="tab-content">
                            <div id="work-in-progress-new" class="tab-pane active" role="tabpanel" aria-labelledby="work-in-progress-new-tab">
                                <?php foreach ($bill as $row) : ?>
                                    <div class="mt-2 mb-5">
                                        <div class="flex">
                                            <div class="mr-auto">Order ID : <b>#<?= $row->order_id ?></b></div>
                                            <div>
                                                <i data-loading-icon="three-dots" class="w-8 h-8"></i>
                                            </div>
                                        </div>
                                        <div class="progress h-1 mt-2">
                                            <div class="progress-bar w-1/4 bg-primary" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                <br>
                                <a href="<?= site_url('bill') ?>" class="btn btn-secondary block w-40 mx-auto mt-5">View More Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Work In Progress -->

            </div>
        </div>

        <div id="account-and-profile" class="tab-pane" role="tabpanel" aria-labelledby="account-and-profile-tab">
            <div class="grid grid-cols-12 gap-6">

                <!-- BEGIN: Work In Progress -->
                <div class="intro-y box col-span-12 lg:col-span-12 mt-2">

                    <div class="p-5">
                        <div class="tab-content">
                            <div id="work-in-progress-new" class="tab-pane active" role="tabpanel" aria-labelledby="work-in-progress-new-tab">
                                <div class="flex flex-col-reverse xl:flex-row flex-col">
                                    <div class="flex-1 mt-6 xl:mt-0">
                                        <form action="<?= site_url('profile/update') ?>" method="post">
                                            <?php foreach ($profile as $row) : ?>
                                                <div class="grid grid-cols-12 gap-x-5">
                                                    <div class="col-span-12 2xl:col-span-6">
                                                        <div>
                                                            <label for="update-profile-form-1" class="form-label">Your Name</label>
                                                            <input type="hidden" name="id_user" value="<?= $row->id_user ?>">
                                                            <input id="update-profile-form-1" type="text" class="form-control" name="nama_user" placeholder="Input text" value="<?= $row->nama_user ?>">
                                                        </div>
                                                        <div class="mt-3">
                                                            <label for="update-profile-form-2" class="form-label">Your Email</label>
                                                            <input id="update-profile-form-1" type="email" class="form-control" name="email" placeholder="Input text" value="<?= $row->email ?>">
                                                        </div>
                                                        <div class="mt-3">
                                                            <label for="update-profile-form-2" class="form-label">Your Address</label>
                                                            <input id="update-profile-form-1" type="text" class="form-control" name="address" placeholder="Your Address" value="<?= $row->address ?>">
                                                        </div>

                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                            <button type="submit" class="btn btn-primary w-20 mt-3">Save</button>
                                        </form>
                                    </div>
                                    <div class="w-52 mx-auto xl:mr-0 xl:ml-6">
                                        <div class="border-2 border-dashed shadow-sm border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                            <div class="h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                                <img class="rounded-md" src="<?= base_url('asset') ?>/user.png">
                                                <div class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-primary right-0 top-0 -mr-2 -mt-2"> <i data-lucide="alert-circle" class="w-4 h-4"></i> </div>
                                            </div>
                                            <div class="mx-auto cursor-pointer relative mt-5">
                                                <button type="button" class="btn btn-primary w-full">Profile Anda</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Work In Progress -->

            </div>
        </div>
    </div>
</div>