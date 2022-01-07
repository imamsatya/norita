<template>
    <inertia-link :class="classes">
        <slot />
    </inertia-link>
</template>

<script>
    export default {
        props: ['active'],

        computed: {
            classes() {
                return this.active
                            ? 'block pl-3 pr-4 py-2 border-l-4 border-blue-400 text-base font-medium text-blue-400 bg-gray-900 focus:outline-none focus:text-indigo-800 focus:text-blue-400 focus:bg-gray-900 focus:border-blue-400 transition duration-150 ease-in-out'
                            : 'block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-white hover:text-blue-400 hover:bg-gray-900 hover:border-blue-400 focus:outline-none focus:text-blue-400 focus:bg-gray-800 focus:border-blue-400 transition duration-150 ease-in-out'
            }
        }
    }
</script>
