Nova.booting((Vue, router) => {

    Vue.component('index-input-thai-address', require('./components/InputThaiAddress/IndexField'))
    Vue.component('detail-input-thai-address', require('./components/InputThaiAddress/DetailField'))
    Vue.component('form-input-thai-address', require('./components/InputThaiAddress/FormField'))

    Vue.component('index-thai-address-metadata', require('./components/ThaiAddressMetadata/IndexField'))
    Vue.component('detail-thai-address-metadata', require('./components/ThaiAddressMetadata/DetailField'))
    Vue.component('form-thai-address-metadata', require('./components/ThaiAddressMetadata/FormField'))

    Vue.component('index-map-address', require('./components/MapAddress/IndexField'));
    Vue.component('detail-map-address', require('./components/MapAddress/DetailField'));
    Vue.component('form-map-address', require('./components/MapAddress/FormField'));
})