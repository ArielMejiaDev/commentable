<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';

defineProps({
    article: Object,
})
</script>

<template>
    <div class="flex-shrink-0">
        <Link :href="route('articles.show', article.id)">
            <img class="h-48 w-full object-cover" :src="article.image" :alt="article.title" />
        </Link>
    </div>
    <div class="flex-1 bg-white p-6 flex flex-col justify-between">
        <div class="flex-1">
            <p class="text-sm font-medium text-indigo-600">
                <Link :href="route('articles.show', article.id)" class="hover:underline">
                    Tech
                </Link>
            </p>
            <Link :href="route('articles.show', article.id)" class="block mt-2">
                <p class="text-xl font-semibold text-gray-900">
                    {{ article.title }}
                </p>
                <p class="mt-3 text-base text-gray-500">
                    {{ article.excerpt }}
                </p>
            </Link>
        </div>
        <div class="mt-6 flex items-center">
            <div class="flex-shrink-0">
                <a href="#">
                    <span class="sr-only">Roel Aufderehar</span>
                    <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
                </a>
            </div>
            <div class="ml-3">
                <p class="text-sm font-medium text-gray-900">
                    <a href="#" class="hover:underline">Roel Aufderehar</a>
                </p>
                <div class="flex space-x-1 text-sm text-gray-500">
                    <time :datetime="'Mar 16, 2020'">
                        2020-03-16
                    </time>
                    <span aria-hidden="true"> &middot; </span>
                    <span> 6 min read </span>
                </div>
            </div>
        </div>
    </div>
</template>
