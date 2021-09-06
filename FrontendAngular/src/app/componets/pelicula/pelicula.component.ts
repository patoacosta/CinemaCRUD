import {Component, OnInit, ViewChild} from '@angular/core';
import {PeliculasService} from "../peliculas.service";
import {ModalDismissReasons, NgbModal} from "@ng-bootstrap/ng-bootstrap";
import {getHtmlTagDefinition} from "@angular/compiler";
import {Pelicula} from "../../models/Pelicula";
import {compareNumbers} from "@angular/compiler-cli/src/diagnostics/typescript_version";


@Component({
  selector: 'app-pelicula',
  templateUrl: './pelicula.component.html',
  styleUrls: ['./pelicula.component.css']
})
export class PeliculaComponent implements OnInit {

  public dato : string = ''
  public listaPeliculas : Array<Pelicula> = [];
  public pelicula : Pelicula = new Pelicula()

  constructor(private _peliculasService:PeliculasService, private modalService: NgbModal) {

  }

  ngOnInit(): void {

  }



  public buscarPeliculas(){
    this._peliculasService.buscarPeliculas().subscribe(
      respuesta => {
        console.log(respuesta)
      }
    )
  }

  closeResult: string = "";

  guardar(){
    if(this.pelicula.idPelicula) {
      let index = this.listaPeliculas.indexOf(this.pelicula)
      this.listaPeliculas[index] = this.pelicula
    }
    else {
      this.pelicula.idPelicula = this.listaPeliculas.length + 1
      this.listaPeliculas.push(this.pelicula)
    }
    this.modalService.dismissAll();
  }

  modificar(content : any, item : any) {
    this.dato = "Editar Pelicula"
    this.pelicula = item

    this.modalService.open(content, {ariaLabelledBy: 'modal-basic-title'}).result.then((result) => {
      this.closeResult = `Closed with: ${result}`;
    }, (reason) => {
      this.closeResult = `Dismissed ${this.getDismissReason(reason)}`;
    });
  }

  open(content : any, id : number) {
    this.dato = "Agregar nueva Pelicula"
    this.pelicula = new Pelicula()

    this.modalService.open(content, {ariaLabelledBy: 'modal-basic-title'}).result.then((result) => {
      this.closeResult = `Closed with: ${result}`;
    }, (reason) => {
      this.closeResult = `Dismissed ${this.getDismissReason(reason)}`;
    });
  }

  eliminarPelicula(content : any, item : any) {
    this.pelicula = item;

    this.modalService.open(content, {ariaLabelledBy: 'modal-basic-title'}).result.then((result) => {
      this.closeResult = `Closed with: ${result}`;
    }, (reason) => {
      this.closeResult = `Dismissed ${this.getDismissReason(reason)}`;
    });
  }

  eliminarSi(){

    let index = this.listaPeliculas.indexOf(this.pelicula);
    console.log(index)
    this.listaPeliculas.splice(index, 1);
    console.log(this.listaPeliculas);

    this.modalService.dismissAll()
  }

  private getDismissReason(reason: any): string {
    if (reason === ModalDismissReasons.ESC) {
      return 'by pressing ESC';
    } else if (reason === ModalDismissReasons.BACKDROP_CLICK) {
      return 'by clicking on a backdrop';
    } else {
      return  `with: ${reason}`;
    }
  }

}
