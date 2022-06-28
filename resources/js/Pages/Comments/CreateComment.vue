<script setup>
import { useForm } from '@inertiajs/inertia-vue3';

const props = defineProps({
    commentable_id: Number,
    commentable_type: String,
})

const form = useForm({
    body: '',
    commentable_id: props.commentable_id,
    commentable_type: props.commentable_type,
});

const submit = () => {
    form.post(route('comments.store'), {
        preserveScroll: true,
        onFinish: () => form.body = '',
    });
};
</script>

<template>
    <div class="flex items-start space-x-4">
        <div class="flex-shrink-0">
            <img class="inline-block h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80" alt="" />
        </div>
        <div class="min-w-0 flex-1">
            <form @submit.prevent="submit">
                <div class="flex justify-between">
                    <div class="border-b border-gray-200 focus-within:border-indigo-600 min-w-full">
                        <label for="comment" class="sr-only">Add your comment</label>
                        <textarea rows="3" name="body" id="body" v-model="form.body" class="block w-full border-0 border-b border-transparent p-0 pb-2 resize-none focus:ring-0 focus:border-indigo-600 sm:text-sm" placeholder="Add your comment..." />
                    </div>
                    <div class="pt-2 flex justify-end">
                        <div class="flex-shrink-0">
                            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Post</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>
