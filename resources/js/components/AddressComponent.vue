<template>
  <div id="app" bg-white shadow-md rounded-lg p-4 max-w-login mx-auto>
    <div class="flex mb-1">
      <div class="flex-1 mb-1 lg:w-1/2 mr-4">
        <label class="block font-bold mb-1">แขวง/ตำบล</label>
        <thai-address-input
          type="subdistrict"
          v-model="subdistrict"
          input-class="input-class  input-class::focus"
          @selected="onSelected"
        ></thai-address-input>
      </div>
      <div class="flex-1 mb-1 lg:w-1/2">
        <label class="block font-bold mb-1">เขต/อำเภอ</label>
        <thai-address-input
          type="district"
          v-model="district"
          input-class="input-class  input-class::focus"
          @selected="onSelected"
        ></thai-address-input>
      </div>
    </div>
    <div class="flex mb-1">
      <div class="flex-1 mb-1 lg:w-1/2 mr-4">
        <label class="block font-bold mb-1">จังหวัด</label>
        <thai-address-input
          type="province"
          v-model="province"
          input-class="input-class  input-class::focus"
          @selected="onSelected"
        ></thai-address-input>
      </div>
      <div class="flex-1 mb-1 lg:w-1/2">
        <label class="block font-bold mb-1">รหัสไปรษณีย์</label>
        <thai-address-input
          type="postalCode"
          v-model="postalCode"
          input-class="input-class  input-class::focus"
          @selected="onSelected"
        ></thai-address-input>
      </div>
    </div>

    <hr>

    <div class="form-group">
      <label class="block font-bold mb-1">ค้นหาที่อยู่</label>
      <thai-address-input
        type="search"
        v-model="search"
        input-class="input-class  input-class::focus"
        @selected="onSearched"
      ></thai-address-input>
      <span class="help-block">ลองกรอกอย่างใดอย่างหนึ่ง ตำบล, อำเภอ, จังหวัด หรือ รหัสไปรษณีย์</span>
    </div>
    <div v-show="searchResult" class="alert alert-info">{{ searchResult }}</div>
  </div>
</template>

<script>
export default {
  name: "app",
  data() {
    return {
      subdistrict: "",
      district: "",
      province: "",
      postalCode: "",
      search: "",
      searchResult: ""
    };
  },
  methods: {
    onSelected(address) {
      this.subdistrict = address.subdistrict;
      this.district = address.district;
      this.province = address.province;
      this.postalCode = address.postalCode;
    },
    onSearched(address) {
      this.searchResult = address;
    }
  }
};
</script>