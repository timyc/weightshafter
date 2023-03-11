import { defineStore } from "pinia";
import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

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
        },
        disconnectEcho() {
            window.Echo.disconnect();
            console.log('Echo disconnected');
        },
    },
    persist: true,
});