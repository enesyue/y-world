import {domReady} from '@roots/sage/client';
import { initAlpine } from './alpine/init.js';

const main = async (err) => {
    if (err) {
        // handle hmr errors
        console.error(err);
    }

    // application code
    initAlpine();
};

domReady(main);
import.meta.webpackHot?.accept(main);