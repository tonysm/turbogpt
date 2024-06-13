import { Controller } from "@hotwired/stimulus";

// Connects to data-controller="chat"
export default class extends Controller {
    remove() {
        this.element.remove();
    }
}
