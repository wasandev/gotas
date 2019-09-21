<template>
    <div :class="`text-${field.textAlign}`">
        <icon
            v-if="field.value"
            viewBox="0 0 24 24"
            width="24"
            height="24"
            type="check-circle"
            class="text-success"
        />
        <icon
            v-else
            viewBox="0 0 24 24"
            width="24"
            height="24"
            type="x-circle"
            class="text-danger"
        />
    </div>
</template>

<script>
export default {
    props: ['resourceName', 'field'],
}
</script>
