importScripts('https://www.gstatic.com/firebasejs/7.2.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/7.2.0/firebase-messaging.js');

var firebaseConfig = {
  apiKey: "AIzaSyBzwb7lCMRH8IItoT6spjgC4vrpGZlI0b0",
  authDomain: "soolz-8cce8.firebaseapp.com",
  databaseURL: "https://soolz-8cce8.firebaseio.com",
  projectId: "soolz-8cce8",
  storageBucket: "soolz-8cce8.appspot.com",
  messagingSenderId: "805578589159",
  appId: "1:805578589159:web:77959779ef8725858ab342",
  measurementId: "G-DGW0ZS149Z"
};

// Initialize Firebase
firebase.initializeApp(firebaseConfig);

const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function(payload) {
  console.log('[firebase-messaging-sw.js] Received background message ', payload);
  // Customize notification here
  const notificationTitle = payload.data.title;
  const notificationOptions = {
    body: payload.data.body,
    icon: payload.data.icon,
  };

  return self.registration.showNotification(notificationTitle,
      notificationOptions);
});
// [END background_handler]