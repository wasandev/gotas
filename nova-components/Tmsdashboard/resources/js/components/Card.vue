<template>
  <div class="flex justify-center items-centers">
    <div class="w-full max-w-xl">
      <heading class="flex mb-1">
        <Tbody>{{ companyName }}</Tbody>
      </heading>
      <p class=" text-sm leading-tight mb-4">Powered by GOTAS v1.0.1</p>
      
    </div>
  </div>
</template>

<script>
export default {
  props: ["card"],
  data() {
    return {
      companyName: ""
    };
  },
  mounted() {
    this.companyName = this.card.companyName;
  }
};
</script>
