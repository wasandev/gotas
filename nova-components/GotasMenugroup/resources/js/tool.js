Nova.booting((Vue, router, store) => {
    router.addRoutes([{
        name: 'gotas-menugroup',
        path: '/gotas-menugroup/:group',
        component: require('./components/Tool'),
    }, ])
})