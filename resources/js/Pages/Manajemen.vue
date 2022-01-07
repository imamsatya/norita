<template>
<breeze-authenticated-layout>
        <template #header>
            
            <h2 class="font-semibold text-xl text-white leading-tight">
                Manajemen
            </h2>
        </template>

        <div class="py-12 bg-gray-900">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-gray-800 border-b border-gray-800">
                        
                        <!-- <form-element></form-element> -->
                        <table-manajemen :customers="customers"></table-manajemen>

                        
                    </div>
                    
                </div>
            </div>
        </div>
    </breeze-authenticated-layout>
</template>

<script>

    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated';
    import TableManajemen from '@/Pages/TableManajemen'

    export default {
        props: {
            
            customers: Object,
        },
        components: {
            BreezeAuthenticatedLayout,
            TableManajemen
        },
    }
</script>
