Nova.booting((Vue, router) => {
    router.addRoutes([
        {
            name: 'nova-profile-tool',
            path: '/nova-profile-tool',
            component: require('./components/Tool'),
        },
    ])
})
