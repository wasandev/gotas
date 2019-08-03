<template>
  <panel-item :field="field">
    <template slot="value">
      <div class="google-map" ref="map"></div>
    </template>
  </panel-item>
</template>

<script>
export default {
  props: ["resource", "resourceName", "resourceId", "field"],

  computed: {},

  mounted() {
    const el = this.$refs["map"];
    const options = {
      zoom: this.field.zoom,
      center: new google.maps.LatLng(
        this.field.value.latitude,
        this.field.value.longitude
      )
    };

    this.map = new google.maps.Map(el, options);

    if (this.field.value.latitude && this.field.value.longitude) {
      this.addMarker(this.field.value.latitude, this.field.value.longitude);
    }
  },

  methods: {
    addMarker(lat, lng) {
      if (this.marker) {
        this.marker.setMap(null);
      }

      const coords = new google.maps.LatLng(lat, lng);

      this.marker = new google.maps.Marker({
        position: coords,
        map: this.map,
        draggable: true
      });

      this.map.setCenter(coords);
    }
  }
};
</script>

<style scoped>
.google-map {
  width: 100%;
  max-width: 400px;
  height: 400px;
  margin-bottom: 10px;
}
</style>