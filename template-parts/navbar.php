<header class="mb-0 xl:mb-3">
    <div class="relative bg-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6">

            <div class="grid grid-cols-5 gap-4 border-b-2 border-gray-100/0 py-3 md:space-x-10 relative">

                <nav class="hidden space-x-10 xl:flex xl:order-1 xl:col-span-2 items-center">
                    <div class="relative wrapper-dropdown">
                        <?= wp_nav_menu([
                            'menu' => "main-menu",
                            'echo' => false,
                            'items_wrap' => '<ul id="%1$s" class="%2$s flex flex-wrap gap-4 font-semibold">%3$s</ul>',
                        ])
                        ?>
                    </div>
                </nav>

                <!-- Mobile menu -->
                <div class="-my-2 -mr-2 order-2 xl:hidden col-span-1 flex flex-wrap items-center">
                    <button type="button" class="inline-flex items-center justify-center rounded-md bg-white p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 button-menu" aria-expanded="false">
                        <span class="sr-only">Open menu</span>
                        <!-- Heroicon name: outline/bars-3 -->
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                </div>
                <!-- Mobile menu END -->

                <!-- LOGO -->
                <div class="flex order-2 xl:order-2 justify-center !m-0 col-span-3 xl:col-span-1">
                    <?php if (has_custom_logo()) { ?>
                        <?php
                        $custom_logo_id = get_theme_mod('custom_logo');
                        $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                        ?>

                        <a href="<?php echo get_bloginfo('url'); ?>">
                            <img src="<?= $logo[0] ?>" alt="" srcset="" class="h-[35px] md:h-[40px] w-auto">
                        </a>

                    <?php } else { ?>
                        <a href="<?php echo get_bloginfo('url'); ?>" class="font-extrabold text-lg uppercase">
                            <?php echo get_bloginfo('name'); ?>
                        </a>
                        <!-- <p class="text-sm font-light text-gray-600">
                            <?php echo get_bloginfo('description'); ?>
                        </p> -->
                    <?php } ?>
                </div>
                <!-- LOGO END -->

                <!-- <div class="hidden items-center justify-end md:flex md:flex-1 lg:w-0">
                    <a href="#" class="whitespace-nowrap text-base font-medium text-gray-500 hover:text-gray-900">Sign in</a>
                    <a href="#" class="ml-8 inline-flex items-center justify-center whitespace-nowrap rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-indigo-700">Sign up</a>
                </div> -->


                <!-- SEARCH -->
                <button type="button" class="flex items-center search-toggle order-3 col-span-1 xl:col-span-2">
                    <svg class="h-5 w-5 text-gray-400 ml-auto" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                    </svg>
                </button>
                <!-- <div class="lg:flex-1 flex justify-end px-2 lg:ml-6 order-3">
                    <div class="max-w-lg lg:max-w-xs border rounded-xl overflow-auto wrapper-search">
                        <form methode="get" action="<?= esc_url(home_url('/')); ?>" class="relative pl-10 pr-0">
                            <button type="button" class="absolute inset-y-0 left-0 pl-3 flex items-center search-submit">
                                <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <input type="text" name="s" id="search" class="block py-2 border border-transparent rounded-md leading-5 text-gray-300 placeholder-gray-400 focus:outline-none focus:bg-white focus:text-gray-900 sm:text-sm" placeholder="Search" value="<?php the_search_query(); ?>">
                        </form>
                    </div>
                </div> -->

                <div class="wrapper-search w-full bg-white absolute inset-0 !m-0 hidden flex-wrap items-center animate__animated animate__faster">
                    <form methode="get" action="<?= esc_url(home_url('/')); ?>" class="relative flex flex-wrap w-full px-4 border rounded-md border-slate-400">
                        <button type="submit" class="flex items-center search-submit">
                            <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <input type="text" name="s" id="search" class="ml-2 block py-2 border border-transparent rounded-md leading-5 text-gray-300 placeholder-gray-400 focus:outline-none focus:bg-white focus:text-gray-900 sm:text-sm flex-1" placeholder="Search" value="<?php the_search_query(); ?>">
                        <button type="button" class="flex items-center search-toggle">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 text-gray-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </form>
                </div>
                <!-- END SEARCH -->
            </div>
        </div>


        <div class="fixed inset-x-0 top-0 origin-top-right transform p-2 transition hidden xl:hidden wrapper-menu z-10">
            <div class="divide-y-2 divide-gray-50 rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5">
                <div class="px-5 pt-5 pb-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <?php if (has_custom_logo()) { ?>
                                <?php
                                $custom_logo_id = get_theme_mod('custom_logo');
                                $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                                ?>

                                <img src="<?= $logo[0] ?>" alt="" srcset="" class="h-[30px] w-auto">

                            <?php } else { ?>
                                <a href="<?php echo get_bloginfo('url'); ?>" class="font-extrabold text-lg uppercase">
                                    <?php echo get_bloginfo('name'); ?>
                                </a>
                                <!-- <p class="text-sm font-light text-gray-600">
                                    <?php echo get_bloginfo('description'); ?>
                                </p> -->
                            <?php } ?>
                        </div>
                        <div class="-mr-2">
                            <button type="button" class="inline-flex items-center justify-center rounded-md bg-white p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 button-menu">
                                <span class="sr-only">Close menu</span>
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="mt-6">
                        <!-- Search -->
                        <!--<div class="flex-1 flex justify-center mb-3">
                            <div class="w-full lg:max-w-xs border rounded-xl overflow-auto">
                                <label for="search" class="sr-only">Search </label>
                                <form methode="get" action="<?= esc_url(home_url('/')); ?>" class="relative z-50">
                                    <button type="submit" id="searchsubmit" class="absolute inset-y-0 left-0 pl-3 flex items-center">
                                        <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                    <input type="text" name="s" id="search" class="block w-full pl-10 pr-3 py-2 border border-transparent rounded-md leading-5 text-gray-300 placeholder-gray-400 focus:outline-none focus:bg-white focus:text-gray-900 sm:text-sm transition duration-150 ease-in-out" placeholder="Search" value="<?php the_search_query(); ?>">
                                </form>
                            </div>
                        </div>-->
                        <!-- END Search -->
                        <nav class="grid gap-y-8">

                            <?= wp_nav_menu([
                                'menu' => "main-menu",
                                'echo' => false,
                                'items_wrap' => '<ul id="%1$s" class="%2$s flex flex-wrap flex-col gap-4 font-semibold">%3$s</ul>',
                            ])
                            ?>

                        </nav>
                    </div>

                </div>
                <!-- <div class="space-y-6 py-6 px-5">
                    <div class="grid grid-cols-2 gap-y-4 gap-x-8">
                        <a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">Docs</a>
                    </div>
                    <div>
                        <a href="#" class="flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-indigo-700">Sign up</a>
                        <p class="mt-6 text-center text-base font-medium text-gray-500">
                            Existing customer?
                            <a href="#" class="text-indigo-600 hover:text-indigo-500">Sign in</a>
                        </p>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</header>
