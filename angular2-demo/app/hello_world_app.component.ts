import {Component, View} from "angular2/core";

@Component({
   selector: 'my-app1'
})

@View({
  template: '<h2>Hello World !! {{appTitle}} {{appTitle1}}</h2>'
})

export class MyHelloWorldClass {
 appTitle: string = 'Welcome12';
appTitle1: string = 'Pradeep';  
 

}