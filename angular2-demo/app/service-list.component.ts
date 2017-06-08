import {Component} from "angular2/core";
import {CountryService} from "./country.service";
import {Contact} from "./country";
import {OnInit} from "angular2/core";

@Component({
   selector: "country-list",
   template: ` List of Countries<br>
   <ul>
      <li *ngFor="#cntry of countries">{{ cntry.name }}</li>
   </ul>
   `,
   providers: [CountryService]
})

export class MyListComponent implements OnInit {
   public countries : Country[];
   constructor(private _countryService: CountryService) {}

   getContacts(){
      this._countryService.getContacts().then((countries: Country[]) => this.countries = countries);
   }

ngOnInit():any{
   this.getContacts();
}
}