export function store() {
    return Alpine.store(
        'darkMode', {
            on: true,
        
            toggle() {
                this.on = ! this.on
            }
        },
        'test', {
            on: false,
        }
    )
}