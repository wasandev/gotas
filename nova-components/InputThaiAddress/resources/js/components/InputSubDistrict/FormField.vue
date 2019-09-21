<template>
  <div name="thai-address-input">
    <default-field :field="field" :errors="errors">
      <template slot="field">
        <ThailandAutoComplete
          v-model="value"
          type="district"
          @select="select"
          :id="field.attribute"
          :class="errorClasses"
          :placeholder="field.name"
        />
      </template>
    </default-field>
  </div>
</template>

<script>
import { FormField, HandlesValidationErrors } from "laravel-nova";

import ThailandAutoComplete from "vue-thailand-address-autocomplete";
export default {
  name: "app",
  components: {
    ThailandAutoComplete
  },

  mixins: [FormField, HandlesValidationErrors],

  props: ["resourceName", "resourceId", "field"],
  components: {
    ThailandAutoComplete
  },
  data: function() {
    return {
      district: "",
      amphoe: "",
      province: "",
      zipcode: ""
    };
  },

  methods: {
    /*
     * Set the initial, internal value for the field.
     */
    setInitialValue() {
      this.value = this.field.value || "";
    },

    /**
     * Fill the given FormData object with the field's internal value.
     */
    fill(formData) {
      formData.append(this.field.attribute, this.value || "");
    },

    /**
     * Update the field's internal value.
     */
    handleChange(value) {
      this.value = value;
    },
    select: function(addressData) {
      this.field.addressObject.forEach(element => {
        if (addressData.hasOwnProperty(element)) {
          Nova.$emit("address-metadata-update-" + element, {
            value: addressData[element]
          });
        }
      });
    }
  },
  mounted() {
    Nova.$on(
      "address-metadata-update-" + this.field.addressValue,
      ({ value }) => {
        this.value = value;
      }
    );
  }
};
</script>
