const pusher = new Pusher(process.env.PUSHER_API, {
  cluster: 'eu'
});

export let pusherChannel = pusher.subscribe('my-channel');
