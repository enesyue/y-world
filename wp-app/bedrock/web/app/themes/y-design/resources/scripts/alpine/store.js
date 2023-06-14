export function store() {
    return Alpine.store(
        'darkMode', {
            on: false,
        
            toggle() {
                this.on = ! this.on
            }
        },
        'test', {
            on: false,
        }
    )
}