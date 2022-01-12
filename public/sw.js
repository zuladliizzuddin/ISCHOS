const cacheName = 'v1';
var dataurl;

const cacheAssets = [
  'index.html',
  'about.html',
  '/css/style.css',
  '/js/main.js'
];


// Call Install Event
self.addEventListener('install', e => {
  console.log('Service Worker: Installed');
  e.waitUntil(
    caches
      .open(cacheName)
      .then(cache => {
        console.log('Service Worker: Caching Files');
        cache.addAll(cacheAssets);
      })
      .then(() => self.skipWaiting())
  );
});

// Call Activate Event
self.addEventListener('activate', e => {
  console.log('Service Worker: Activated');
  // Remove unwanted caches
  e.waitUntil(
    caches.keys().then(cacheNames => {
      return Promise.all(
        cacheNames.map(cache => {
          if (cache !== cacheName) {
            console.log('Service Worker: Clearing Old Cache');
            return caches.delete(cache);
          }
        })
      );
    })
  );
});

// Call Fetch Event
self.addEventListener('fetch', e => {
  console.log('Service Worker: Fetching');
  e.respondWith(fetch(e.request).catch(() => caches.match(e.request)));
});


//push Notification
self.addEventListener('push', function (e) {
    if (!(self.Notification && self.Notification.permission === 'granted')) {
      //notifications aren't supported or permission not granted!
      
      return;
  }
  
  if (e.data) {
      //JSON.parse(undefined);
      var msg = e.data.json();
      console.log(msg)
      e.waitUntil(self.registration.showNotification(msg.title, {
          body: msg.body,
          icon: msg.icon,
          actions: msg.actions,
          data: msg.data
      }));
      dataurl = msg.data;
  }
   
  

});

self.addEventListener('notificationclick', function(e) {
  console.log('Notification click: tag ', e.data);
  e.notification.close();
  var url = dataurl[0];
  e.waitUntil(
    clients.matchAll({
        type: 'window'
    })
    .then(function(windowClients) {
        for (var i = 0; i < windowClients.length; i++) {
            var client = windowClients[i];
            if (client.url === url && 'focus' in client) {
                return client.focus();
            }
        }
        if (clients.openWindow) {
            console.log('TESSSSSS', clients);
            console.log('BUkak new window');
            return clients.openWindow(url);
        }
    })
);
});


