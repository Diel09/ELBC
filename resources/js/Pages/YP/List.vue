<template>
    <Head title="YP" />

    <BreezeAuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 md:w-3/4">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Points
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Add points
                                    </th>
                                    <!-- <th scope="col" class="px-6 py-3">
                                        Action
                                    </th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="young in yp" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ young.name }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ young.points }}
                                    </td>
                                    <td class="px-2 py-2">
                                        <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                                        <div class="relative">
                                            <input v-model="point[young.id]" type="numeric" id="search" class="block w-full p-4 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Add points">
                                            <button @click="addPoints(young.id, point[young.id])" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add</button>
                                        </div> 
                                    </td>
                                    <!-- <td class="px-6 py-4 text-left">
                                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-2">Edit</a>
                                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</a>
                                    </td> -->
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head, Link} from '@inertiajs/inertia-vue3';
import axios from 'axios';

export default {
    components: {
        BreezeAuthenticatedLayout, 
        Head,
        Link
    },
    data(){
        return{
            point: [],
        }
    },
    methods: {
        addPoints(id, pt){
            axios.post('/yp/add-points', {
                id, 
                pt
            }
            ).then(function(){
                location.reload();
            });
        },
    },
    mounted(){
        
    },
    props: {
        yp: Array,
    }
}
</script>
