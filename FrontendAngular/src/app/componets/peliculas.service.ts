import {Injectable} from '@angular/core';
import {HttpClient} from "@angular/common/http";
import {Observable} from "rxjs";
import {map} from "rxjs/operators";


@Injectable({
  providedIn: 'root'
})
export class PeliculasService {

  constructor(private http: HttpClient) {
  }

  buscarPeliculas(): Observable<any> {

    return this.http.get('http://127.0.0.1:8000/listar',
      {
        headers: {
          'Access-Control-Allow-Origin': '*',
          'Access-Control-Allow-Methods': 'GET,POST,OPTIONS,DELETE,PUT',
          'Access-Control-Allow-Headers': 'Content-Type',
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': "P5X1RZNBWxAvweNvjd44H0H0Wpy7OlDD0w6zl5HT",
        }
      }).pipe(map(
      res => {
        return res;
      }
    ));
  }
}
