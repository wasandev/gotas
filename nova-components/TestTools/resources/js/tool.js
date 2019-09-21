Nova.booting((Vue, router, store) => {
    router.addRoutes([
        {
            name: 'test-tools',
            path: '/test-tools',
            component: require('./components/Tool'),
        },
    ])
})
