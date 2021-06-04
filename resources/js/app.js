require('./bootstrap');
import '@fortawesome/fontawesome-free/js/fontawesome'
import '@fortawesome/fontawesome-free/js/solid'
import '@fortawesome/fontawesome-free/js/regular'
import '@fortawesome/fontawesome-free/js/brands'

class App {
    constructor() {
        this.init();
    }
    init() {
        console.log("hello");
    }
}

new App();
