Nova.booting((Vue, router) => {

    Vue.filter("formatMoney", value => {
        return Number(value)
            .toFixed(2)
            .replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
    });
    router.addRoutes([{
            name: 'tranjob-entry',
            path: '/tranjob-entry',
            component: require('./views/index.vue')
        },
        // {
        //     name: 'tranjob-entry.create',
        //     path: '/tranjob-entry/create',
        //     component: require('./views/form.vue')
        // },
        // {
        //     name: 'tranjob-entry.edit',
        //     path: '/tranjob-entry/:id/edit',
        //     component: require('./views/form.vue')
        // },
        {
            name: 'tranjob-entry.show',
            path: '/tranjob-entry/show/:tranjobId',
            component: require('./views/show.vue'),
        },

    ])
})
