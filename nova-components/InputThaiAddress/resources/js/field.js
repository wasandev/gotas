Nova.booting((Vue, router) => {


    //add address filed 4 sub-district,districe,province,postal-code

    //sub-district
    Vue.component('index-input-sub-district', require('./components/InputSubDistrict/IndexField'))
    Vue.component('detail-input-sub-district', require('./components/InputSubDistrict/DetailField'))
    Vue.component('form-input-sub-district', require('./components/InputSubDistrict/FormField'))

    //district
    Vue.component('index-input-district', require('./components/InputDistrict/IndexField'))
    Vue.component('detail-input-district', require('./components/InputDistrict/DetailField'))
    Vue.component('form-input-district', require('./components/InputDistrict/FormField'))

    //province
    Vue.component('index-input-province', require('./components/InputProvince/IndexField'))
    Vue.component('detail-input-province', require('./components/InputProvince/DetailField'))
    Vue.component('form-input-province', require('./components/InputProvince/FormField'))

    //postal-code
    Vue.component('index-input-postal-code', require('./components/InputPostalCode/IndexField'))
    Vue.component('detail-input-postal-code', require('./components/InputPostalCode/DetailField'))
    Vue.component('form-input-postal-code', require('./components/InputPostalCode/FormField'))



})
