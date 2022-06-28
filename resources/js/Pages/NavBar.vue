<script setup>
import { Link } from '@inertiajs/inertia-vue3';
</script>


<template>
    <header class="bg-indigo-600">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" aria-label="Top">
            <div class="w-full py-6 flex items-center justify-between border-b border-indigo-500 lg:border-none">
                <div class="flex items-center">
                    <a href="#">
                        <span class="sr-only">Devs Post</span>
                        <img class="h-10 w-auto" src="https://tailwindui.com/img/logos/workflow-mark.svg?color=white" alt="" />
                    </a>
                    <div class="hidden ml-10 space-x-8 lg:block">
                        <Link :href="route('articles.index')" class="text-base font-medium text-white hover:text-indigo-50">
                            Articles
                        </Link>
                        <a target="_blank" href="http://127.0.0.1:8000/docs" class="text-base font-medium text-white hover:text-indigo-50">
                            API Docs
                        </a>
                        <a target="_blank" href="https://arielmejia.dev" class="text-base font-medium text-white hover:text-indigo-50">
                            My Personal Site
                        </a>
                    </div>
                </div>
                <div class="ml-10 space-x-4">
                    <a :href="route('login')" class="inline-block bg-indigo-500 py-2 px-4 border border-transparent rounded-md text-base font-medium text-white hover:bg-opacity-75">Sign in</a>
                    <a :href="route('register')" class="inline-block bg-white py-2 px-4 border border-transparent rounded-md text-base font-medium text-indigo-600 hover:bg-indigo-50">Sign up</a>
                </div>
            </div>
            <div class="py-4 flex flex-wrap justify-center space-x-6 lg:hidden">
                <Link :href="route('articles.index')" class="text-base font-medium text-white hover:text-indigo-50">
                    Articles
                </Link>
                <a target="_blank" href="http://127.0.0.1:8000/docs" class="text-base font-medium text-white hover:text-indigo-50">
                    API Docs
                </a>
                <a target="_blank" href="https://arielmejia.dev" class="text-base font-medium text-white hover:text-indigo-50">
                    My Personal Site
                </a>
            </div>
        </nav>
    </header>
</template>
