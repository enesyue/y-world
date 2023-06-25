export function toggle() {
    return {
        open: false,
        toggle() {
            this.open = ! this.open
        }
    }
}

export function getNavHeight() {
    return {
        navHeight: document.querySelector('#y-nav').clientHeight
    }
}