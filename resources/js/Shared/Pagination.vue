<template>
    <div v-if="links.length > 3">
        <div class="flex flex-wrap -mb-1">
            <template v-for="(link, key) in links">
                <div v-if="link.url === null" :key="key" class="mb-1 mr-1 px-4 py-3 bg-slate-800 text-white text-sm leading-4 hover:bg-slate-600 rounded" v-html="link.label" />
                <Link v-else :key="`link-${key}`" class="mb-1 mr-1 px-4 py-3 text-sm bg-slate-800 hover:bg-slate-600 leading-4" :class="{ 'bg-slate-600': link.active }" :href="link.url" v-html="link.label" />
            </template>
        </div>
    </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';

export default {
    components: {
        Link,
    },
    props: {
        links: Array,
    },
}
</script>
