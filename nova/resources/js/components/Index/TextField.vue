<template>
    <div :class="`text-${field.textAlign}`">
        <div v-if="field.asHtml" v-html="field.value"></div>
        <span v-else class="whitespace-no-wrap">{{ field.value }}</span>
    </div>
</template>

<script>
export default {
    props: ['resourceName', 'field'],
}
</script>
