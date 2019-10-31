<template>
  <div class="flex justify-center items-centers">
    <div class="w-full max-w-xl">
      <heading class="flex mb-3">
        <Tbody>{{ companyName }}</Tbody>
      </heading>
      <p class="text-xl leading-tight mb-8">Welcome to GOTAS</p>
      
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
