import Echo from "laravel-echo"

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: 'your-pusher-key'
});


Echo.private('App.User.' + userId)
    .notification((notification) => {
        console.log(notification.type);
    });