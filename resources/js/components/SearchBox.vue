<template>
  <form id="search" >
     <div class="input-group input-group-sm search" style="width: 180px;">
      <input
        name="query"
        v-model="$parent.query"
        @keyup="$parent.search($parent.query)"
        class="w-full mx-auto max-w-lg relative my-2 mb-2 px-3"
        placeholder="ค้นหา"
      >
     </div>
  </form>
</template>