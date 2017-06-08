import {Component} from 'angular2/core';
import {ContactComponent} from './contact-form.component'
@Component({
  selector: 'my-app',
  template: '<contact-form></contact-form>',
  directives: [ContactComponent]
})
export class AppComponent { }