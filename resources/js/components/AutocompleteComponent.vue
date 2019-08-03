<template>
  <div class="w-full mx-auto max-w-lg relative my-2 mb-6 px-3">
    <input
      type="text"
      placeholder="what are you looking for?"
      v-model="query"
      v-on:keyup="autoComplete"
      class="w-2/3 bg-while shadow rounded-full border-none focus:outline-none p-3"
    >
    <div class="overflow-hidden ml-12" v-if="results.length">
      <ul class="overflow-hidden bg-white rounded max-w-lg w-full shadow-lg leading-normal">
        <li
          class="block group hover:bg-blue p-2 border-b"
          v-for="result in results"
        >{{ result.sub_district }}>{{ result.district }}>{{ result.province }}>{{ result.postal_code }}</li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      query: "",
      results: []
    };
  },
  methods: {
    autoComplete() {
      this.results = [];
      if (this.query.length > 2) {
        axios
          .get("/api/search/address/" + this.query)
          .then(response => {
            this.results = response.data.data;
          })
          .catch(error => {
            console.log(error);
          });
      }
    }
  }
};
</script>