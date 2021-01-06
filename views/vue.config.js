module.exports = {
    devServer: {
        proxy: {
            '^/api': {
                target: 'http://cms.local.com/',
                ws: true,
                changeOrigin: true
            },
        }
    },
}