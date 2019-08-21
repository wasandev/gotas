<template>
    <div :class="`text-${field.textAlign}`">
        <span
            class="boolean-field"
            :class="{ 'boolean-field-true': field.value, 'boolean-field-false': !field.value }"
        />
    </div>
</template>

<script>
export default {
    props: ['resourceName', 'field'],
}
</script>
