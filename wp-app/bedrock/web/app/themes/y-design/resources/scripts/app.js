import { domReady } from '@roots/sage/client';
import { initAlpine } from './alpine/init.js';
import { cache } from './filters/cache.js';

const main = async (err) => {
    if (err) {
        // handle hmr errors
        console.error(err);
    }

    // application code
    cache();
    initAlpine();
};

domReady(main);
import.meta.webpackHot?.accept(main);