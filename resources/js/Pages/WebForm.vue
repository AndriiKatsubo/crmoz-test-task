<script setup>
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <div>
        <div class="min-h-screen bg-gray-100">
            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <h1 class="font-semibold text-xl text-gray-800 leading-tight">Web Form</h1>
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <Head title="Web Form" />
                <form @submit.prevent="submitForm">
                    <div class="space-y-12 mx-6 mt-6 max-w-4xl mx-auto">
                        <div class="border-b border-gray-900/10 pb-12">
                            <h2 class="text-base font-semibold leading-7 text-gray-900">Deal record</h2>
                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <div class="sm:col-span-6">
                                    <label for="deal-name"
                                        class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                                    <div class="mt-2">
                                        <input type="text" name="deal-name" id="deal-name" v-model="dealName"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                    </div>
                                </div>

                                <div class="sm:col-span-6">
                                    <label for="deal-stage"
                                        class="block text-sm font-medium leading-6 text-gray-900">Stage</label>
                                    <div class="mt-2">
                                        <select v-model="dealStage" id="deal-select"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <option v-for="ds in dealStages" :key="ds" :value="ds">{{ ds }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="border-b border-gray-900/10 pb-12">
                            <h2 class="text-base font-semibold leading-7 text-gray-900">Account record</h2>
                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <div class="sm:col-span-6">
                                    <label for="account-name"
                                        class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                                    <div class="mt-2">
                                        <input type="text" name="account-name" id="account-name" v-model="accountName"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                    </div>
                                </div>

                                <div class="sm:col-span-6">
                                    <label for="account-website"
                                        class="block text-sm font-medium leading-6 text-gray-900">Website</label>
                                    <div class="mt-2">
                                        <input type="text" name="account-website" id="account-website" v-model="accountWebsite"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                    </div>
                                </div>

                                <div class="sm:col-span-6">
                                    <label for="account-phone"
                                        class="block text-sm font-medium leading-6 text-gray-900">Phone</label>
                                    <div class="mt-2">
                                        <input type="text" name="account-phone" id="account-phone" v-model="accountPhone"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="my-6 flex items-center justify-end gap-x-6">
                            <button type="submit"
                                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                        </div>
                    </div>
                </form>
            </main>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            dealName: '',
            dealStage: '',
            dealStages: [],
            accountName: '',
            accountWebsite: '',
            accountPhone: '',
        };
    },
    methods: {
        async fetchStageDeals() {
            try {
                const response = await axios.get('/api/deals/stages');
                this.dealStages = response.data;
            } catch (error) {
                // @ Handle errors gracefully
                console.log('An error occurred: ' + error.message);
            }
        },
        async submitForm() {
            try {
                const response = await axios.post('/api/webform', {
                    dealName: this.dealName,
                    dealStage: this.dealStage,
                    accountName: this.accountName,
                    accountWebsite: this.accountWebsite,
                    accountPhone: this.accountPhone,
                });

                this.responseMessage = response.data.message;
            } catch (error) {
                // @ Handle errors gracefully
                console.log('An error occurred: ' + error.message);
            }
        },
    },
    mounted() {
        this.fetchStageDeals();
    },
};
</script>