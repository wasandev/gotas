<template>
  <p>
    <img
      v-if="field.thumbnailUrl"
      :src="field.thumbnailUrl"
      style="object-fit: cover;"
      class="align-bottom w-8 h-8"
      :class="{ 'rounded-full': field.rounded, rounded: !field.rounded }"
    />
    <span v-else>&mdash;</span>
  </p>
</template>

<script>
export default {
  props: ['viaResource', 'viaResourceId', 'resourceName', 'field'],
}
</script>
