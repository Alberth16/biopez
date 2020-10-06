;
//Asignacion a memoria Cache
const CACHE_NAME = 'v1_FlocApp',
urlsToCache = [
    './',
    './img/favicon.png',
    './img/logo.png',
    './css/principal.css',
    './css/formulario.css',
    './js/ajax.js',
    './js/icons.js',
    './js/script.js',
    './pgs/menu.php'
]


self.addEventListener('install',e=>{
    e.waitUntil(
        caches.open(CACHE_NAME)
        .then(cache =>{
            return cache.addAll(urlsToCache)
            .then(() =>self.skipWaiting())
        })
        .catch(err=>console.log('Fallo registro de cache', err))
    )
})

self.addEventListener('activate', e=>{
    const cacheWhiteList = [CACHE_NAME]
    e.waitUntil(
        caches.keys()
        .then(cachesNames=>{
            cachesNames.map(cacheName=>{
                if(cacheWhiteList.indexOf(cacheName) === -1){
                    return caches.delete(cacheName)
                }
            })
        })
        .then(()=>self.clients.claim())
    )
})

self.addEventListener('fetch', e=>{
    e.respondWith()
        caches.match(e.request)
        .then(res => {
            if(res){
                return res
            }
            return fetch(e.request)
        })
})