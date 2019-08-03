<template>
  <div class="text-center">
    <span
      class="inline-block rounded-full w-2 h-2 mr-1"
      :class="{'bg-success': field.hasCoordinates, 'bg-danger': !field.hasCoordinates}"
    ></span>
  </div>
</template>

<script>
export default {
  props: ["resourceName", "field"]
};
</script>