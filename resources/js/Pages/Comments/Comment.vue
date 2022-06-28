<script setup>
import {ref} from "vue";
import CreateComment from "@/Pages/Comments/CreateComment";

const props = defineProps({
    comment: Object,
})

const replyButton = ref({
    open: false,
})
</script>



<template>
    <div>
        <div class="flex space-x-3">
            <img class="h-6 w-6 rounded-full" src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80" alt="" />
            <div class="flex-1 space-y-1">
                <div class="flex items-center justify-between">
                    <div class="flex justify-between">
                        <h3 class="text-sm font-medium mx-1">Lindsay Walton</h3>
                        <p class="text-sm text-gray-500 mx-1">1h</p>
                    </div>
                    <div>
                        <button v-if="!replyButton.open" @click="replyButton.open = true" class="cursor-pointer border border-transparent text-sm font-medium rounded-md text-indigo-600">Reply</button>
                        <button v-if="replyButton.open" @click="replyButton.open = false" class="cursor-pointer border border-transparent text-sm font-medium rounded-md text-indigo-600">Cancel</button>
                    </div>
                </div>
                <p class="text-sm text-gray-500">{{ props.comment.body }} </p>
            </div>

        </div>
        <div v-if="replyButton.open" class="mt-6">
            <CreateComment :commentable_id="comment.id" :commentable_type="comment.type" />
        </div>

        <div class="mt-6 ml-6">
            <template v-for="nestedComment in comment.comments">
                <Comment :comment="nestedComment" />
            </template>
        </div>
    </div>
</template>
