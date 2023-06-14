import Alpine from 'alpinejs';
import { store } from './store.js';
import {toggle, getNavHeight} from './methods.js';

export function initAlpine() {
    window.Alpine = Alpine
    store()
    Alpine.data(['toggle', 'getNavHeight'], [toggle, getNavHeight])
    Alpine.start()
}