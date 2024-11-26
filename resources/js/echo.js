import Echo from 'laravel-echo';
import Pusher from 'pusher-js';
import { updateFetchNotification } from './notifications';

window.Pusher = Pusher;
//Pusher.logToConsole = true;
window.Echo = new Echo({
    broadcaster: 'pusher',
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
    forceTLS: true,
});
// window.Echo.connector.pusher.bind('pusher:subscription_succeeded', function (members) {
//     console.log('Successfully subscribed to the channel', members);
// });
//console.log(window.Echo);

document.addEventListener('DOMContentLoaded', () => {
    const userId = document.querySelector('meta[name="user-id"]').getAttribute('content');
    updateFetchNotification();
    window.Echo.private(`user.${userId}`)
        .notification((event) => {
            console.log(event);
        

            showNotification(event.senderName, event.message, event.notifyType, event.title,event.fileName);


            //update the notification bell after receiving notification
            updateFetchNotification();
        });

});