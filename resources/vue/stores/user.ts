import { defineStore } from "pinia";
import Echo from 'laravel-echo';
import Pusher from 'pusher-js';
import axios from 'axios';

declare global {
    interface Window {
        Pusher: typeof Pusher;
        Echo: Echo;
    }
}

export interface User {
    id: number;
    name: string;
    email: string;
    avatar: string;
    height: number;
    weight: number;
    gender: string;
}

export interface ChatMessage {
    id: number;
    sender_id: number;
    receiver_id: number;
    message: string;
}

export const useUserStore = defineStore("userStore", {
    state: () => ({
        loggedIn: false,
        info: {} as User,
        messages: [] as ChatMessage[],
    }),
    actions: {
        initEcho() {
            window.Pusher = Pusher;

            window.Echo = new Echo({
                broadcaster: 'pusher',
                key: import.meta.env.VITE_PUSHER_APP_KEY,
                wsHost: import.meta.env.VITE_PUSHER_HOST ?? `ws-${import.meta.env.VITE_PUSHER_APP_CLUSTER}.pusher.com`,
                wsPath: import.meta.env.VITE_PUSHER_PATH ?? null,
                wsPort: import.meta.env.VITE_PUSHER_PORT ?? 80,
                wssPort: import.meta.env.VITE_PUSHER_PORT ?? 443,
                forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? 'https') === 'https',
                enabledTransports: ['ws', 'wss'],
            });
            console.log('Echo initialized');
            setInterval(() => {
                navigator.geolocation.getCurrentPosition(
                    position => {
                        console.log(position.coords.latitude);
                        console.log(position.coords.longitude);
                        axios.post('/user/location', {
                            latitude: position.coords.latitude,
                            longitude: position.coords.longitude,
                        }).then(response => {
                            console.log('User location updated');
                        }).catch(error => {
                            console.log('Error updating location');
                        });
                    },
                    error => {
                        console.log(error.message);
                    },
                );
            }, 10000);
        },
        disconnectEcho() {
            window.Echo.disconnect();
            console.log('Echo disconnected');
        },
    },
    persist: true,
});